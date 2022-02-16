<?php
$title = 'Site Concursos - Notícias de Concursos Públicos no Brasil';
$conteudo = '_concursos/geralzona.php';
$style_conteudo = 'geralzona.css';
$h1 = 'Site Concursos - Notícias de Concursos Públicos no Brasil';

$parte_dois = 'concurso-publico-no-brasil';
$prepo = 'no';
$local = 'brasil';
$uf = ''; $uf_sigla = ''; $id_uf = '';

if ($qtd_partes >= 3) {
	$parte_dois = str_replace('-', ' ', $partes_url[2]);
	$prepo = substr($parte_dois, 17, 2);
	$local = substr($parte_dois, 20, 50);
	switch ($local) {
		case 'brasil': $uf = 'Brasil'; $uf_sigla = 'BR'; $id_uf = 1; break;
		case 'acre': $uf = 'Acre'; $uf_sigla = 'AC'; $id_uf = 2; break;
		case 'alagoas': $uf = 'Alagoas'; $uf_sigla = 'AL'; $id_uf = 3; break;
		case 'amazonas': $uf = 'Amazonas'; $uf_sigla = 'AM'; $id_uf = 4; break;
		case 'amapa': $uf = 'Amapá'; $uf_sigla = 'AP'; $id_uf = 5; break;
		case 'bahia': $uf = 'Bahia'; $uf_sigla = 'BA'; $id_uf = 6; break;
		case 'ceara': $uf = 'Ceará'; $uf_sigla = 'CE'; $id_uf = 7; break;
		case 'distrito federal': $uf = 'Distrito Federal'; $uf_sigla = 'DF'; $id_uf = 8; break;
		case 'espirito santo': $uf = 'Espírito Santo'; $uf_sigla = 'ES'; $id_uf = 9; break;
		case 'goias': $uf = 'Goiás'; $uf_sigla = 'GO'; $id_uf = 10; break;
		case 'maranhao': $uf = 'Maranhão'; $uf_sigla = 'MA'; $id_uf = 11; break;
		case 'minas gerais': $uf = 'Minas Gerais'; $uf_sigla = 'MG'; $id_uf = 12; break;
		case 'mato grosso': $uf = 'Mato Grosso'; $uf_sigla = 'MT'; $id_uf = 13; break;
		case 'mato grosso do sul': $uf = 'Mato Grosso do Sul'; $uf_sigla = 'MS'; $id_uf = 14; break;
		case 'para': $uf = 'Pará'; $uf_sigla = 'PA'; $id_uf = 15; break;
		case 'paraiba': $uf = 'Paraíba'; $uf_sigla = 'PB'; $id_uf = 16; break;
		case 'pernambuco': $uf = 'Pernambuco'; $uf_sigla = 'PE'; $id_uf = 17; break;
		case 'piaui': $uf = 'Piauí'; $uf_sigla = 'PI'; $id_uf = 18; break;
		case 'parana': $uf = 'Paraná'; $uf_sigla = 'PR'; $id_uf = 19; break;
		case 'rio de janeiro': $uf = 'Rio de Janeiro'; $uf_sigla = 'RJ'; $id_uf = 20; break;
		case 'rio grande do norte': $uf = 'Rio Grande do Norte'; $uf_sigla = 'RN'; $id_uf = 21; break;
		case 'rondonia': $uf = 'Rondônia'; $uf_sigla = 'RO'; $id_uf = 22; break;
		case 'roraima': $uf = 'Roraima'; $uf_sigla = 'RR'; $id_uf = 23; break;
		case 'rio grande do sul': $uf = 'Rio Grande do Sul'; $uf_sigla = 'RS'; $id_uf = 24; break;
		case 'santa catarina': $uf = 'Santa Catarina'; $uf_sigla = 'SC'; $id_uf = 25; break;
		case 'sergipe': $uf = 'Sergipe'; $uf_sigla = 'SE'; $id_uf = 26; break;
		case 'sao paulo': $uf = 'São Paulo'; $uf_sigla = 'SP'; $id_uf = 27; break;
		case 'tocantins': $uf = 'Tocantins'; $uf_sigla = 'TO'; $id_uf = 28; break;
		default:
	}
}

