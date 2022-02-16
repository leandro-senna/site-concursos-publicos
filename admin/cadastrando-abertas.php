<?php
/* Bloqueador Acesso Direto
$arquivo = ['cadastrando-abertas.php'];
$final_url = $_SERVER['PHP_SELF'];
$final_url = explode('/', $final_url);
$final_url = end($final_url);
if (in_array($final_url, $arquivo)) {header("Location:http://www.siteconcursos.com.br/admin");}
Fim */

include "conexao.php";

$uf_clone = $_POST['clone'];
$uf_clone_implode = implode("-", $uf_clone);

$id = strval(time());
$uf_db = utf8_decode($_POST['uf_db']);
$cidade = utf8_decode($_POST['cidade']);

if (!isset($_POST['manchete'])) {$manchete = 0;}else{$manchete = $_POST['manchete'];}

$sigla = utf8_decode($_POST['sigla']);
$instituicao = utf8_decode($_POST['instituicao']);
$apresentacao = utf8_decode($_POST['apresentacao']);
$cargos = utf8_decode($_POST['cargos']);
$vagas = utf8_decode($_POST['vagas']);
if (!isset($_POST["salario"])) {$salario = 0;}else{$salario = $_POST['salario'];};
$banca = utf8_decode($_POST['banca']);
$link_edital = utf8_decode($_POST['link_edital']);
$inicio_inscricoes = $_POST['inicio_inscricoes'];
$termino_inscricoes = $_POST['termino_inscricoes'];
if(isset($_POST['fundamental'])) {$fundamental = 1;}else{$fundamental = 0;};
if(isset($_POST['medio'])) {$medio = 1;}else{$medio = 0;};
if(isset($_POST['medio_tecnico'])) {$medio_tecnico = 1;}else{$medio_tecnico = 0;};
if(isset($_POST['superior'])) {$superior = 1;}else{$superior = 0;};

$p = utf8_decode($_POST['paragrafos']);
$pa = str_replace('<', '##', $p);
$paragrafos = str_replace('>', '||', $pa);

$link_concurso = utf8_decode($_POST['link_concurso']);
$link_apostila = utf8_decode($_POST['link_apostila']);

$up_manchete = "UPDATE abertas SET manchete = 0 WHERE manchete = '$manchete'";
mysqli_query($conn, $up_manchete);

/*/Teste
$id = "123456";
$uf_db = "AP";
$sigla = "AT";
$instituicao = "ATeste";
$apresentacao = "ATeste.....TesteTeste.....TesteTeste.....Teste";
$cargos = "TesteAnalista";
$vagas = 40;
$salario = 1308;
$banca = "Testebanca";
$link_edital = "www.teste.com.br";
$inicio_inscricoes = "2020-12-01";
$termino_inscricoes = "2019-01-01";
$fundamental = 1;
$medio = 1;;
$medio_tecnico = 0;
$superior = 0;
$paragrafos = "Ateste-teste-teste-teste-teste-teste-teste-teste-teste-teste-teste-teste-teste-teste-teste-teste-teste-teste-teste-";
$link_concurso = "Ateste.test.com";
$img_instituicao = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQgAAADcCAYAAACMLj9yAAAgAElEQVR4XnS9a...";
*/

/*/Testando
echo $id . '<br/>';
echo $uf_db . '<br/>';
echo $sigla . '<br/>';
echo $instituicao . '<br/>';
echo $apresentacao . '<br/>';
echo $cargos . '<br/>';
echo $vagas . '<br/>';
echo $salario . '<br/>';
echo $banca . '<br/>';
echo $link_edital . '<br/>';
echo $inicio_inscricoes . '<br/>';
echo $termino_inscricoes . '<br/>';
echo $fundamental . '<br/>';
echo $medio . '<br/>';
echo $medio_tecnico . '<br/>';
echo $superior . '<br/>';
echo $paragrafos . '<br/>';
echo $link_concurso . '<br/>';
echo $img_instituicao . '<br/>';
*/

