<form method="post" action="/code/add">
	
	<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
		
		<p>
			<label>Name</label>
				<input class="text-input small-input" type="text" name="name" value="<?php echo $name; ?>" />
				<br /><small>Paste code remember you name for one cookie</small>
		</p>
		
		<p>
			<label>Description</label>
			<input class="text-input medium-input" type="text" name="description" value="<?php echo $description; ?>" />
		</p>
		
		<p class="language_edit">
			<label>Language</label>
			<?php echo form_dropdown('language', $options['options'],$language_id,'class="small-input"');?>            
		</p>
		
		<p>
			<label>Time</label>              
			<?php $time=array('1'=>'1 hour','2'=>'1 day','3'=>'1 week','4'=>'1 month')?>
			<?php echo form_dropdown('time',$time,'4','class="small-input"')?>
		</p>
		
		<p>
			<label>Code</label>
			<textarea class="text-input textarea" id="code" name="code" cols="79" rows="25"><?php echo $origin; ?></textarea>
		</p>
		
		<p>
			<input id="super_campo_que_debe_esta_escondido" class="field_hide" name="patito" type="text" >
		    <input id="super_campo_que_debe_esta_escondido2" class="field_hide" name="patito2" value="dos" type="text" >
			<input class="button" type="submit" id="submit" value="Submit" name="submit" />
			
		</p>
		
	</fieldset>
	
	<div class="clear"></div><!-- End .clear -->
	
</form>