$nav_concursos = '<nav>
<table>
  <tr>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-no-brasil" title="Concursos no Brasil">nacional</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-no-acre" title="Concursos no Acre">ac</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-em-alagoas" title="Concursos em Alagoas">al</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-no-amazonas" title="Concursos no Amazonas">am</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-no-amapa" title="Concursos no Amapá">ap</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-na-bahia" title="Concursos na Bahia">ba</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-no-ceara" title="Concursos no Ceará">ce</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-no-distrito-federal" title="Concursos no Distrito Federal">df</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-no-espirito-santo" title="Concursos no Espírito Santo">es</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-em-goias" title="Concursos em Goiás">go</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-no-maranhao" title="Concursos no Maranhão">ma</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-em-minas-gerais" title="Concursos em Minas Gerais">mg</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-no-mato-grosso" title="Concursos Mato Grosso">mt</a></td>
	<td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-no-mato-grosso-do-sul" title="Concursos no Mato Grosso do Sul">ms</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-no-para" title="Concursos no Pará">pa</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-na-paraiba" title="Concursos na Paraíba">pb</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-em-pernambuco" title="Concursos em Pernambuco">pe</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-no-piaui" title="Concursos no Piauí">pi</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-no-parana" title="Concursos no Paraná">pr</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-no-rio-de-janeiro" title="Concursos no Rio de Janeiro">rj</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-no-rio-grande-do-norte" title="Concursos no Rio Grande do Norte">rn</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-em-rondonia" title="Concursos em Rondonia">ro</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-em-roraima" title="Concursos em Roraima">rr</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-no-rio-grande-do-sul" title="Concursos no Rio Grande do Sul">rs</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-em-santa-catarina" title="Concursos em Santa Catarina">sc</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-em-sergipe" title="Concursos em Sergipe">se</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-em-sao-paulo" title="Concursos em São Paulo">sp</a></td>
    <td><a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-em-tocantins" title="Concursos em Tocantins">to</a></td>
  </tr>
</table>
</nav>' . PHP_EOL;

/*
Nota: Distribuição dos links adsense
- $ads_section_topo: Contido em concurso.php (Sera mostrado em todas as paginas relacionadas a concursos);
- $ads_section_rodapé: Contido em uf-abertas.php, geralzona.php e geral-abertas.php;
- $ads_section_flutuante: Contido direto no index.php (Hora flutua sobre o aside-principal e hora...);
- banner-apostilas: Apnas em especificas.php.
*/
$ads_section_topo = '<div id="container-ads-section-topo">
    <div id="box-ads-section-topo">
		<!-- script ADSENSE -->
    </div>
</div>' . PHP_EOL;

