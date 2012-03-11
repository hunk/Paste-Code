<?php $this->load->view('header'); ?>
  <?php /*FlashNotice::display();*/ ?>
		<div id="content">
			
			<?php if(!empty($results)){ ?> 
			       <table>
				<thead>
				<tr>
					<th scope="col">Name</th>
					<th scope="col">Description</th>
					<th scope="col">Language</th>
					<th scope="col">Created</th>
					<th scope="col">When</th>

				</tr>
			</thead>
			<tfoot>
				<tr><td colspan="4">&nbsp;</td></tr>
			</tfoot>
			<tbody>
			      
				<?php $i=0;?>
				<?php foreach($results as $result) {
      if($i%2){echo "<tr>";}else{echo "<tr class='odd' >";} $i++; ?>

      <td><a href="<? echo $result['url']; ?>"><?php echo $result['name']?></a></td>
      <td><?php echo $result['description']; ?></td>
      <td><span><?php echo $result['language'];?></span></td>
      <td><span><?php $fecha=strtotime($result['created']); setlocale(LC_TIME,"es_ES"); echo strftime("%d %h %H:%M",$fecha); ?></span></td>
      <td><span><?php  $fecha=strtotime($result['created']); $nueva=time() - $fecha; $p = timespan($fecha, time()); echo $p. " ago."; ?></span></td>
      </tr>
      					  <?php } ?>
			      </tbody>
			       </table> <br />
			       <?} else { ?>
    <p>no hay </p>
				   <? }?>
<center><?php echo $this->pagination->create_links(); ?></center>
			
		</div>
		<div id="sub-content"> 
			<?php $this->load->view('sidebar');?>
                        <?php $this->load->view('adsense1');?>
		</div>
	</div></div>
<?php $this->load->view('footer')?>

