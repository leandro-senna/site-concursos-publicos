<?php
/* Bloqueador Acesso Direto
$arquivo = ['deletando-abertas.php'];
$final_url = $_SERVER['PHP_SELF'];
$final_url = explode('/', $final_url);
$final_url = end($final_url);
if (in_array($final_url, $arquivo)) {header("Location:http://www.siteconcursos.com.br/admin");}
Fim */

include "conexao.php";

$id = $_POST['id_deletando'];
$link_concurso_deletando = utf8_decode($_POST['link_concurso_deletando']);


$deletando = "DELETE FROM abertas WHERE id LIKE '%$id%'";
mysqli_query($conn, $deletando);

$imagem = '../imagens/concursos/' . $link_concurso_deletando . '-' . $id . '.png'; 
unlink($imagem);


$linhas = mysqli_affected_rows($conn);
if ($linhas != 1) {echo "Não foi possível deletar o item do Banco de Dados. Tente novamente. Se o problema persistir, contacte o Administrador do Site.";}


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