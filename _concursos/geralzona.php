<?php
	ini_set('default_charset', 'UTF-8');
	$abertas_xml = simplexml_load_file('xml/abertas.xml');
	
	$array_uf = array('br', 'ac', 'al', 'am', 'ap', 'ba', 'ce', 'df', 'es', 'go', 'ma', 'mg', 'mt', 'ms', 'pb', 'pb', 'pe', 'pi', 'pr', 'rj', 'rn', 'ro', 'rr', 'rs', 'sc', 'se', 'sp', 'to');
	$end = "";
	
	$headline1 = array();
	$headline2 = array();
	$headline3 = array();
	$headline4 = array();
	$headline5 = array();
	$headline6 = array();
	$headline7 = array();
	
	for ($x = 0; $x < count($array_uf); $x++) {
		$uf_all = $array_uf[$x];
		
		$i = 0;
		foreach($abertas_xml->$uf_all as $uf_xml) {
			
			$name = $abertas_xml->$uf_all[$i++]['name'];
			
			$salario = $uf_xml->salario;
			$salario = 'R$ ' . number_format((float)$salario,2,",",".");
			
			//Convertendo Tags dos textos...
			$paragrafos = $uf_xml->paragrafos;
			$paragrafos = str_replace('##', '<', $paragrafos);
			$paragrafos = str_replace('||', '>', $paragrafos);
			//incluindo valor nas variáveis citadas no texarea
			$paragrafos = str_replace('$sigla', $uf_xml->sigla, $paragrafos);
			$paragrafos = str_replace('$vagas', $uf_xml->vagas, $paragrafos);
			$paragrafos = str_replace('$salario', $salario, $paragrafos);
			$paragrafos = str_replace('$inicio_inscricoes', $uf_xml->inicioinscricoes, $paragrafos);
			$paragrafos = str_replace('$termino_inscricoes', $uf_xml->terminoinscricoes, $paragrafos);
			//selecionando só as tags <p>
			$paragrafos = str_replace('<p>', '<p>linuspsan', $paragrafos);
			$paragrafos = str_replace('</p>', '<p>', $paragrafos);
			
			$cheat_p = "";
			$array_paragrafos = explode("<p>", $paragrafos); 
			for ($m = 0; $m < 6 /*count($array_paragrafos)*/; $m++) {
				if (strpos($array_paragrafos[$m], 'linuspsan') !== false) {
					$cheat_p .= "<p>" . $array_paragrafos[$m] . "</p>";
				}
			}
			$cheat_p = str_replace('linuspsan', '', $cheat_p);
			
			$paragrafos = $cheat_p;
			
			
			
			
			/*guardei para lembrar: função replace para apenas a primeira ocorrencia
				$paragrafos = preg_replace('[<p>]', '"' . $z . '"=>"' , $paragrafos, 1);
			*/
			
			$end_upper = strtolower($uf_xml->uf);
			switch ($end_upper) {
				case "br": $end = "no-brasil"; break;
				case "df": $end = "no-distrito-federal"; break;
				//sudeste
				case "sp": $end = "em-sao-paulo"; break;
				case "rj": $end = "no-rio-de-janeiro"; break;
				case "es": $end = "no-espirito-santo"; break;
				case "mg": $end = "em-minas-gerais"; break;
				
				//sul
				case "rs": $end = "no-rio-grande-do-sul"; break;
				case "sc": $end = "em-santa-catarina"; break;
				case "pr": $end = "no-parana"; break;
				
				//centro-oeste
				case "mt": $end = "no-mato-grosso"; break;
				case "ms": $end = "no-mato-grosso-do-sul"; break;
				case "go": $end = "em-goias"; break;
				
				//norte
				case "am": $end = "no-amazonas"; break;
				case "rr": $end = "em-roraima"; break;
				case "ap": $end = "no-amapa"; break;
				case "pa": $end = "na-para"; break;
				case "to": $end = "em-tocantins"; break;
				case "ro": $end = "em-rondonia"; break;
				case "ac": $end = "no-acre"; break;
				
				//nordeste
				case "ma": $end = "no-maranhao"; break;
				case "pi": $end = "no-piaui"; break;
				case "ce": $end = "no-ceara"; break;
				case "rn": $end = "no-rio-grande-do-norte"; break;
				case "pe": $end = "em-pernambuco"; break;
				case "pb": $end = "na-paraiba"; break;
				case "se": $end = "em-sergipe"; break;
				case "al": $end = "em-alagoas"; break;
				case "ba": $end = "na-bahia"; break;
				default:
			}
			
			if (($uf_xml->manchete != "0") && ($uf_xml->replica == "N")) {
				switch ($uf_xml->manchete) {
					case 1: array_push($headline1, $name, $uf_xml->sigla, $uf_xml->instituicao, $uf_xml->apresentacao, $paragrafos, $end); break;
					case 2: array_push($headline2, $name, $uf_xml->sigla, $uf_xml->instituicao, $uf_xml->apresentacao, $paragrafos, $end); break;
					case 3: array_push($headline3, $name, $uf_xml->sigla, $uf_xml->instituicao, $uf_xml->apresentacao, $paragrafos, $end); break;
					case 4: array_push($headline4, $name, $uf_xml->sigla, $uf_xml->instituicao, $uf_xml->apresentacao, $paragrafos, $end); break;
					case 5: array_push($headline5, $name, $uf_xml->sigla, $uf_xml->instituicao, $uf_xml->apresentacao, $paragrafos, $end); break;
					case 6: array_push($headline6, $name, $uf_xml->sigla, $uf_xml->instituicao, $uf_xml->apresentacao, $paragrafos, $end); break;
					case 7: array_push($headline7, $name, $uf_xml->sigla, $uf_xml->instituicao, $uf_xml->apresentacao, $paragrafos, $end); break;
					default:
				}
			}
		}
	}
	
	
	
