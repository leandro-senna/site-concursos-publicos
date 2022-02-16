<?php
ini_set('default_charset', 'UTF-8');
$uf_lower = strtolower ($uf_sigla);
$abertas_xml = simplexml_load_file('xml/abertas.xml');

$qtd = count($abertas_xml->$uf_lower);

$stl_ctn = '';
if (!$qtd) {$stl_ctn = ' style="width: 100%; border: solid 1px gainsboro; margin-bottom: 10px"';}

echo'<h1>' . $h1 . '</h1>' . PHP_EOL .
'<article id="container-concursos"' . $stl_ctn . '>' . PHP_EOL .
'<span id="b-green">Inscrições Abertas</span>' . PHP_EOL;

//Subsitituir #localizar por Mecanismo de Pesquisa Google Adsense
if ($qtd >= 2) {
	//echo '<input id="localizar" type="text" placeholder="Localizar" style="margin: -36px -270px" />';
}else if (!$qtd) {
	//echo '<input id="localizar" type="text" placeholder="Localizar" style="margin: -36px 170px" />';
	echo '<p class="alerta">Não existem concursos para este Estado no momento</p>';
}else{
	//echo '<input id="localizar" type="text" placeholder="Localizar" style="margin: -36px -270px" />';
}

function articleXml ($valor, $uf_lower, $end) {
	
	$abertas_xml = simplexml_load_file('xml/abertas.xml');

	$i = 0;
	foreach($abertas_xml->$uf_lower as $uf_xml) {
		$name = $abertas_xml->$uf_lower[$i++]['name'];
		$link_img = $name;
		$link_concurso = $name;

		$salario = $uf_xml->salario;
		if ($uf_xml->salario != 0) {$salario = 'R$ ' . number_format((float)$salario,2,",",".");}else{$salario = '-';}
		
		$inicio_inscricoes = implode('/', array_reverse(explode('-', $uf_xml->inicioinscricoes)));
		
		$termino_inscricoes = implode('/', array_reverse(explode('-', $uf_xml->terminoinscricoes)));
		
		$fundamental = ""; if ($uf_xml->fundamental != 0){$fundamental = "Fundamental • ";}
		$medio = ""; if ($uf_xml->medio != 0){$medio = "Medio ";}
		$medio_tecnico = ""; if ($uf_xml->mediotecnico != 0){$medio_tecnico = "• Medio Técnico ";}
		$superior = ""; if ($uf_xml->superior != 0){$superior = "• Supeior";}
		
		$escolaridade = $fundamental . $medio . $medio_tecnico . $superior;
		
		$press_link = "'" . $link_img . "'"; // criado apenas para conter aspas simples...
		
		if ($uf_xml->replica == $valor) {
			echo '<div class="box-concursos" onclick="document.getElementById(' . $press_link . ').click()">' . PHP_EOL .
			'	<img src="http://www.siteconcursos.com.br/imagens/concursos/' . $link_img . '.png" alt="' . $uf_xml->instituicao . '" width="120" height="100" loading="lazy" />' . PHP_EOL .
			'	<div>' . PHP_EOL .
				'		<strong>' . $uf_xml->sigla . '</strong>' . PHP_EOL .
				'		<h2><a id="' . $link_concurso . '" href="http://www.siteconcursos.com.br/inscricoes-abertas/' . $end . '/' . $link_concurso . '">' . $uf_xml->instituicao . '</a></h2>' . PHP_EOL .
				'		<span><b>Cargos: </b>' . $uf_xml->cargos . '</span>' . PHP_EOL .
				'		<span><b>Escolaridade: </b>' . $escolaridade . '</span>' . PHP_EOL .
			'	</div>' . PHP_EOL .
			'	<span class="insc-abertas">Inscrições de ' . '<b>' . $inicio_inscricoes . '</b>' . ' a ' . '<b>' . $termino_inscricoes . '</b>' . '</span>' . PHP_EOL .
			'	<ul>' . PHP_EOL .
				'		<li>Salário</li>' . PHP_EOL .
				'		<li>' . $salario . '</li>' . PHP_EOL .
				'		<li>Vagas</li>' . PHP_EOL .
				'		<li>' . $uf_xml->vagas . '</li>' . PHP_EOL .
			'	</ul>' . PHP_EOL .
			'</div>' . PHP_EOL;
		}
	}
}

