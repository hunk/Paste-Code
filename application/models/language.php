<?php
class Language extends CI_Model
{
   function Language()
   {
      parent::__construct();
   }

   function getLanguage()
   {
     $this->db->order_by('count','desc');
     $this->db->where('id !=', "1");
     $this->db->limit(5);
     $query=$this->db->get('language');
     foreach ($query->result() as $row)
       {
         $data['options'][$row->id] = $row->name;
       } 
     $data['options'][1]="-----";
     $this->db->where('id !=', "1");
     $query = $this->db->get('language');
     foreach ($query->result() as $row)
       {
         $data['options'][$row->id] = $row->name;
       }
     return $data;

   }

   function incLanguage($id)
   {
     $this->db->where('id',$id);
     $this->db->select('count');
     $query = $this->db->get('language');
     foreach($query->result() as $row)
       {
	 $count = $row->count + 1;
       }
     $data = array('count'=>$count);
     $this->db->where('id',$id);
     $this->db->update('language',$data);
     
   }
   
   function rank(){
      $this->db->select('name,count');
      $this->db->order_by('count','desc');
      $this->db->limit(5);
      $query=$this->db->get('language');
      $count_primero=0;
      if($query->num_rows !=0){
         foreach($query->result() as $row){
	    $data[$row->name] = $row->count;
	    $count_primero+=$row->count;
	 }
	 $this->db->select('sum(count) as total');
	 $numero=$this->db->get('language');
	 foreach($numero->result() as $row1){
	    $total=$row1->total;
	 }
	 $data['otros']=$total - $count_primero;
         return $data;
      }else{
	return FALSE;
      }
   }


}