$insert_main = "INSERT INTO abertas(
	id,
	uf,
	cidade,
	manchete,
	replicado_em,
	sigla,
	instituicao,
	apresentacao,
	cargos,
	vagas,
	salario,
	banca,
	link_edital,
	inicio_inscricoes,
	termino_inscricoes,
	fundamental,
	medio,
	medio_tecnico,
	superior,
	paragrafos,
	link_concurso,
	link_apostila
)VALUES(
	'$id',
	'$uf_db',
	'$cidade',
	'$manchete',
	'$uf_clone_implode',
	'$sigla',
	'$instituicao',
	'$apresentacao',
	'$cargos',
	'$vagas',
	'$salario',
	'$banca',
	'$link_edital',
	'$inicio_inscricoes',
	'$termino_inscricoes',
	'$fundamental',
	'$medio',
	'$medio_tecnico',
	'$superior',
	'$paragrafos',
	'$link_concurso',
	'$link_apostila'
)";
mysqli_query($conn, $insert_main);


for ($i = 0; $i < count($uf_clone); $i++) {
	$id_clone = $id . "-" . $uf_clone[$i] . "-" .$uf_db;
	
	if ($uf_clone[$i] != $uf_db) {
		$insert_clone = "INSERT INTO abertas(
			id,
			uf,
			cidade,
			manchete,
			replicado_em,
			sigla,
			instituicao,
			apresentacao,
			cargos,
			vagas,
			salario,
			banca,
			link_edital,
			inicio_inscricoes,
			termino_inscricoes,
			fundamental,
			medio,
			medio_tecnico,
			superior,
			paragrafos,
			link_concurso,
			link_apostila
		)VALUES(
			'$id_clone',
			'$uf_clone[$i]',
			'$cidade',
			'$manchete',
			'$uf_clone_implode',
			'$sigla',
			'$instituicao',
			'$apresentacao',
			'$cargos',
			'$vagas',
			'$salario',
			'$banca',
			'$link_edital',
			'$inicio_inscricoes',
			'$termino_inscricoes',
			'$fundamental',
			'$medio',
			'$medio_tecnico',
			'$superior',
			'$paragrafos',
			'$link_concurso',
			'$link_apostila'
		)";
	}
	mysqli_query($conn, $insert_clone);
}




//Criando Imagem Instituição

$pasta_img = "../imagens/concursos/";
$nome_arquivo = $link_concurso . "-" . $id . ".png";

$img_original = $_FILES['select_img']['tmp_name'];
$img_crop = $_POST['img_instituicao'];

$img_woriginal = $_POST['woriginal'];
$img_horiginal = $_POST['horiginal'];
$img_wclone = $_POST['wclone'];
$img_hclone = $_POST['hclone'];
$img_wcrop = $_POST['wcrop'];
$img_hcrop = $_POST['hcrop'];
$img_topcrop = $_POST['topcrop'];
$img_rightcrop = $_POST['rightcrop'];
$img_bottomcrop = $_POST['bottomcrop'];
$img_leftcrop = $_POST['leftcrop'];

//$img_crop = imagecrop($img_instituicao, ['x'=>100, 'y'=>0, 'width'=>264, 'height'=>220]);
//imagejpeg($img_crop, $pasta_img . $link_concurso . "-" . $id . ".jpeg");
//ou
//Função: imagecopyresampled(GdImage $dst_image, GdImage $src_image, int $dst_x, int $dst_y, int $src_x, int $src_y, int $dst_width, int $dst_height, int $src_width, int $src_height)
//imagecopyresampled($img_crop, $img_instituicao, 0, 0, 100, 100, $img_wcrop, $img_hcrop, $img_woriginal, $img_horiginal);

//move_uploaded_file($img_original, $pasta_img . $nome_arquivo);

//imagepng($img_create, $pasta_img . $nome_arquivo);

$data = explode(',', $img_crop);
$content = base64_decode($data[1]);
file_put_contents($pasta_img . $nome_arquivo, $content);



