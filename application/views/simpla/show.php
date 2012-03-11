<?php 
$data['main']=0;
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
						<li><a href="#tab1" id="new_paste" class="default-tab">View Paste</a></li>
						<li><a href="#tab2" id="list_paste" >Fork Paste</a></li> 
						
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
			   
					<div class="tab-content" id="tab2"> 
						
						<?php $this->load->view('simpla/edit'); ?>
						
					</div> <!-- End #tab2 -->
					
					<!-- begin #tab1 -->
					<div class="tab-content default-tab info_paste" id="tab1">
						<?php if($success) {?>
						<div class="notification success png_bg">
							<a href="#" class="close"><img src="/webroot/simpla/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div><?php echo $success?></div>
						</div>
						<?php } ?>
						<p class="info_paste">Pasted by <span class="data_paste"><?php echo $user; ?></span></p>
						<p class="info_paste">Description <span class="data_paste"><?php echo $description; ?></span></p>
						<p class="info_paste">On <span class="data_paste"><?php $fecha=strtotime($created);
					setlocale(LC_TIME,"en_EN"); echo strftime("%A %d %h %H:%M",$fecha); ?></span></p>
						<p class="info_paste">Language <span class="data_paste"><?php echo $language;?></span></p>
						<p class="info_paste">Url <span class="data_paste"><?php echo anchor($url,$url);?></span></p>
						<p class="info_paste">Download <span class="data_paste"><?php echo anchor('download/'.$token,'Here');?></span></p>
						<div id="pastecode">
					    <?php echo $texto; ?>
				    </div>
						
					</div> <!-- End #tab1 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
		
			<div class="clear"></div>
			
<?php $this->load->view('simpla/footer'); ?>