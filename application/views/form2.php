<h5>Correction Code</h5>
    <?php echo form_open('code/add');?><br />
    Name:<br />
    <?php echo form_input('name');?><br />
    description:<br />
    <?php echo form_input('description',$description);?><br />
    Language:<br />
    <?php echo form_dropdown('language', $options['options'],$language_id);?><br />
    Time:<br />
    <?php $time=array('1'=>'1 hour','2'=>'1 day','3'=>'1 week','4'=>'1 month')?>
	<?php echo form_dropdown('time',$time,'4')?><br >
    Code:<br />
    <?php $data = array(
              'name'        => 'code',
              'id'          => 'code',
            );?>
    
	<?php echo form_textarea($data,$origin);?><br />
    <?php $data = array(
    'name'        => 'submit',
    'id'          => 'submit',
    'class'       => 'btn',
        );?>
        <input id="super_campo_que_debe_esta_escondido" name="patito" type="text" >
            <input id="super_campo_que_debe_esta_escondido" name="patito2" value="tranquis" type="text" >
    <?php echo form_submit($data,'submit');?>
    <?php echo form_close();?>