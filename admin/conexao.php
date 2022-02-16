<?php
/* Bloqueador Acesso Direto */
$arquivo = ['conexao.php'];
$final_url = $_SERVER['PHP_SELF'];
$final_url = explode('/', $final_url);
$final_url = end($final_url);
if (in_array($final_url, $arquivo)) {header("Location:http://www.siteconcursos.com.br/admin");}
/* Fim */


$host = "127.0.0.1";
$user = "root";
$pass = "";
$banco = "v8concursos";

//$host = "localhost";
//$user = "kjcugqam_v8concursos";
//$pass = "Lavi2152";
//$banco = "kjcugqam_v8concursos";

$conn = new mysqli($host, $user, $pass, $banco);

if ($conn -> connect_errno) {
  echo "Não foi possível estabelecer conexão com o Banco de Dados. Tente novamente. Se o problema persistir, reporte esta mensagem ao Administrador do Site.";
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}
?>