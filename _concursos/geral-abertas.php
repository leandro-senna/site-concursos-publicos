<?php
ini_set('default_charset', 'UTF-8');

$array_uf = array('br', 'ac', 'al', 'am', 'ap', 'ba', 'ce', 'df', 'es', 'go', 'ma', 'mg', 'mt', 'ms', 'pb', 'pb', 'pe', 'pi', 'pr', 'rj', 'rn', 'ro', 'rr', 'rs', 'sc', 'se', 'sp', 'to');

echo 
'<h1>' . $h1 . '</h1>' . PHP_EOL . 
'<span id="b-green">Inscrições Abertas</span>' . PHP_EOL .
'<article>' . PHP_EOL;


if (in_array("br", $array_uf)) {$end = "no-brasil"; echo '<fieldset>' . PHP_EOL . '<legend>Nacional</legend>' . PHP_EOL; articleXml("br", $end); echo '</fieldset>' . PHP_EOL;}
if (in_array("df", $array_uf)) {$end = "no-distrito-federal"; echo '<fieldset>' . PHP_EOL . '<legend>Distrito Federal</legend>' . PHP_EOL; articleXml("df", $end); echo '</fieldset>' . PHP_EOL;}
//sudeste
if (in_array("sp", $array_uf)) {$end = "em-sao-paulo"; echo '<fieldset>' . PHP_EOL . '<legend>São Paulo</legend>' . PHP_EOL; articleXml("sp", $end); echo '</fieldset>' . PHP_EOL;}
if (in_array("rj", $array_uf)) {$end = "no-rio-de-janeiro"; echo '<fieldset>' . PHP_EOL . '<legend>Rio de Janeiro</legend>' . PHP_EOL; articleXml("rj", $end); echo '</fieldset>' . PHP_EOL;}
if (in_array("es", $array_uf)) {$end = "no-espirito-santo"; echo '<fieldset>' . PHP_EOL . '<legend>Espirito Santo</legend>' . PHP_EOL; articleXml("es", $end); echo '</fieldset>' . PHP_EOL;}
if (in_array("mg", $array_uf)) {$end = "em-minas-gerais"; echo '<fieldset>' . PHP_EOL . '<legend>Minas Gerais</legend>' . PHP_EOL; articleXml("mg", $end); echo '</fieldset>' . PHP_EOL;}

//sul
if (in_array("rs", $array_uf)) {$end = "no-rio-grande-do-sul"; echo '<fieldset>' . PHP_EOL . '<legend>Rio Grande do Sul</legend>' . PHP_EOL; articleXml("rs", $end); echo '</fieldset>' . PHP_EOL;}
if (in_array("sc", $array_uf)) {$end = "em-santa-catarina"; echo '<fieldset>' . PHP_EOL . '<legend>Santa Catarina</legend>' . PHP_EOL; articleXml("sc", $end); echo '</fieldset>' . PHP_EOL;}
if (in_array("pr", $array_uf)) {$end = "no-parana"; echo '<fieldset>' . PHP_EOL . '<legend>Paraná</legend>' . PHP_EOL; articleXml("pr", $end); echo '</fieldset>' . PHP_EOL;}

//centro-oeste
if (in_array("mt", $array_uf)) {$end = "no-mato-grosso"; echo '<fieldset>' . PHP_EOL . '<legend>Mato Grosso</legend>' . PHP_EOL; articleXml("mt", $end); echo '</fieldset>' . PHP_EOL;}
if (in_array("ms", $array_uf)) {$end = "no-mato-grosso-do-sul"; echo '<fieldset>' . PHP_EOL . '<legend>Mato Grosso do Sul</legend>' . PHP_EOL; articleXml("ms", $end); echo '</fieldset>' . PHP_EOL;}
if (in_array("go", $array_uf)) {$end = "em-goias"; echo '<fieldset>' . PHP_EOL . '<legend>Goiás</legend>' . PHP_EOL; articleXml("go", $end); echo '</fieldset>' . PHP_EOL;}

//norte
if (in_array("am", $array_uf)) {$end = "no-amazonas"; echo '<fieldset>' . PHP_EOL . '<legend>Amazonas</legend>' . PHP_EOL; articleXml("am", $end); echo '</fieldset>' . PHP_EOL;}
if (in_array("rr", $array_uf)) {$end = "em-roraima"; echo '<fieldset>' . PHP_EOL . '<legend>Roraima</legend>' . PHP_EOL; articleXml("rr", $end); echo '</fieldset>' . PHP_EOL;}
if (in_array("ap", $array_uf)) {$end = "no-amapa"; echo '<fieldset>' . PHP_EOL . '<legend>Amapá</legend>' . PHP_EOL; articleXml("ap", $end); echo '</fieldset>' . PHP_EOL;}
if (in_array("pa", $array_uf)) {$end = "na-para"; echo '<fieldset>' . PHP_EOL . '<legend>Pará</legend>' . PHP_EOL; articleXml("pa", $end); echo '</fieldset>' . PHP_EOL;}
if (in_array("to", $array_uf)) {$end = "em-tocantins"; echo '<fieldset>' . PHP_EOL . '<legend>Tocantins</legend>' . PHP_EOL; articleXml("to", $end); echo '</fieldset>' . PHP_EOL;}
if (in_array("ro", $array_uf)) {$end = "em-rondonia"; echo '<fieldset>' . PHP_EOL . '<legend>Rondônia</legend>' . PHP_EOL; articleXml("ro", $end); echo '</fieldset>' . PHP_EOL;}
if (in_array("ac", $array_uf)) {$end = "no-acre"; echo '<fieldset>' . PHP_EOL . '<legend>Acre</legend>' . PHP_EOL; articleXml("ac", $end); echo '</fieldset>' . PHP_EOL;}