if ($qtd_partes >= 3) {
	if ( ($qtd_partes == 3) && ($partes_url[1] == 'inscricoes-abertas') && ((substr($end, 0, 16) != 'concurso-publico') || ($uf_sigla == ''))) {
		header("Location: http://www.siteconcursos.com.br/inscricoes-abertas");
	}
	if ($partes_url[1] == 'inscricoes-abertas') {
		if (substr($end, 0, 16) != 'concurso-publico') {
			/*trecho necessário para deixar title correto: (Maiúsculas e acentos) */
			$abertas_xml = simplexml_load_file('xml/abertas.xml');	
			$uf_sigla_lower = strtolower ($uf_sigla);
			$zero = 0;
			foreach($abertas_xml->$uf_sigla_lower as $uf_xml) {
				$name = $abertas_xml->$uf_sigla_lower[$zero++]['name'];
				
				$link_concurso = explode("-", $name);
				$link_concurso = array_slice($link_concurso, 1);
				$link_concurso = implode("-", $link_concurso);
				if($link_concurso == $end){
					$instituicao = $uf_xml->instituicao;
					$title = 'Concurso Aberto - ' . $instituicao;//aqui!
				}
			}
			/*fim */
			$conteudo = '_concursos/especifica-abertas.php';
			$style_conteudo = 'especifica-abertas.css';
			//$h1 será definido na pagina.
		} else {
			$title = 'Concurso Público ' . $prepo . ' ' . $uf;
			if ($uf == 'Brasil') {$title = "Concursos Públicos Nacionais";}
			$conteudo = '_concursos/uf-abertas.php';
			$style_conteudo = 'uf-abertas.css';
			$h1 = $title;
		}
	} else {
		switch ($partes_url[1]) {
		case 'concursos-previstos':
			$title = 'Concursos Previstos - ' . $parte_final; //$instituicao (pensar)...
			$conteudo = '_concursos/especifica-previstos.php';
			$style_conteudo = 'especifica-previstos.css'; break;
			$h1 = '...'; break;
		case 'noticias-de-concursos':
			$title = 'Noticias - ' . $parte_final;//$instituicao (pensar)...
			$conteudo = '_concursos/especifica-noticias.php';
			$style_conteudo = 'especifica-noticias.css'; break;
			$h1 = '...'; break;
		case 'artigos':
			$title = 'Artigos - ' . $parte_final;//$instituicao ou artigo (pensar)...
			$conteudo = '_concursos/especifica-artigos.php';
			$style_conteudo = 'especifica-artigos.css';
			$h1 = '...'; break;
		default:
			header("Location: http://www.siteconcursos.com.br");
		}
	}
} else {
	switch ($partes_url[1]) {
	case 'inscricoes-abertas':
		$title = 'Concurso Público - Inscrições Abertas';
		$conteudo = '_concursos/geral-abertas.php';
		$style_conteudo = 'geral-abertas.css';
		$h1 = $title; break;
	case 'concursos-previstos':
		$title = 'Concursos Públicos previstos no Brasil';
		$conteudo = '_concursos/geral-previstos.php';
		$style_conteudo = 'geral-previstos.css';
		$h1 = $title; break;
	case 'noticias-de-concursos':
		$title = 'Notícias de Concursos';
		$conteudo = '_concursos/geral-noticias.php';
		$style_conteudo = 'geral-noticias.css';
		$h1 = $title; break;
	case 'artigos':
		$title = 'Concurso Público - Dicas e Artigos';
		$conteudo = '_concursos/geral-artigos.php';
		$style_conteudo = 'geral-artigos.css';
		$h1 = $title; break;
	case 'apostilas':
		$title = 'Concurso Público - Material Preparatório';
		$conteudo = '_concursos/geral-apostilas.php';
		$style_conteudo = 'geral-apostilas.css';
		$h1 = $title; break;
	case '':
		$title = 'Site Concursos - Notícias de Concursos Públicos no Brasil';
		$conteudo = '_concursos/geralzona.php';
		$style_conteudo = 'geralzona.css';
		$h1 = 'Site Concursos - Notícias de Concursos Públicos no Brasil'; break;
	default: header("Location: http://www.siteconcursos.com.br");
	}
}

$style_press_nav_a = '
	main nav table tr td:nth-child(' . $id_uf . ') a {
		background-color: #FFFFFF;
		box-shadow: inset 0 0 1px 1px silver;
		color: #3359cc;
		text-decoration: underline;
		pointer-events: none;
		cursor: default;
	}';
