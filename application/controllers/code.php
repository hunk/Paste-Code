<?php

class Code extends CI_Controller{
	
	function Code(){
		parent::__construct();
		$this->load->model('paste');
		$this->paste->cron();
		$this->load->helper('cookie');
		$this->load->library('session');
		$newdata = array( 'username'  => 'johndoe' );
		$this->session->set_userdata($newdata);

	}
   
	public function test(){
		echo "aqui funciona bien";

	}
		
	function index(){
		$this->load->model('language');
		$data=$this->language->getLanguage();
		$data['results'] = $this->page(0);
		if(get_cookie('mypaste_name')){
			$data['name'] = get_cookie('mypaste_name');
		}else{
			$data['name'] = "";
		}
		$data['error'] = $this->session->userdata('error');
		if($data['error']) $this->session->unset_userdata('error');
		//$FlashNotice = $this->session->userdata('FlashNotice');
		//if( !isset($FlashNotice['error'])){ FlashNotice::add("Paste you Code here!!!! ;) ", 'info'); }
		$this->load->view('simpla/main',$data);
   	
   }	

	//esta funcion es la de add/hunk , se cambia el nombre en route
	function paste(){
		$this->load->model('language');
		$data=$this->language->getLanguage();
		$this->load->model('paste');
		$data['results'] = $this->page(0);
		$data['name'] = $this->uri->segment(2);
		//FlashNotice::add("paste you code ".$this->uri->segment(2), 'info');
		//$this->load->view('principal',$data);
		$data['error']=0;
		$this->load->view('simpla/main',$data);
	}

	//añade el codigo y hace redirect al codigo
	function add(){ 
		if(!isset($_POST['submit']) || !empty($_POST['patito'])){
			redirect('');
		}else{
			$this->load->library('form_validation');
			$rules['code'] = "required";
			$fields['code'] = "I NEED YOU CODE!!!!!!!!!!";
			$this->form_validation->set_rules('code', 'code', 'required');
			
			//$this->form_validation->set_rules($rules);
			//$this->form_validation->set_rules($fields);
			if ($this->form_validation->run() == FALSE){
				$this->session->set_userdata('error', 'Please paste you code');
				redirect('');
			}else{
				if($_POST['patito2'] != "no se que pasa"){
					redirect('');
				}
				$this->load->model('paste');
				$_POST['name'] = $this->input->post('name',TRUE);
				$_POST['description'] = $this->input->post('description',TRUE);
				$url = $this->paste->setPaste($_POST);
				$this->load->model('language');
				$this->language->incLanguage($_POST['language']);
				$this->session->set_userdata('success', 'Your code has been added');
				//save cookie
				if($_POST['name'] != NULL){ 
				$cookie = array(
				                   'name'   => 'name',
				                   'value'  => $this->input->post('name',TRUE),
				                   'expire' => '604800',
				                   /*'domain' => 'paste2.dev',*/
				                   'path'   => '/',
				                   'prefix' => 'mypaste_',
				               );

				set_cookie($cookie);
				}
				//
				redirect('show/'.$url);
			}
		}
	}
   
      //añade el codigo y hace redirect al codigo
   function file()
   {
      if(!isset($_POST['submit']))
      {
         redirect('');
      }
      else
      {
         $this->load->library('form_validation');
         //$this->load->helper('Flash_Notice');
	 $rules['code'] = "required";
         $fields['code'] = "I NEED YOU CODE!!!!!!!!!!";
	 $this->form_validation->set_rules($rules);
	 $this->form_validation->set_fields($fields);
	 if ($this->form_validation->run() == FALSE)
         { //$this->session->set_flashdata('item', 'I NEED YOU CODE!!!!!!!!!!');
            //FlashNotice::add("Please paste you code", 'error');
	    //redirect('');
            echo "Tu archivo no tiene contendido";
	 }
         else
         {
	   $this->load->model('paste');
	   $_POST['name'] = $this->input->xss_clean($_POST['name']);
           $_POST['description'] = $this->input->xss_clean($_POST['description']);
	   $url = $this->paste->setPaste($_POST);
	   $this->load->model('language');
	   $this->language->incLanguage($_POST['language']);
           //$this->load->view('add',$data);
           //FlashNotice::add("your code has been added", 'success');
           echo $this->config->item('base_url')."show/".$url;
	             // redirect('show/'.$url);
         }
      }
   }