?>

<h1>Concursos Públicos no Brasil</h1>
<article>
	<div class="headline1"><!--1-->
		<a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-<?php echo $headline1[5] . '/' . $headline1[0] ?>" alt="concurso-publico-<?php echo $headline1[5]?>" onmouseover="document.getElementsByTagName('img')[1].setAttribute('style', 'transform: scale(1.006, 1.006)')" onmouseout="document.getElementsByTagName('img')[1].removeAttribute('style')">
			<img src="http://www.siteconcursos.com.br/imagens/concursos/<?php echo $headline1[0] ?>.png" alt="" width="100%" height="auto"/>
			<div>
				<h2><?php echo strtoupper($headline1[1]) . " - " . $headline1[2] ?></h2>
				<p><?php $head1b = explode("<p>", $headline1[4]); echo $headline1[3] . "</br><span>" . str_replace("</p>", "</span>", $head1b[1]); ?></p>
			</div>
		</a>
	</div>
	<div class="headline1"><!--2-->
		<a id="link-cheat1" href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-<?php echo $headline2[5] . '/' . $headline2[0] ?>" alt="concurso-publico-<?php echo $headline2[5]?>" >
			<img src="http://www.siteconcursos.com.br/imagens/concursos/<?php echo $headline2[0] ?>.png" alt="" width="auto" height="100%"/>
		</a>
		<div id="head-temp" onclick="document.getElementById('link-cheat1').click()">
			<h2><?php echo $headline2[1] . " - " . $headline2[2] ?></h2>
			<div class="container-cheat-p"><?php echo "<p>" . $headline2[3] . "</p>" . $headline2[4] ?></div>
		</div>
	</div>
	<div class="headline1"><!--3-->
		<a id="link-cheat2" href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-<?php echo $headline3[5] . '/' . $headline3[0] ?>" alt="concurso-publico-<?php echo $headline3[5]?>" >
			<img src="http://www.siteconcursos.com.br/imagens/concursos/<?php echo $headline3[0] ?>.png" alt="" width="auto" height="100%"/>
		</a>
		<div onclick="document.getElementById('link-cheat2').click()">
			<h2><?php echo $headline3[1] . " - " . $headline3[2] ?></h2>
			<div class="container-cheat-p"><?php echo "<p>" . $headline3[3] . "</p>" . $headline3[4] ?></div>
		</div>		
	</div>
	<div id="container-headline2">
		<a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-<?php echo $headline4[5] . '/' . $headline4[0] ?>" alt="concurso-publico-<?php echo $headline4[5]?>">
			<h2><?php echo $headline4[1] ?></h2>
			<p><?php echo $headline4[3] ?></p>
		</a>
		<a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-<?php echo $headline5[5] . '/' . $headline5[0] ?>" alt="concurso-publico-<?php echo $headline5[5]?>">
			<h2><?php echo $headline5[1] ?></h2>
			<p><?php echo $headline5[3] ?></p>
		</a>
		<a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-<?php echo $headline6[5] . '/' . $headline6[0] ?>" alt="concurso-publico-<?php echo $headline6[5]?>">
			<h2><?php echo $headline6[1] ?></h2>
			<p><?php echo $headline6[3] ?></p>
		</a>
		<a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-<?php echo $headline7[5] . '/' . $headline7[0] ?>" alt="concurso-publico-<?php echo $headline7[5]?>">
			<h2><?php echo $headline7[1] ?></h2>
			<p><?php echo $headline7[3] ?></p>
		</a>
	</div>
</article>

<div id="container-ads-section-rodape">
	<!-- script ADSENSE -->
</div>



