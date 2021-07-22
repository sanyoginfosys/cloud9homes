<?php


function print_head($title = SITE_TITLE, $keywords = SEO_KEYWORD, $description = SEO_DESCRIPTION){
	echo "<head>
	<meta http-equiv='Content-Type' content='text/html; charset=GB18030'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
	<title>".$title." | ".SITE_TITLE."</title>
	<meta name='keywords' content='".$keywords."' />
	<meta name='description' content='".$description."' />
	<link rel='shortcut icon' href='".HOME_URL."favicon.ico' type='image/x-icon'>
	<link rel='icon' href='".HOME_URL."favicon.ico' type='image/x-icon'>

    <!-- Bootstrap -->
    <link rel='stylesheet' href='".HOME_URL."bootstrap/bootstrap.min.css'>    
	<!-- Font awesome styles -->    
	<link rel='stylesheet' href='".HOME_URL."apartment-font/css/font-awesome.min.css'>  
	<!-- Custom styles -->
	<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,500italic,700,700italic&amp;subset=latin,latin-ext'>
	<link rel='stylesheet' type='text/css' href='".HOME_URL."css/plugins.css'>
    <link rel='stylesheet' type='text/css' href='".HOME_URL."css/apartment-layout.css'>
    <link id='skin' rel='stylesheet' type='text/css' href='".HOME_URL."css/apartment-colors-blue.css'>
	<link rel='stylesheet' href='".HOME_URL."css/magnific-popup.css'>
	
    <!--[if lt IE 9]>
      <script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
      <script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
    <![endif]-->
	<style type='text/css'>";
	print_custom_css('Home');
	echo "</style>
	</head>";
}