//Retorna msg erro se não cadastrar no banco
$linhas = mysqli_affected_rows($conn);
if ($linhas != 1) {echo "Não foi possível inserir os dados no Banco de Dados. Tente novamente. Se o problema persistir, contacte o Administrador do Site.";}



//Criando XML
$sql_select = "SELECT * FROM abertas ORDER BY sigla";
$result = mysqli_query($conn, $sql_select);

if ($result->num_rows > 0) {

	$data_atual = date("Y-m-d");

	$xml = '<?xml version="1.0" encoding="ISO-8859-1"?>' . PHP_EOL;
	$xml .= '<abertas>' . PHP_EOL;
	while($row = $result->fetch_assoc()) {
		
		$xml_replica = "N";
		if (strpos($row["id"], '-') !== false) {$xml_replica = explode("-", $row["id"])[2];}
		//if (  ($data_atual >= $row["inicio_inscricoes"]) && ($data_atual <= $row["termino_inscricoes"])  ) {
			$xml .= '	<' . strtolower($row["uf"]) . ' name="' . $row["link_concurso"] . '-' . explode("-", $row["id"])[0] .  '">' . PHP_EOL;
			$xml .= '		<id>' . explode("-", $row["id"])[0] . '</id>' . PHP_EOL;
			$xml .= '		<uf>' . $row["uf"] . '</uf>' . PHP_EOL;
			$xml .= '		<cidade>' . $row["cidade"] . '</cidade>' . PHP_EOL;
			$xml .= '		<manchete>' . $row["manchete"] . '</manchete>' . PHP_EOL;
			$xml .= '		<replica>' . $xml_replica . '</replica>' . PHP_EOL;
			$xml .= '		<sigla>' . $row["sigla"] . '</sigla>' . PHP_EOL;
			$xml .= '		<instituicao>' . $row["instituicao"] . '</instituicao>' . PHP_EOL;
			$xml .= '		<apresentacao>' . $row["apresentacao"] . '</apresentacao>' . PHP_EOL;
			$xml .= '		<cargos>' . $row["cargos"] . '</cargos>' . PHP_EOL;
			$xml .= '		<vagas>' . $row["vagas"] . '</vagas>' . PHP_EOL;
			$xml .= '		<salario>' . $row["salario"] . '</salario>' . PHP_EOL;
			$xml .= '		<banca>' . $row["banca"] . '</banca>' . PHP_EOL;
			$xml .= '		<linkedital>' . $row["link_edital"] . '</linkedital>' . PHP_EOL;
			$xml .= '		<inicioinscricoes>' . $row["inicio_inscricoes"] . '</inicioinscricoes>' . PHP_EOL;
			$xml .= '		<terminoinscricoes>' . $row["termino_inscricoes"] . '</terminoinscricoes>' . PHP_EOL;
			$xml .= '		<fundamental>' . $row["fundamental"] . '</fundamental>' . PHP_EOL;
			$xml .= '		<medio>' . $row["medio"] . '</medio>' . PHP_EOL;
			$xml .= '		<mediotecnico>' . $row["medio_tecnico"] . '</mediotecnico>' . PHP_EOL;
			$xml .= '		<superior>' . $row["superior"] . '</superior>' . PHP_EOL;
			$xml .= '		<paragrafos>' . $row["paragrafos"] . '</paragrafos>' . PHP_EOL;
			$xml .= '		<linkconcurso>' . $row["link_concurso"] . '</linkconcurso>' . PHP_EOL;
			$xml .= '		<linkapostila>' . $row["link_apostila"] . '</linkapostila>' . PHP_EOL;
			$xml .= '	</' . strtolower($row["uf"]) . '>' . PHP_EOL;
		//}
	}
	$xml .= '</abertas>' . PHP_EOL;
}
// Escreve o arquivo XML/abertas.xml
$fp = fopen('../xml/abertas.xml', 'w+');
fwrite($fp, $xml);
fclose($fp);

$conn->close();

header('Location: http://www.siteconcursos.com.br/admin/');

?>