<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="">
    <meta name="viewport" content="width=device-width">
	<meta name="author" content="Arthur Vieira Moreira Lucena">
	<title>Layout</title>
	
	<link rel="stylesheet" type="text/css" href="/css/normalize.min.css">
	<link rel="stylesheet" type="text/css" href="/fonts/Bariol-Regular/font.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	
	<script type="text/javascript" src="/js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
<!--[if lt IE 7]>
	<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
<div id="wrapper">
	<div style="width:800px; margin:0 auto;">
        <div style="width:268px;float:left;">
			<div id="nav" style="height:286px;">
				<a href="/home/">
					<div id="xm-bt-home" class="xm-bt">
					    <img class="xm-bt-img" src="/images/home.png" /> 
					    <div class="xm-bt-sub">arthur</div>
					</div>
				</a>
				
				<a href="/contact/">
					<div id="xm-bt-contact" class="xm-bt">
					    <img class="xm-bt-img" src="/images/contact.png" />    
					    <div class="xm-bt-sub">contact</div>
					</div>
				</a>
				
				<a href="/work/">
					<div id="xm-bt-work" class="xm-bt">
					    <img class="xm-bt-img" src="/images/work.png" /> 
					    <div class="xm-bt-sub">work</div>
					</div>
				</a>
				
				<a href="/bio/">
					<div id="xm-bt-bio" class="xm-bt">
					    <img class="xm-bt-img" src="/images/bio.png" />    
					    <div class="xm-bt-sub">bio</div>
					</div>
				</a>
			</div>
			<div id="logo" style="height:196px; width:268px; text-align:center;">
				<span id="bt-es" class="multi-lang" style="margin-top:10px; margin-left:5px; margin-right:9px; background-color:#666; opacity:0.2; color:#ddd; font-size:1.7em; display:block;">Spanish</span>
				<span id="bt-ptbr" class="multi-lang" style="margin-top:10px; margin-left:5px; margin-right:9px; background-color:#666; opacity:0.2; color:#ddd; font-size:1.7em; display:block;">Portuguese</span>
				<span id="bt-en" class="multi-lang" style="margin-top:10px; margin-left:5px; margin-right:9px; background-color:#666; opacity:0.2; color:#ddd; font-size:1.7em; display:block;">English</span>
				<!-- <img src="http://arthurvieira.com/images/mlogo.png" style="height:180px; width:180px; margin-top:10px;" />  -->
			</div>
        </div>
        <div id="cont" style="min-height:494px; width:532px; float:left; ">
        	<div class="background-translucent"></div>
			<?php 
				if (isset($_GET['page'])) {
					include 'pages/'.$_GET['page'].'.php';
				} else {
					include 'pages/home.php';
				}
			?>
        </div>
		<div id="social" style="height:40px; width:100%; float:left;">
			<div class="background-translucent"></div>
        	<div class="text-opaque">
        		<div class="social-bt" style="float:left;"> 
        			<img src="/images/social/deviantart.png" />    
        		</div>
        		<div class="social-bt" style="float:left;"> 
        			<img src="/images/social/facebook.png" />    
        		</div>
        		<div class="social-bt" style="float:left;"> 
        			<img src="/images/social/github.png" />    
        		</div>
        		<div class="social-bt" style="float:left;"> 
        			<img src="/images/social/linkedin.png" />    
        		</div>
        		<div class="social-bt" style="float:left;"> 
        			<img src="/images/social/skype.png" />    
        		</div>
        		<div class="social-bt" style="float:left;"> 
        			<img src="/images/social/twitter.png" />    
        		</div>
        		<div style="float:right; margin-top:8px; margin-right:5px; color:black;">
        			arthur vieira m. lucena, 2013 çã
        		</div>
        	</div>
		</div>
    </div>
</div>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script type="text/javascript" src="/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
<script type="text/javascript" src="/js/plugins.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38393794-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

</body>
</html>
<!-- 
Layout bacana
http://programming.mvergel.com/2011/08/speed-up-eclipse.html#.UNspGOR318E

inspiração:
http://www.amazeelabs.com/en
http://luciasoto.es/
http://lab.4muladesign.com/dribbble/
http://www.4muladesign.com/

ler:
http://tableless.com.br/mobile-first-a-arte-de-pensar-com-foco/
-->
