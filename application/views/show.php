<?php $this->load->view('header'); ?>
 <div id="mensajes"> <?php FlashNotice::display(); ?></div>
		<div id="content">
		    
		    <strong>Pasted by:</strong> <?php echo $user; ?><br />
    <strong>Description:</strong> <?php echo $description; ?><br />
    <strong>On:</strong> <?php $fecha=strtotime($created);
setlocale(LC_TIME,"es_ES");
echo strftime("%A %d %h %H:%M",$fecha); ?><br />
    <strong>Language:</strong><?php echo $language;?><br />
    <strong>Url:</strong> <?php echo anchor($url,$url);?><br />
    <strong>Download:</strong> <?php echo anchor('download/'.$token,'here');?> <br />
    <img src="/webroot/img/new/new.png" /><strong>View Code:</strong> &nbsp;<span id="vi_co"><a href="#" class="full_screen">Full screen</a></span>
    <br />
    <div id="pastecode">
    <?php echo $texto; ?>
    </div><br />
    		    
			<?php $this->load->view('form2');?>
		</div>
		<div id="sub-content"> 
			<?php $this->load->view('sidebar');?>
                        <?php $this->load->view('adsense1');?>
		</div>
	</div></div>
<?php $this->load->view('footer')?>
      
            
    

