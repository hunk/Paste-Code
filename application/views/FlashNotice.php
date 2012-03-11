<?php $CI = get_instance(); ?>


		<div id='FlashNotice' class='hide'>
		<!--	<div id='FlashNoticeHeader'> -->
				<!--<a href='#close' class='close' title='Close'></a> -->
				<!--Notice -->
			<!--</div>-->
			<div class='clear'></div>
			<div id='FlashNoticeContent'>
			<?php
			// For each of the different meassage-types
			// Look through the 'FlashNotice' Session and
			// see if there are any messages to display
			// If so, then format the HTML output for them
			$FlashNotice = $CI->session->userdata('FlashNotice');
			foreach(FlashNotice::getTypes() as $type):
				if( isset($FlashNotice[$type])
					&& count($FlashNotice[$type]) > 0):
			?>
				<div class='message <?php echo $type?>'>
					<span><?php echo $type?></span>
					
					<?php
					// Format each message of the current message-type
					// into <li> elements inside the current <ul>
					foreach($FlashNotice[$type] as $message):
					?>			
						
							<?php echo $message?>
						
					<?php
					endforeach; // $FlashNotice[$type] as $message
					?>
					
				</div>
			
				<?php
				endif; // count($FlashNotice[$type]) > 0
			endforeach; // $types as $type
			?>
			<!--	<div id='FlashNoticeFooter'> -->
					<!--<a href='#close' class='close' title='Close'></a>-->
				<!--</div>-->
			</div>
		</div>