articleXml("N", $uf_lower, $end);

$array_replica = array();
foreach ($abertas_xml->$uf_lower as $uf_xml) {
	array_push($array_replica, $uf_xml->replica);
}
//refatorar com calma esse aberração de ifs!!
$ini_header = '<span class="header-replica">Concurso ';
if (in_array("BR", $array_replica)) {echo $ini_header . 'Nacional com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("BR", $uf_lower, $end);};
if (in_array("AC", $array_replica)) {echo $ini_header . 'no Acre com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("AC", $uf_lower, $end);};
if (in_array("AL", $array_replica)) {echo $ini_header . 'em Alagoas com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("AL", $uf_lower, $end);};
if (in_array("AP", $array_replica)) {echo $ini_header . 'no Amapá com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("AP", $uf_lower, $end);};
if (in_array("BA", $array_replica)) {echo $ini_header . 'na Bahia com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("BA", $uf_lower, $end);};
if (in_array("CE", $array_replica)) {echo $ini_header . 'no Ceará com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("CE", $uf_lower, $end);};
if (in_array("DF", $array_replica)) {echo $ini_header . 'no Distrito Federal com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("DF", $uf_lower, $end);};
if (in_array("ES", $array_replica)) {echo $ini_header . 'no Espírito Santo com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("ES", $uf_lower, $end);};
if (in_array("GO", $array_replica)) {echo $ini_header . 'em Goiás com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("GO", $uf_lower, $end);};
if (in_array("MA", $array_replica)) {echo $ini_header . 'no Maranhão com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("MA", $uf_lower, $end);};
if (in_array("MG", $array_replica)) {echo $ini_header . 'em Minas Gerais com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("MG", $uf_lower, $end);};
if (in_array("MT", $array_replica)) {echo $ini_header . 'no Mata Grosso com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("MT", $uf_lower, $end);};
if (in_array("MS", $array_replica)) {echo $ini_header . 'no Mato Grosso do Sul com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("MT", $uf_lower, $end);};
if (in_array("PA", $array_replica)) {echo $ini_header . 'no Pará com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("PA", $uf_lower, $end);};
if (in_array("PB", $array_replica)) {echo $ini_header . 'na Paraíba com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("PB", $uf_lower, $end);};
if (in_array("PE", $array_replica)) {echo $ini_header . 'em Pernambuco com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("PE", $uf_lower, $end);};
if (in_array("PI", $array_replica)) {echo $ini_header . 'no Piauí com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("PI", $uf_lower, $end);};
if (in_array("PR", $array_replica)) {echo $ini_header . 'no Paraná com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("PR", $uf_lower, $end);};
if (in_array("RJ", $array_replica)) {echo $ini_header . 'no Rio de Janeiro com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("RJ", $uf_lower, $end);};
if (in_array("RN", $array_replica)) {echo $ini_header . 'no Rio Grande do Norte com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("RN", $uf_lower, $end);};
if (in_array("RO", $array_replica)) {echo $ini_header . 'em Rondônia com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("RO", $uf_lower, $end);};
if (in_array("RR", $array_replica)) {echo $ini_header . 'em Roraima com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("RR", $uf_lower, $end);};
if (in_array("RS", $array_replica)) {echo $ini_header . 'no Rio Grande do Sul com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("RS", $uf_lower, $end);};
if (in_array("SC", $array_replica)) {echo $ini_header . 'em Santa Catarina com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("SC", $uf_lower, $end);};
if (in_array("SE", $array_replica)) {echo $ini_header . 'em Sergipe com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("SE", $uf_lower, $end);};
if (in_array("SP", $array_replica)) {echo $ini_header . 'em São Paulo com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("SP", $uf_lower, $end);};
if (in_array("TO", $array_replica)) {echo $ini_header . 'no Tocantins com vagas ' . $prepo . ' ' . $uf . '</span>' . PHP_EOL; articleXml("TO", $uf_lower, $end);};

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
</div>' . PHP_EOL;
*/
?>