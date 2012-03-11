    
    <?php echo form_open('code/add');?>
    Name:<br />
    <?php echo form_input('name',$name);?><br />
    description:<br />
    <?php echo form_input('description');?><br />
    Language:<br />
    <?php echo form_dropdown('language', $options);?><br />
    Time:<br />
    <?php $time=array('1'=>'1 hour','2'=>'1 day','3'=>'1 week','4'=>'1 month')?>
	<?php echo form_dropdown('time',$time,'4')?><br >
    Code:<br />
    <?php $data = array(
              'name'        => 'code',
              'id'          => 'code',
            );?>
    <?php echo form_textarea($data);?><br />
    <?php $data = array(
    'name'        => 'submit',
    'id'          => 'submit',
    'class'       => 'btn',
        );?>
    <?php echo form_submit($data,'submit');?>
    <?php echo "<br />"; ?> <input id="super_campo_que_debe_esta_escondido" name="patito" type="text" >
    <?php echo "<br />"; ?> <input id="super_campo_que_debe_esta_escondido" name="patito2" value="dos" type="text" >
    <?php echo form_close();?>