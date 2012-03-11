	<?php if(!empty($results)){ ?> 
	<table>
		
		<thead>
			<tr>
			   
			   <th>Name</th>
			   <th>Description</th>
			   <th>Language</th>
			   <th>Created</th>
			   <th>When</th>
			</tr>
			
		</thead>
	 
		<tfoot>
			<tr>
				<td colspan="6">
					
					<?php echo $this->pagination->create_links(); ?>
			
					<div class="clear"></div>
				</td>
			</tr>
		</tfoot>
	 
		<tbody>
			<?php foreach($results as $result) { ?>
			<tr>	
				<td><a href="<?php echo $result['url']; ?>"><?php echo $result['name']?></a></td>
				<td><?php echo $result['description']; ?></td>
				<td><?php echo $result['language'];?></td>
				<td><?php $fecha=strtotime($result['created']); setlocale(LC_TIME,"en_EN"); echo strftime("%d %h %H:%M",$fecha); ?></td>
				<td><?php  $fecha=strtotime($result['created']); $nueva=time() - $fecha; $p = timespan($fecha, time()); echo $p. " ago."; ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
<?php } ?>