	//muestra el codigo
	function show(){
		$cad = $this->uri->segment(2);
		if($cad == NULL){
			//$this->session->set_flashdata('item', 'I NEED YOU CODE!!!!!!!!!!');
			redirect('');
		}else{ 
			$this->load->model('paste');
			$data = $this->paste->getPaste($cad);
			$this->load->library('geshi');
			$data['origin']=html_entity_decode($data['source']);
			$this->geshi->GeSHi($data['origin'], $data['value']);
			$data['origin']=$data['source'];
			//$this->geshi->set_header_type(GESHI_HEADER_PRE);
			$this->geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS,2);
			$this->geshi->set_line_style('background: #fcfcfc;', 'background: #E5E5E5;');
			$this->geshi->set_code_style('font-family:inherit;');
			$this->geshi->set_header_type(GESHI_HEADER_DIV);
			//$this->geshi->set_comments_style(1, 'font-style: italic;');
			//$this->geshi->set_comments_style('MULTI', 'display: hidden;');
			$data['texto']= $this->geshi->parse_code();
			$this->load->model('language');
			$data['options']=$this->language->getLanguage();
			//$data['recent']=$this->paste->getRecent(); 
			//print_r($data);
			if(get_cookie('mypaste_name')){
				$data['name'] = get_cookie('mypaste_name');
			}else{
				$data['name'] = "";
			}
			$data['success'] = $this->session->userdata('success');
			if($data['success']) $this->session->unset_userdata('success');
			//$this->load->view('show',$data);
			$this->load->view('simpla/show',$data);    
		}
	}
      
      //el acerca de paste code
	function about()
	{
	  $this->load->model('language');
	  $rank=$this->language->rank();
	  $len=NULL; $num=NULL;
	  foreach($rank as $k => $v){
	     if($len == NULL){
	        $len=$k;
		$num=$v;
	     }else{
	       $len.="|".$k;
	       $num.=",".$v;
	     }
	  }
	  $data['language']=$len;
	  $data['numero']=$num;
	  $this->load->model('paste');
	  $data['recent']=$this->paste->getRecent();
	  $this->load->view('about',$data);
	}

	//bajar el codigo
	function download(){
		$cad = $this->uri->segment(2);
		if($cad == NULL){
			redirect("");
		}else{
			$this->load->model('paste');
			$data = $this->paste->getPaste($cad);
			$data['origin']=html_entity_decode($data['source']);
			$this->load->helper('download');
			force_download($data['user'].".txt",$data['origin']);
		}
	}


	//codidos por pagina
	function page($page) { 
		$this->load->library('pagination');
		$this->db->where('status',1);
		$config['base_url'] = base_url().'ajax_list/';
		$config['total_rows'] = $this->db->count_all_results('code');
		$config['per_page'] = '10';
		$config['cur_page']=$page;
			$config['full_tag_open'] = '<div class="pagination">';
			$config['full_tag_close'] = '</div>';
			$config['next_link'] = 'Next &raquo;';
			$config['prev_link'] = '&laquo; Previous';
			$config['last_link'] = 'Last &raquo;';
			$config['first_link'] = '&laquo; First';
			$config['cur_tag_open'] = '	<a href="#" class="number current">';
			$config['cur_tag_close'] = '</a>';
		$this->pagination->initialize($config);

		$this->load->model('paste');
		$data['results'] = $this->paste->getList($config['per_page'],$page);
		return $data['results'];//$this->load->view('simpla/list',$data,true);
	}
	
	function ajax_list(){
		//echo $this->uri->segment(2);
		$data['results'] = $this->page($this->uri->segment(2));
		echo $this->load->view('simpla/list',$data);
	}
	
	function ajax_form(){
		$this->load->model('language');
		$data=$this->language->getLanguage();
		if(get_cookie('mypaste_name')){
			$data['name'] = get_cookie('mypaste_name');
		}else{
			$data['name'] = "";
		}
		$data['error']=0;
		$this->load->view('simpla/ajax_form',$data);
	}
	
	function list_ajax(){
		$data['results'] = $this->page($this->uri->segment(2));
		echo $this->load->view('simpla/ajax_list',$data);
	}

}
?>