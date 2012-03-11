<?php 
$data['main']=1;
$this->load->view('simpla/header',$data); ?>
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			<h2>Welcome <?php if($name){ echo $name; }else{ echo "Anonymous"; }?></h2>
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>What would you like to do?</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" id="new_paste" class="default-tab">New Paste</a></li>
						<li><a href="#tab2" id="list_paste" >List</a></li> 
						
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
			   
					<div class="tab-content list_code" id="tab2"> <!-- This is the target div. id must match the href of this div's tab -->			
						<?php $this->load->view('simpla/list'); ?>
						
					</div> <!-- End #tab2 -->
					
					<!-- begin #tab1 -->
					<div class="tab-content default-tab" id="tab1">
					
						<?php $this->load->view('simpla/form'); ?>
						
					</div> <!-- End #tab1 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
		
			<div class="clear"></div>
			
<?php $this->load->view('simpla/footer'); ?>