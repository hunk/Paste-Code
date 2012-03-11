<script>
$(document).ready(function(){
$('.list_code tbody tr:even').addClass("alt-row");
});
</script>
<div id="main-content1"> 
<div class="content-box-header">
	<h3>List Paste</h3>
	<div class="clear"></div>
</div>
<div class="content-box-content">
	<div class="tab-content list_code">
		<?php $this->load->view('simpla/list'); ?>
	</div>        
</div>
</div>