if ($qtd_partes >= 4) {
$style_press_nav_a = '
	main nav table tr td:nth-child(' . $id_uf . ') a {
		pointer-events: initial;
		cursor: pointer;
	}';
}
$style = '<link rel="stylesheet" type="text/css" href="http://www.siteconcursos.com.br/css/corpo-concursos.css" media="all" />' . PHP_EOL
. '	<link rel="stylesheet" type="text/css" href="http://www.siteconcursos.com.br/css/concursos/' . $style_conteudo . '" media="all" />
	<style type="text/css">' . $style_press_nav_a . '
	@-moz-document url-prefix() {main, section, div#container-cidade-cargo ul {scrollbar-width: none}}
	</style>' . PHP_EOL;
$box_rt = '<input type="text" disabled />' . PHP_EOL;
$btn_box_rt = '<button id="btn-box-rt"' . ' onclick="luz(' . "'" . "boxRt" . "'" . ')"></button>' . PHP_EOL;

switch ($uf_sigla) {
	case 'BR': $cid = array("São Paulo - SP", "Curitiba - PR", "Rio de Janeiro - RJ", "Brasília - DF", "Porto Alegre - RS", "Florianópolis - SC", "Belo Horizonte - MG", "Cuiabá - MT", "Fortaleza - CE", "Maceió - AL", "Belém - PA", "Manaus - AM", "Vitória - ES", "Natal - RN", "Goiânia - GO", "Rio Branco - AC", "Macapá - AP", "Salvador - BA", "São Luís - MA", "Campo Grande - MS", "João Pessoa - PB", "Recife - PE", "Teresina - PI", "Porto Velho - RO", "Boa Vista - RR", "Aracaju - SE", "Palmas - TO"); break;
	case 'AC': $cid = array("Rio Branco", "Cruzeiro do Sul", "Sena Madureira", "Tarauacá", "Feijó", "Senador Guiomard", "Brasileia", "Plácido de Castro", "Xapuri", "Marechal Thaumaturgo", "Mâncio Lima", "Rodrigues Alves", "Porto Acre", "Epitaciolândia", "Acrelândia", "Manoel Urbano", "Porto Walter", "Bujari", "Capixaba", "Jordão", "Assis Brasil", "Santa Rosa do Purus"); break;
	case 'AL': $cid = array("Maceió", "Arapiraca", "Rio Largo", "Palmeira dos Índios", "União dos Palmares", "Penedo", "São Miguel dos Campos", "Campo Alegre", "Coruripe", "Delmiro Gouveia", "Marechal Deodoro", "Santana do Ipanema", "Atalaia", "Teotônio Vilela", "Girau do Ponciano", "Pilar", "São Luís do Quitunde", "São Sebastião"); break;//
	case 'AM': $cid = array("Manaus", "Parintins", "Itacoatiara", "Manacapuru", "Tabatinga", "Maués", "Tefé", "Manicoré", "Humaitá", "Iranduba", "Lábrea", "Benjamin Constant", "Borba", "Autazes", "São Paulo de Olivença", "Eirunepé", "Boca do Acre"); break;//
	case 'AP': $cid = array("Macapá", "Santana", "Laranjal do Jari", "Oiapoque", "Mazagão", "Porto Grande", "Tartarugalzinho", "Pedra Branca do Amapari", "Vitória do Jari", "Calçoene", "Amapá", "Ferreira Gomes", "Cutias", "Itaubal", "Serra do Navio", "Pracuuba"); break;
	case 'BA': $cid = array("Salvador", "Feira de Santana", "Vitória da Conquista", "Camaçari", "Juazeiro", "Itabuna", "Lauro de Freitas", "Teixeira de Freitas", "Ilhéus", "Barreiras", "Jequié", "Alagoinhas", "Porto Seguro", "Simões Filho", "Paulo Afonso", "Eunápolis", "Santo Antônio de Jesus"); break;
	case 'CE': $cid = array("Eusébio", "Fortaleza", "Caucaia", "Maranguape", "Aquiraz", "Maracanaú", "Horizonte", "Barbalha", "Sobral", "Cascavel", "Paracuru", "Quixeramobim", "Itapipoca", "Juazeiro do Norte"); break;//
	case 'DF': $cid = array("Brasília", "Ceilândia", "Samambaia", "Taguatinga", "Plano Piloto", "Planaltina", "Águas Claras", "Recanto das Emas", "Guará", "Santa Maria", "Sobradinho II", "São Sebastião", "Vicente Pires", "Itapoã", "Sobradinho", "Brazlândia", "Paranoá", "Riacho Fundo", "Riacho Fundo II"); break;//
	case 'ES': $cid = array("Vitória", "Serra", "Vila Velha", "Cariacica", "Vitória", "Cachoeiro de Itapemirim", "Linhares", "São Mateus", "Guarapari", "Colatina", "Aracruz", "Viana", "Nova Venécia", "Barra de São Francisco", "Santa Maria de Jetibá", "Marataízes", "São Gabriel da Palha", "Castelo", "Itapemirim"); break;//
	case 'GO': $cid = array("Goiânia", "Aparecida de Goiânia", "Anápolis", "Rio Verde", "Águas Lindas de Goiás", "Luziânia", "Valparaíso de Goiás", "Trindade", "Formosa", "Novo Gama", "Senador Canedo", "Catalão", "Itumbiara", "Jataí", "Caldas Novas", "Planaltina", "Santo Antônio do Descoberto"); break;
	case 'MA': $cid = array("São Luís", "Imperatriz	", "São José de Ribamar", "Timon", "Caxias", "Paço do Lumiar", "Codó", "Açailândia", "Bacabal", "Balsas", "Santa Inês", "Barra do Corda", "Pinheiro", "Chapadinha", "Santa Luzia", "Buriticupu", "Grajaú"); break;
	case 'MG': $cid = array("Belo Horizonte", "Uberlândia", "Contagem", "Juiz de Fora", "Betim", "Montes Claros", "Ribeirão das Neves", "Uberaba", "Governador Valadares", "Ipatinga", "Sete Lagoas", "Divinópolis", "Santa Luzia", "Ibirité", "Poços de Caldas", "Patos de Minas", "Pouso Alegre"); break;//
	case 'MS': $cid = array("Campo Grande", "Três Lagoas", "Corumbá", "Ponta Porã", "Sidrolândia", "Naviraí", "Nova Andradina", "Aquidauana", "Maracaju", "Paranaíba", "Amambai", "Rio Brilhante", "Coxim", "Caarapó", "Miranda", "São Gabriel do Oeste", "Jardim", "Aparecida do Taboado"); break;
	case 'MT': $cid = array("Cuiabá", "Rondonópolis", "Sinop", "Tangará da Serra", "Cáceres", "Sorriso", "Lucas do Rio Verde", "Primavera do Leste", "Barra do Garças", "Alta Floresta", "Pontes e Lacerda", "Nova Mutum", "Campo Verde", "Juína", "Colniza", "Guarantã do Norte", "Juara", "Barra do Bugres"); break;//
	case 'PA': $cid = array("Belém", "Ananindeua", "Santarém", "Marabá", "Parauapebas", "Castanhal", "Abaetetuba", "Cametá", "Marituba", "Bragança", "São Félix do Xingu", "Barcarena", "Altamira", "Tucuruí", "Paragominas", "Tailândia", "Breves", "Itaituba"); break;//
	case 'PB': $cid = array("João Pessoa", "Campina Grande", "Santa Rita", "Patos", "Bayeux", "Sousa", "Cabedelo", "Cajazeiras", "Guarabira", "Sapé", "Mamanguape", "Queimadas", "São Bento", "Monteiro", "Esperança", "Pombal", "Catolé do Rocha"); break;
	case 'PE': $cid = array("Recife", "Jaboatão dos Guararapes", "Olinda", "Caruaru", "Petrolina", "Paulista", "Cabo de Santo Agostinho", "Camaragibe", "Garanhuns", "Vitória de Santo Antão", "Igarassu", "São Lourenço da Mata", "Santa Cruz do Capibaribe", "Abreu e Lima", "Ipojuca", "Serra Talhada", "Araripina"); break;
	case 'PI': $cid = array("Teresina", "Parnaíba", "Picos", "Piripiri", "Floriano", "Barras", "Campo Maior", "União", "Altos", "Esperantina", "José de Freitas", "Pedro II", "Oeiras", "São Raimundo Nonato", "Miguel Alves", "Luís Correia", "Piracuruca"); break;
	case 'PR': $cid = array("Curitiba", "Londrina", "Maringá", "Ponta Grossa", "Cascavel", "Foz do Iguaçu", "Guarapuava", "Paranaguá", "Araucária",	"Toledo", "Apucarana", "Campo Largo", "Pinhais", "Arapongas", "Piraquara", "Umuarama"); break;//
	case 'RJ': $cid = array("Rio de Janeiro", "São Gonçalo", "Duque de Caxias", "Nova Iguaçu", "Niterói", "Belford Roxo", "Campos dos Goytacazes", "São João de Meriti", "Petrópolis", "Volta Redonda", "Macaé", "Magé", "Itaboraí", "Cabo Frio", "Angra dos Reis", "Nova Friburgo", "Barra Mansa"); break;//
	case 'RN': $cid = array("Natal", "Mossoró", "Parnamirim", "São Gonçalo do Amarante", "Macaíba", "Ceará-Mirim", "Caicó", "Assu", "Currais Novos", "São José de Mipibu", "Santa Cruz", "Nova Cruz", "Apodi", "João Câmara", "Canguaretama", "Touros", "Macau", "Pau dos Ferros"); break;//
	case 'RO': $cid = array("Porto Velho", "Ji-Paraná", "Ariquemes", "Vilhena", "Cacoal", "Rolim de Moura", "Jaru", "Guajará-Mirim", "Machadinho D'Oeste", "Buritis", "Pimenta Bueno", "Ouro Preto do Oeste", "Espigão D'Oeste", "Nova Mamoré", "Candeias do Jamari", "Cujubim", "São Miguel do Guaporé"); break;
	case 'RR': $cid = array("Boa Vista", "Rorainópolis", "Caracaraí", "Pacaraima", "Cantá", "Mucajaí", "Alto Alegre", "Amajari", "Bonfim", "Iracema", "Normandia", "Uiramutã", "Caroebe", "São João da Baliza", "São Luiz"); break;
	case 'RS': $cid = array("Porto Alegre", "Caxias do Sul", "Canoas", "Pelotas", "Santa Maria", "Novo Hamburgo", "São Leopoldo", "Rio Grande", "Alvorada", "Passo Fundo", "Santa Cruz do Sul", "Santa Cruz do Sul", "Cachoeirinha", "Uruguaiana"); break;//
	case 'SC': $cid = array("Florianópolis", "Balneário Camboriú", "Joaçaba", "Joinville", "São José", "Rio Fortuna", "Blumenau", "Jaraguá do Sul", "Rio do Sul", "São Miguel do Oeste", "Concórdia", "Tubarão", "Itapema", "Itajaí", "Brusque"); break;//
	case 'SE': $cid = array("Aracaju", "Nossa Senhora do Socorro", "Lagarto", "Itabaiana", "São Cristóvão", "Estância", "Tobias Barreto", "Itabaianinha", "Simão Dias", "Nossa Senhora da Glória", "Itaporanga d'Ajuda", "Poço Redondo", "Capela", "Barra dos Coqueiros", "Propriá", "Laranjeiras", "Canindé de São Francisco");break;
	case 'SP': $cid = array("São Paulo", "Guarulhos", "Campinas", "São Bernardo do Campo", "Santo André", "Osasco", "São José dos Campos", "Ribeirão Preto", "Sorocaba", "Santos", "Mauá", "Carapicuíba", "São José do Rio Preto", "Diadema", "Jundiaí"); break;//
	case 'TO': $cid = array("Palmas", "Araguaína", "Gurupi", "Paraíso do Tocantins", "Porto Nacional", "Araguatins", "Colinas do Tocantins", "Guaraí", "Tocantinópolis", "Dianópolis", "Miracema do Tocantins", "Formoso do Araguaia", "Augustinópolis", "Taguatinga", "Pedro Afonso", "Miranorte", "Lagoa da Confusão"); break;
	default: $cid = array("São Paulo - SP", "Curitiba - PR", "Rio de Janeiro - RJ", "Brasília - DF", "Porto Alegre - RS", "Florianópolis - SC", "Belo Horizonte - MG", "Cuiabá - MT", "Fortaleza - CE", "Maceió - AL", "Belém - PA", "Manaus - AM", "Vitória - ES", "Natal - RN", "Goiânia - GO", "Rio Branco - AC", "Macapá - AP", "Salvador - BA", "São Luís - MA", "Campo Grande - MS", "João Pessoa - PB", "Recife - PE", "Teresina - PI", "Porto Velho - RO", "Boa Vista - RR", "Aracaju - SE", "Palmas - TO"); break;
}

?>