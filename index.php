<?php
	//Comum a todas as pags - Split url in parts:
	$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	$partes_url = explode('/', $url);
	$end = end($partes_url);
	$qtd_partes = count($partes_url);
	$parte_final = str_replace('-', ' ', $end);
	
	$p_dominio = array_slice(explode('.', $partes_url[0]), -3);
	$canonical_host = $p_dominio[0] . '.' . $p_dominio[1] . '.' . $p_dominio[2];
	
	$canonical_caminho = "";
	if (!empty($partes_url[1])) {
		for ($p_i = 1; $p_i < $qtd_partes; $p_i++) {
			$canonical_caminho .= "/" . $partes_url[$p_i];
		}
	}
	$canonical = 'https://www.' . $canonical_host . $canonical_caminho;
	
	//Inclui as paginas (módulos) com respectivas variáveis personalizadas (metas tags, title, h1, e <style>) para saídas "echo" na estrutura html abaixo:
	switch ($partes_url[1]) {
		case 'sala-de-estudo': include ('_sala-de-estudo/sala-de-estudo.php'); break;
		case 'questoes': include ('_questoes/questoes.php'); break;
		case 'provas': include ('_provas/provas.php'); break;
		default: include ('_concursos/concursos.php');//home
		//Em concursos.php outro switch realiza as variações de conteúdo em <main> (Inscrições Abertas, previstas, notícias, etc...)
	}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
	<!-- Meta-Geral -->
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title><?php echo $title ?></title>
	<meta name="description" content="<?php echo 'Concurso Público em todo o Brasil - Inscrições Abertas ou Previstas ' . $prepo . ' ' . $uf ?>">
	<meta name="keywords" content="Concurso Público, Inscrições Abertas <?php echo $prepo . ' ' . $uf ?>, Notícias de Concurso">
	<meta name="viewport" content="width=device-width">
	<meta name="robots" content="index, follow">
	<!-- Global site tag (gtag.js) - Google Analytics --x>
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZP16QTJSKG"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'G-ZP16QTJSKG');
		</script>
		<!-- Main script Google Adsense --x>
		<script data-ad-client="ca-pub-4603692535362798" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- ... -->
	<link rel="canonical" href="<?php echo $canonical?>">
	<link rel="icon" href="http://www.siteconcursos.com.br/imagens/v8favi.ico" type="image/png" />
	<link rel="stylesheet" type="text/css" href="http://www.siteconcursos.com.br/css/principal.css" media="all">
	<?php echo $style ?>
	<link rel="stylesheet" type="text/css" href="http://www.siteconcursos.com.br/css/corretor.css" media="all">
	<script type="text/javascript" src="http://www.siteconcursos.com.br/js/principal.js"></script>
</head>
<body>
<header>
	<div id="box-logo">
		<a href="http://www.siteconcursos.com.br" title="Site Concursos - Página Principal">
			<img src="http://www.siteconcursos.com.br/imagens/logo.png" alt="Logotipo Site concursos" width="102" height="32" />
		</a>
	</div>
	<div id="box-afs">
		<!-- script Adsense for Search (AFS) -->
	</div>
</header>

<aside id="col-esquerda"></aside>
<aside id="col-direita"></aside>
<aside id="col-principal">
	<?php
		switch ($partes_url[1]) {
			case 'sala-de-estudo':
			//...;
			break;
			case 'questoes':
			//...;
			break;
			case 'provas':
			//...;
			break;
			default:
			include ('asides/aside-principal.php');
		}
	?>
</aside>
	
<main>
<?php
	switch ($partes_url[1]) {
		case 'sala-de-estudo':
		if ($qtd_partes >= 3) {
			include ('_sala-de-estudo/') . $partes_url[2] . ('/nav-') . $partes_url[2] . ('.php');
			if ($qtd_partes >= 4) {
				include ('_sala-de-estudo/') . $partes_url[2] . ('/conteudo/') . $partes_url[3] . ('.php');
				}else{
				include ('_sala-de-estudo/') . $partes_url[2] . "/section-" .$partes_url[2] . ('.php');
			}
			} else {
			echo '<nav>
			<p>Nav Principal da Sala de estudos</p>' . PHP_EOL .
			'</nav>' . PHP_EOL .
			'<section>
			<p>Section Principal da Sala de estudos</p>' . PHP_EOL .
			'</section>' . PHP_EOL;
		}
		break;
		case 'questoes':
		echo $h1 . PHP_EOL;
		break;
		case 'provas':
		echo $h1 . PHP_EOL;
		break;
		default:
		echo $nav_concursos;
		echo "<section onscroll='roling(0)'>" . PHP_EOL;
		echo $ads_section_topo;
		include($conteudo);
		echo "</section>" . PHP_EOL;
	}
?>
</main>
	
<div id="box-ads-flutuante">
	<!-- script ADSENSE -->
</div>
	
<footer>
	<p>Dúvidas ou Sugestões: <b>contato@v8concursos.com.br</b></p>
</footer>
	
</body>
<script>
	window.addEventListener('resize', function() {rsz()})
</script>
</html>