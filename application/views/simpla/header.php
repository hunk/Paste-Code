<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 
	<head>
		
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="Keywords" content="paste code, show code, download code, collaborative, webtool, ideaslabs, hunk">
		<title>Paste Code</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="/webroot/simpla/css/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="/webroot/simpla/css/style.css" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="/webroot/simpla/css/invalid.css" type="text/css" media="screen" />	
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="/webroot/simpla/css/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
  
		<!-- jQuery -->
		<script type="text/javascript" src="/webroot/simpla/scripts/jquery-1.3.2.min.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="/webroot/simpla/scripts/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="/webroot/simpla/scripts/facebox.js"></script>
		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="/webroot/simpla/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	</head>
  
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<div id="header">
			<a href="/"><h1>Paste Code</h1><img id="logo" alt="Paste Code title" src="/webroot/simpla/images/logo.gif"/></a>
			<?php if($main){?>
			<span class="tabs">
				<a rel="new_paste" href="#tab1">New Paste</a>
				<a rel="list_paste" href="#tab2">List</a>
			</span>
			<?php }else{?>
				<span class="notabs">
					<a rel="modal" href="/form">New Paste</a>
					<a rel="modal" href="/list_ajax">List</a>
				</span>
			<?php } ?>
		</div>