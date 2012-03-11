<?php $this->load->view('header'); ?>
 <div id="mensajes"> <?php FlashNotice::display(); ?></div>
		<div id="content">
			<?php $this->load->view('form');?>
		</div>
		<div id="sub-content"> 
			<?php $this->load->view('sidebar');?>
			<?php $this->load->view('adsense1');?>
		</div>
	</div></div>
<?php $this->load->view('footer')?>
