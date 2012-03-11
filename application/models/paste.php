<?php
class Paste extends CI_Model
{
   function Paste()
   {
      parent::__construct();
   }

   function setPaste($post)
   {
      $this->load->helper('kses');
      $allowed = array();
      $data['id']=NULL;
      if($post['name'] == NULL)
      {
	$data['name']='Anonymous';
      }
      else
      {
	$data['name']=$val = kses($post['name'], $allowed);
        
      }
      if($post['description'] == NULL)
      {
	$data['description']='None';
      }
      else
      {
	$data['description']= kses($post['description'], $allowed);
      }
      $data['language_id']=$post['language'];
      $data['created']= date("Y-m-d H:i:s");
      switch((int)$post['time']){
      case "1": 
	$data['finish'] = date("Y-m-d H:i:s",time() + 60*60*1); break;
      case 2:
	$data['finish'] = date("Y-m-d H:i:s",time() + 60*60*24); break;
      case 3:
	$data['finish'] = date("Y-m-d H:i:s",time() + 60*60*24*7); break;
      case 4:
        $data['finish'] = date("Y-m-d H:i:s",time() + 60*60*24*30); break;
      } 
      do{
	$cadena = $this->randomString();
	$this->db->where('status',1);
	$this->db->where("url", $cadena);
	$query = $this->db->get("code");
	if($query->num_rows > 0) {
	  $here = 0;
	  //break;
	} else {
	  $here = 1;
	  //break;
	}

      }while($here==0);
      $data['url']=$cadena;
      $data['source']=htmlspecialchars($post['code']);
      $data['status']=1;
      $this->db->insert('code', $data);
      return $cadena;
   }

   function randomString(){
     $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
     $cad = "";
     for($i=0;$i<10;$i++){
       $cad .= substr($str,rand(0,62),1);
     }      
     return $cad;
   }   
   function getPaste($cad)
   {
     $this->db->select('code.name AS user,code.description,source,created,url,language_id,language.name AS language,language.value');
     $this->db->where('url', $cad);
     $this->db->where('status',1);
     $this->db->limit(1);
     $this->db->from('code');
     $this->db->join('language', 'language.id = code.language_id');
     $query = $this->db->get();
     if ($query->num_rows() == 0) {
      //$this->session->set_flashdata('item', 'no hay ese codigo');
      //FlashNotice::add("Sorry, the code does not exist", 'error');
              redirect('');
     }
     foreach($query->result() as $row )
       { 
	 $data['user'] = $row->user;
         $data['description'] = $row->description;
	 $data['source'] = $row->source;
	 $data['created'] = $row->created;
	 $data['url'] = $this->config->item('base_url').'show/'.$row->url;
	 $data['token']=$row->url;
	 $data['language_id'] = $row->language_id;
	 $data['language'] = $row->language;
	 $data['value']=$row->value;
					           
       }
     return $data;
   }
   function getRecent()
   {
     $this->db->select('id,name,description,created,url');
     $this->db->where('status',1);
     $this->db->order_by('created','desc');
     $this->db->limit(6);
     $query=$this->db->get('code');
     if ($query->num_rows() == 0) {
       return FALSE;
     }
     foreach($query->result() AS $row)
       {
	 $data[$row->id]['name']=$row->name;
         $data[$row->id]['description']=$row->description;
	 $data[$row->id]['created']=$row->created;
	 $data[$row->id]['url']=$this->config->item('base_url').'show/'.$row->url;
         
       }
     return $data;
   }

   function cron ()
   {
     $condition= date("Y-m-d H:i:s");
     $this->db->select('id');
     $this->db->where('status',1);
     $this->db->where('finish <',$condition);
     $query=$this->db->get('code');
     if($query->num_rows != 0)
       {
	 foreach($query->result() AS $row)
	   {
	     $this->db->where('id',$row->id);
	     $up=array('status'=>0);
	     $this->db->update('code',$up);
	   }
       }
   }

   function getList($num, $offset) {
     $this->db->select('code.id,code.name AS user,code.description,language.value AS language,created,url');
     $this->db->order_by('id','desc');
     $this->db->where('status',1);
     $this->db->limit($num,$offset);
     $this->db->from('code');
     $this->db->join('language', 'language.id = code.language_id');
     $query = $this->db->get();
     if ($query->num_rows() == 0) {
       return FALSE;
     }
     foreach($query->result() AS $row)
       {
         $data[$row->id]['name']=$row->user;
         $data[$row->id]['description']=$row->description;
	 $data[$row->id]['language']=$row->language;
         $data[$row->id]['created']=$row->created;
         $data[$row->id]['url']=$this->config->item('base_url').'show/'.$row->url;

       }
     return $data;
   }


}
