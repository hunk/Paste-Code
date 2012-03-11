<?php if($error) {?>	
	<div class="notification error png_bg">
		<a href="#" class="close"><img src="/webroot/simpla/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div> <?php echo $error?> </div>
	</div>
<?php } ?>
<form method="post" action="/code/add">
	
	<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
		
		<p>
			<label>Name</label>
				<input class="text-input small-input" type="text" name="name" value="<?php echo $name?>" />
				<br /><small>Paste code save one cookie with you name</small>
		</p>
		
		<p>
			<label>Description</label>
			<input class="text-input medium-input" type="text" name="description" /> 
		</p>
		
		<p>
			<label>Language</label>  
			<?php echo form_dropdown('language', $options,'','class="small-input"');?>            
		</p>
		
		<p>
			<label>Time</label>              
			<?php $time=array('1'=>'1 hour','2'=>'1 day','3'=>'1 week','4'=>'1 month')?>
			<?php echo form_dropdown('time',$time,'4','class="small-input"')?>
		</p>
		
		<p>
			<label>Code</label>
			<textarea class="text-input textarea" id="code" name="code" cols="79" rows="15"></textarea>
		</p>
		
		<p>
			<input id="super_campo_que_debe_esta_escondido" class="field_hide" name="patito" type="text" >
		    <input id="super_campo_que_debe_esta_escondido2" class="field_hide hide_paste" name="patito2" value="dos" type="text" >
			<input class="button" type="submit" id="submit" value="Submit" name="submit" />
			
		</p>
		
	</fieldset>
	
	<div class="clear"></div><!-- End .clear -->
	
</form>