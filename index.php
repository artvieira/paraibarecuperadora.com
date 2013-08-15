<?php 
	include 'lib/MobileDetect.php';
	$detect = new Mobile_Detect();
	
	if ($detect->isMobile()) {
		header("Location: http://mobile.paraibarecuperadora.com.br");
	}

	$GLOBALS['title']  = ' - Paraiba Recuperadora';

	$keyWords = array();
	$keyWords['servicos'] 		= 'paraiba, recuperadora, recuperação, recuperacao, reparos, peças, caminhoes, caminhões, carreta, carretas, cabines, cabine, scania, iveco, volvo, mercedes, ford, volks, volkswagen, caminhões scania, caminhões iveco, caminhões volvo, caminhões mercedes, caminhões ford, caminhões volks, caminhões volkswagen, caminhão scania, caminhão iveco, caminhão volvo, caminhão mercedes, ford, caminhão volks, caminhão volkswagen, caminhao scania, caminhao iveco, caminhao volvo, caminhao mercedes, caminhao ford, caminhao volks, caminhao volkswagen, caminhoes scania, caminhoes iveco, caminhoes volvo, caminhoes mercedes, caminhoes ford, caminhoes volks, caminhoes volkswagen';
	$keyWords['sobre'] 			= 'paraiba, recuperadora, oficina, recuperadora, caminhões, uberlandia, uberlândia';
	$keyWords['contato'] 		= 'paraiba, recuperadora, endereco, envie, email, telefones, uberlandia, uberlândia';
	$keyWords['trabalhos'] 		= '';
	
	$description = array();
	$description['servicos'] 	= 'Recuperação e reparos de cabines e caminhões de todas as marcas. Serviço de funilaria, pintura, mecânica e eletrica. Os melhores preços do mercado.';
	$description['sobre'] 		= 'Empresa de recuperação de cabines e serviços de funilaria, pintura, mecânica e eletrica. Localizada em otima localização dentro de Uberlândia.';
	$description['contato'] 	= 'Endereço: Av. José de Castro Bispo 129 - Residencial Gramado - Uberlândia(MG), Telefones: (034)9147-4479 (TIM), (034)8872-8160 (OI). Envie um email para nós! Otima localização dentro de Uberlândia.';
	$description['trabalhos'] 	= 'Em construção...';
	
	if (isset($_GET['page'])) {
		$GLOBALS['includePage'] = 'pages/'.$_GET['page'].'.php';
	
		if ($_GET['page'] == 'sobre') {
			$GLOBALS['title'] 			= 'Sobre Nós' . $GLOBALS['title'];
			$GLOBALS['keyWords'] 		= $keyWords['sobre'];
			$GLOBALS['description'] 	= $description['sobre'];
		} else if ($_GET['page'] == 'contato') {
			$GLOBALS['title'] 			= 'Contato' . $GLOBALS['title'];
			$GLOBALS['keyWords'] 		= $keyWords['contato'];
			$GLOBALS['description'] 	= $description['contato'];
		} else if ($_GET['page'] == 'servicos') {
			$GLOBALS['title'] 			= 'Serviços' . $GLOBALS['title'];
			$GLOBALS['keyWords'] 		= $keyWords['servicos'];
			$GLOBALS['description'] 	= $description['servicos'];
		} else if ($_GET['page'] == 'trabalhos') {
			$GLOBALS['title'] 			= 'Trabalhos & Clientes' . $GLOBALS['title'];
			$GLOBALS['keyWords'] 		= $keyWords['trabalhos'];
			$GLOBALS['description'] 	= $description['trabalhos'];
		} else {
			header('Location: /404.html');
		}
	} else {
		$GLOBALS['title'] 		    = 'Serviços' . $GLOBALS['title'];
		$GLOBALS['includePage'] 	= 'pages/servicos.php';
		$GLOBALS['keyWords'] 		= $keyWords['servicos'];
		$GLOBALS['description'] 	= $description['servicos'];
	}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang=”pt-br” class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang=”pt-br" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang=”pt-br” class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang=”pt-br” class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
	
	<meta name="description" content="<?php echo $GLOBALS['description']; ?>" />
	<meta name="keywords" content="<?php echo $GLOBALS['keyWords']; ?>" />
    <meta name="author" content="Arthur VML - @art_vieira" />
	
	<meta name="msapplication-TileColor"  content="#333333"/>
	<meta name="msapplication-TileImage" content="/images/logo.png"/>
	
	<title><?php echo $GLOBALS['title'] ; ?></title>
	
	<link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
    <link rel="stylesheet" type="text/css"  href="/css/normalize.min.css"/>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Raleway:200,300,400,700"/>
	<link rel="stylesheet" type="text/css" href="/css/main.css"/>
	
	<script type="text/javascript" src="/js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>

<!--[if lt IE 7]>
<p class="chromeframe">Seu navegador está desatualizado! Por favor atualize <a href="http://browsehappy.com/">AQUI</a> seu navegador ou <a href="http://www.google.com/chromeframe/?redirect=true">ative Google Chrome Frame</a> para melhorar sua experiencia de navegação neste site.<p>
<![endif]-->

<header>
	<a href="/">
		<img alt="Paraiba Recuperadora" src="/images/header.png" style="margin:0 auto; display:block;">
	</a>
</header>
	
<nav style="text-align:center;">
	<ul>
		<li>
			<a class="nav" href="/sobre/">Sobre Nós</a>
		</li>
		<li>
			<a class="nav" href="/contato/">Contato</a>
		</li>
		<li>
			<a class="nav" href="/servicos/">Serviços</a>
		</li>
		<li>
			<a class="nav" href="/trabalhos/">Trabalhos & Clientes</a>
		</li>
	</ul>
</nav>

<div id="wrapper">
	<section>
		<?php include $GLOBALS['includePage']; ?>
	</section>
	
	<footer style="width:100%; height:60px; color:#aaa; background:#333; text-align: center; clear:both;">
		<a href="http://arthuvieira.com" style="float:left; margin-top:10px;">
			<img alt="HTML5+CCS3" src="/images/HTML5+CSS3_65x40.png">	
		</a>
		
		<a style="float:left; margin-top:10px;" href="https://www.digitalocean.com/?refcode=0228080b172b">
			<img alt="Digital Ocean" src="https://www.digitalocean.com/assets/v2/badges/digitalocean-badge-white.png">
		</a> 
		
		<p style="text-align:center; margin:0px; font-size: 1.5em;">Todos direitos reservados Paraíba Recuperadora&copy;</p>
	</footer>
</div>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script type="text/javascript" src="/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
<script type="text/javascript" src="/js/vendor/jquery.slides.min.js"></script>
<script type="text/javascript" src="/js/plugins.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript">
 var _gaq = _gaq || [];
 _gaq.push(['_setAccount', 'UA-39608187-1']);
 _gaq.push(['_trackPageview']);

 (function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
 })();
</script>
</body>
</html>