//nordeste
if (in_array("ma", $array_uf)) {$end = "no-maranhao"; echo '<fieldset>' . PHP_EOL . '<legend>Maranhão</legend>' . PHP_EOL; articleXml("ma", $end); echo '</fieldset>' . PHP_EOL;}
if (in_array("pi", $array_uf)) {$end = "no-piaui"; echo '<fieldset>' . PHP_EOL . '<legend>Piauí</legend>' . PHP_EOL; articleXml("pi", $end); echo '</fieldset>' . PHP_EOL;}
if (in_array("ce", $array_uf)) {$end = "no-ceara"; echo '<fieldset>' . PHP_EOL . '<legend>Ceará</legend>' . PHP_EOL; articleXml("ce", $end); echo '</fieldset>' . PHP_EOL;}
if (in_array("rn", $array_uf)) {$end = "no-rio-grande-do-norte"; echo '<fieldset>' . PHP_EOL . '<legend>Rio Grande do Norte</legend>' . PHP_EOL; articleXml("rn", $end); echo '</fieldset>' . PHP_EOL;}
if (in_array("pe", $array_uf)) {$end = "em-pernambuco"; echo '<fieldset>' . PHP_EOL . '<legend>Pernambuco</legend>' . PHP_EOL; articleXml("pe", $end); echo '</fieldset>' . PHP_EOL;}
if (in_array("pb", $array_uf)) {$end = "na-paraiba"; echo '<fieldset>' . PHP_EOL . '<legend>Paraíba</legend>' . PHP_EOL; articleXml("pb", $end); echo '</fieldset>' . PHP_EOL;}
if (in_array("se", $array_uf)) {$end = "em-sergipe"; echo '<fieldset>' . PHP_EOL . '<legend>Sergipe</legend>' . PHP_EOL; articleXml("se", $end); echo '</fieldset>' . PHP_EOL;}
if (in_array("al", $array_uf)) {$end = "em-alagoas"; echo '<fieldset>' . PHP_EOL . '<legend>Alagoas</legend>' . PHP_EOL; articleXml("al", $end); echo '</fieldset>' . PHP_EOL;}
if (in_array("ba", $array_uf)) {$end = "na-bahia"; echo '<fieldset>' . PHP_EOL . '<legend>Bahia</legend>' . PHP_EOL; articleXml("ba", $end); echo '</fieldset>' . PHP_EOL;}


function articleXml ($uf_lower, $end) {
	
	$abertas_xml = simplexml_load_file('xml/abertas.xml');
	
	echo '	<div>
		<b>Instituição</b>
		<span>Vagas</span>
	</div>'. PHP_EOL;
	$i = 0;
	foreach($abertas_xml->$uf_lower as $uf_xml) {
		$name = $abertas_xml->$uf_lower[$i++]['name'];
		$link_img = $name;
		$link_concurso = $name;
		
		$press_link = "'" . $link_img . "'"; // criado apenas para conter aspas simples...
		
		echo '	<ul class="box-concursos">
		<li onclick="document.getElementById(' . $press_link . ').click()">' . $uf_xml->sigla . '</li>
		<li><h2><a id="' . $link_concurso . '" href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-' . $end . '/' . $link_concurso . '">' . $uf_xml->instituicao . '</a><h2></li>
		<li>' . $uf_xml->vagas . '</li>
	</ul>'. PHP_EOL;
	}
}

echo '</article>' . PHP_EOL;

/*
Nota: Distribuição dos links adsense
- $ads_section_topo: Contido em concurso.php (Sera mostrado em todas as paginas relacionadas a concursos);
- $ads_section_rodapé: Contido em uf-abertas.php, geralzona.php e geral-abertas.php;
- $ads_section_flutuante: Contido direto no index.php (Hora flutua sobre o aside-principal e hora...).
*/
echo '<div id="container-ads-section-rodape">
	<!-- script ADSENSE -->
</div>' . PHP_EOL;

/*banner apostila padrão home opção.com
echo '<div id="container-banner">
	<div id="box-banner">
		<a href="https://www.apostilasopcao.com.br" target="_blank" title="Apostilas Concursos Públicos">
			<img src="http://www.siteconcursos.com.br/imagens/apostilas/apostila-petrobras.png" alt="Apostila Opção E" width="180" height="230" />
		</a>
	</div>
</div>' . PHP_EOL;*/

?>
