<?php
ini_set('default_charset', 'UTF-8');

$espec_dominio = $_SERVER["HTTP_HOST"];
$espec_uri = $_SERVER["REQUEST_URI"];
$espec_url = $espec_dominio . $espec_uri;
$espec_partes_url = explode('/', $espec_url);
$espec_final_url = end($espec_partes_url);
// If para o preview Admin...
if ($espec_partes_url[1] == 'admin'){
	$uf_sigla = $espec_partes_url[3];
	$abertas_xml = simplexml_load_file('../xml/abertas.xml');

}else{
	$abertas_xml = simplexml_load_file('xml/abertas.xml');	
}

$uf_sigla_lower = strtolower ($uf_sigla);
$zero = 0;
foreach($abertas_xml->$uf_sigla_lower as $uf_xml) {
	$name = $abertas_xml->$uf_sigla_lower[$zero++]['name'];
	$link_concurso = $name;
	
	/* Guardar Precaução */
	/*$link_concurso = explode("-", $name);
	$link_concurso = array_slice($link_concurso, 1);
	$link_concurso = implode("-", $link_concurso);*/
	
    if($link_concurso == $espec_final_url) {
        $link_img = $name;
		
		$id = $uf_xml->id;
		$uf = $uf_xml->uf;
		$mult = $uf_xml->mult;
        $sigla = $uf_xml->sigla;
        $instituicao = $uf_xml->instituicao;
        $apresentacao = $uf_xml->apresentacao;
        $cargos = $uf_xml->cargos;
        
		$vagas = $uf_xml->vagas;
		
        $salario = $uf_xml->salario;
        $salario = 'R$ ' . number_format((float)$salario,2,",",".");
		
		$banca = $uf_xml->banca;
        $link_edital = $uf_xml->linkedital;
        
		$ini_insc = $uf_xml->inicioinscricoes;
		$inicio_inscricoes = implode('/', array_reverse(explode('-', $ini_insc)));

        $term_insc = $uf_xml->terminoinscricoes;
		$termino_inscricoes = implode('/', array_reverse(explode('-', $term_insc)));
		
        $fundamental = $uf_xml->fundamental;
		$medio = $uf_xml->medio;
		$medio_tecnico = $uf_xml->mediotecnico;
		$superior = $uf_xml->superior;

		$link_apostila = $uf_xml->linkapostila;
		
        //Convertendo Tags dos textos...
		$paragrafos = $uf_xml->paragrafos;
        $paragrafos = str_replace('##', '<', $paragrafos);
		$paragrafos = str_replace('||', '>', $paragrafos);
		
		//incluindo valor nas variáveis citadas no texarea
		$paragrafos = str_replace('$sigla', $sigla, $paragrafos);
		$paragrafos = str_replace('$vagas', $vagas, $paragrafos);
		$paragrafos = str_replace('$salario', $salario, $paragrafos);
		//Convertendo datas (por extenso)
		/*setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		date_default_timezone_set('America/Sao_Paulo');
		$inicio = utf8_encode(strftime('%d de %B de %Y', intval($inicio_inscricoes)));
		$termino = utf8_encode(strftime('%d de %B de %Y', intval($termino_inscricoes)));*///Refatorar

		$paragrafos = str_replace('$inicio_inscricoes', $inicio_inscricoes, $paragrafos);
		$paragrafos = str_replace('$termino_inscricoes', $termino_inscricoes, $paragrafos);
		
		$press_link = "'" . $link_img . "'"; // criado apenas para conter aspas simples...
        
		$edital = "";
		if ($link_edital != "-") {$edital = '<b>Edital:</b><a " href="' . $link_edital .  '" target="_blank">' . $link_edital . '</a>';}
		
        echo '<h1>' . $instituicao . '</h1>' . PHP_EOL .
		'<p id="sub-h1">' . $apresentacao . '</p>' . PHP_EOL .
        '<article>' . PHP_EOL .
			'	<img src="http://www.siteconcursos.com.br/imagens/concursos/' . $link_img . '.png" alt="' . $instituicao . '" width="360" height="300" />' . PHP_EOL .
			'	' . $paragrafos . PHP_EOL . PHP_EOL .
			'<p id="advert"><strong style="color: red">Atenção:</strong> Todas as informações disponibilizadas em nosso site são coletadas e transcritas dos diversos Canais de Notícias e de trechos de Editais Oficiais. Prezamos pela qualidade e confiabilidade do nosso conteúdo mas advertimos que é imprescindível a leitura dos Editais Oficiais por parte do interessado em participar de qualquer processo seletivo. <i>Não temos nenhum vínculo ou parceria com entidades ou empresas organizadoras dos certames.</i></p>' . PHP_EOL . PHP_EOL .
			'<div id="espec-link-edital">' . $edital . '</div>' . PHP_EOL . PHP_EOL .
		'</article>' . PHP_EOL . PHP_EOL;
    }
}






/*
Nota: Distribuição dos links adsense
- $ads_section_topo: Contido em concurso.php (Sera mostrado em todas as paginas relacionadas a concursos);
- $ads_section_rodapé: Contido em uf-abertas.php, geralzona.php e geral-abertas.php;
- $ads_section_flutuante: Contido direto no index.php (Hora flutua sobre o aside-principal e hora...).
*/

//inserido para teste 06-01-22
echo '<div id="container-ads-section-rodape">
	<!-- script ADSENSE -->
</div>' . PHP_EOL . PHP_EOL;


/*banner apostila específica
echo '<div id="container-banner">
	<div id="box-banner">
		<a href="' . $link_apostila .'" target="_blank" title="Apostila ' . $instituicao . '">
			<img src="http://www.siteconcursos.com.br/imagens/apostilas/apostila-petrobras.png" alt="Apostila Opção E" width="180" height="230" />
		</a>
	</div>
</div>' . PHP_EOL . PHP_EOL;
*/




?>