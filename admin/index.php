<?php
	include "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt" prefix="og: https://ogp.me/ns#">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>Painel do Administrador</title>
		<meta name="viewport" content="width=device-width">
		<meta name="robots" content="noindex, nofollow">
		<link rel="icon" href="" type="image/png" />
		<link rel="stylesheet" type="text/css" href="http://www.siteconcursos.com.br/admin/css/admin.css" media="all" />
		<link rel="stylesheet" type="text/css" href="http://www.siteconcursos.com.br/admin/css/cadastro-abertas.css" media="all" />
		<script type="text/javascript" src="http://www.siteconcursos.com.br/admin/js/admin.js"></script>
	</head>
	<body onload="aUnblock('br', 0)">
		
		<header>
			<div id="admin-box-logo">
				<a href="http://www.siteconcursos.com.br" target="_blank" title="Site Concursos - Página Principal">
					<img src="http://www.siteconcursos.com.br/imagens/logo.png" alt="Logotipo Site Concursos" width="99" height="30" />
				</a>
			</div>
			<menu>
				<li><a href="#">abertos</a></li>
				<li><a href="#">previstos</a></li>
				<li><a href="#">noticias</a></li>
				<li><a href="#">artigos</a></li>
				<li><a style="border-right: none;" href="#">dicas</a></li>
			</menu>
		</header>
		
		<aside id="coluna-esquerda">
		</aside>
		<aside id="coluna-direita">
		</aside>
		
		<main>
			<form id="inscricoes-abertas" name="inscricoes_abertas" action="http://www.siteconcursos.com.br/admin/cadastrando-abertas.php" method="post" enctype="multipart/form-data">
				<div class="container-entradas">
					<table>
						<tr>
							<td colspan="5" id="td-replicar">
								<div>
									<b>Clonar para</b>
								</div>
								<div class="box-checkbox-replicar">
									<label style="font-size: 2em; margin: 6px 1px 0 5px">*</label>
									<input onchange="checkAllUf()" type="checkbox"/>
								</div>
								<div class="box-checkbox-replicar">
									<label>AC</label>
									<input type="checkbox" name="clone[]" value="AC" />
								</div>
								<div class="box-checkbox-replicar">
									<label>AL</label>
									<input type="checkbox" name="clone[]" value="AL" />
								</div>
								<div class="box-checkbox-replicar">
									<label>AM</label>
									<input type="checkbox" name="clone[]" value="AM" />
								</div>
								<div class="box-checkbox-replicar">
									<label>AP</label>
									<input type="checkbox" name="clone[]" value="AP" />
								</div>
								<div class="box-checkbox-replicar">
									<label>BA</label>
									<input type="checkbox" name="clone[]" value="BA" />
								</div>
								<div class="box-checkbox-replicar">
									<label>CE</label>
									<input type="checkbox" name="clone[]" value="CE" />
								</div>
								<div class="box-checkbox-replicar">
									<label>DF</label>
									<input type="checkbox" name="clone[]" value="DF" />
								</div>
								<div class="box-checkbox-replicar">
									<label>ES</label>
									<input type="checkbox" name="clone[]" value="ES" />
								</div>
								<div class="box-checkbox-replicar">
									<label>GO</label>
									<input type="checkbox" name="clone[]" value="GO" />
								</div>
								<div class="box-checkbox-replicar">
									<label>MA</label>
									<input type="checkbox" name="clone[]" value="MA" />
								</div>
								<div class="box-checkbox-replicar">
									<label>MG</label>
									<input type="checkbox" name="clone[]" value="MG" />
								</div>
								<div class="box-checkbox-replicar">
									<label>MS</label>
									<input type="checkbox" name="clone[]" value="MS" />
								</div>
								<div class="box-checkbox-replicar">
									<label>MT</label>
									<input type="checkbox" name="clone[]" value="MT" />
								</div>
								<div class="box-checkbox-replicar">
									<label>PA</label>
									<input type="checkbox" name="clone[]" value="PA" />
								</div>
								<div class="box-checkbox-replicar">
									<label>PB</label>
									<input type="checkbox" name="clone[]" value="PB" />
								</div>
								<div class="box-checkbox-replicar">
									<label>PE</label>
									<input type="checkbox" name="clone[]" value="PE" />
								</div>
								<div class="box-checkbox-replicar">
									<label>PI</label>
									<input type="checkbox" name="clone[]" value="PI" />
								</div>
								<div class="box-checkbox-replicar">
									<label>PR</label>
									<input type="checkbox" name="clone[]" value="PR" />
								</div>
								<div class="box-checkbox-replicar">
									<label>RJ</label>
									<input type="checkbox" name="clone[]" value="RJ" />
								</div>
								<div class="box-checkbox-replicar">
									<label>RN</label>
									<input type="checkbox" name="clone[]" value="RN" />
								</div>
								<div class="box-checkbox-replicar">
									<label>RO</label>
									<input type="checkbox" name="clone[]" value="RO" />
								</div>
								<div class="box-checkbox-replicar">
									<label>RR</label>
									<input type="checkbox" name="clone[]" value="RR" />
								</div>
								<div class="box-checkbox-replicar">
									<label>RS</label>
									<input type="checkbox" name="clone[]" value="RS" />
								</div>
								<div class="box-checkbox-replicar">
									<label>SC</label>
									<input type="checkbox" name="clone[]" value="SC" />
								</div>
								<div class="box-checkbox-replicar">
									<label>SE</label>
									<input type="checkbox" name="clone[]" value="SE" />
								</div>
								<div class="box-checkbox-replicar">
									<label>SP</label>
									<input type="checkbox" name="clone[]" value="SP" />
								</div>
								<div class="box-checkbox-replicar">
									<label>TO</label>
									<input type="checkbox" name="clone[]" value="TO" />
								</div>
							</td>
						</tr>
						<tr>
							<td class="header-entradas">Cidade</td>
							<td class="entradas" colspan="2">
								<input type="text" id="cidade" autocomplete="off" name="cidade" required title="Cidade da Instituição" placeholder="Ex.: Osasco, Uberlandia ou Diversos" value="" onkeyup="carregarXMLDoc(this.value, 'municipio')" />
								<ul id="list-admin-municipio-xml"></ul>
							</td>
							<td class="header-entradas">UF</td>
							<td class="entradas">
								<select id="uf-db" class="select-entradas" name="uf_db" required onchange="acionaReplica(this.value)">
									<option value="" disabled selected>-</option>
									<option value="BR">BR</option>
									<option value="AC">AC</option>
									<option value="AL">AL</option>
									<option value="AM">AM</option>
									<option value="AP">AP</option>
									<option value="BA">BA</option>
									<option value="CE">CE</option>
									<option value="DF">DF</option>
									<option value="ES">ES</option>
									<option value="GO">GO</option>
									<option value="MA">MA</option>
									<option value="MG">MG</option>
									<option value="MS">MS</option>
									<option value="MT">MT</option>
									<option value="PA">PA</option>
									<option value="PB">PB</option>
									<option value="PE">PE</option>
									<option value="PI">PI</option>
									<option value="PR">PR</option>
									<option value="RJ">RJ</option>
									<option value="RN">RN</option>
									<option value="RO">RO</option>
									<option value="RR">RR</option>
									<option value="RS">RS</option>
									<option value="SC">SC</option>
									<option value="SE">SE</option>
									<option value="SP">SP</option>
									<option value="TO">TO</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="header-entradas" style="width: 100px">Sigla Instituição</td>
							<td class="entradas" colspan="2"><input type="text" id="sigla" name="sigla" required title="Sigla da Instituição" placeholder="Ex.: MPU" /></td>
							<td id="manchete-button-link" class="header-entradas" onclick="document.getElementById('container-manchete').style.display = 'block'">Manchete</td>
							<td class="entradas">
								<select id="manchete" class="select-entradas" name="manchete">
									<option value="0" disabled selected>0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class="header-entradas">Instituição</td>
							<td colspan="4" class="entradas"><input type="text" id="instituicao" name="instituicao" required title="Instituição" placeholder="Ex.: Ministério Público da União" onkeyup="copytolink()" /></td>
						</tr>
						<tr>
							<td class="header-entradas">Apresentação</td>
							<td colspan="4" class="entradas">
								<textarea id="apresentacao" name="apresentacao" required title="Apresentação" placeholder="Ex.: Finalmente foi publicado na última Quarta (xx/xx) o edital com diversos cargos e vagas para o Ministério Público da União. Vagas para Analista e Técnico além de cadastro reserva ." ></textarea>
							</td>
						</tr>
						<tr>
							<td class="header-entradas">Cargos</td>
							<td colspan="4" class="entradas">
								<!--onkeyup="carregarXMLDoc(this.value, 'cargo')"-->
								<input type="text" id="cargos" autocomplete="off" name="cargos" required title="Cargos" placeholder="Ex.: Analísta e Técnico" />
								<!--<ul id="list-admin-cargo-xml"></ul>-->
							</td>
						</tr>
						<tr>
							<td class="header-entradas">Vagas</td>
							<td class="entradas"><input type="text" id="vagas" name="vagas" required title="Vagas" placeholder="Ex.: 850 ou Várias"/></td>
							<td class="header-entradas">Salário</td>
							<td class="entradas" colspan="2">
								<div style="font-family: arial; position: absolute; width: 22px; height: 23px; margin: 3px 0 0 6px; color: gray; font-size: 1.2em;">R$</div>
								<input type="number" id="salario" step="0.01" name="salario" title="Salário" maxlength="6">
							</td>
						</tr>
						<tr>
							<td colspan="2" rowspan="7">
								<div id="box-img-preview">
									<canvas id="canvas-preview" width="264" height="220" >
									</canvas>
								</div>
							</td>
							<td class="header-entradas">Banca</td>
							<td class="entradas" colspan="2"><input type="text" id="banca" name="banca" required title="banca" placeholder="Ex.: CESPE"/></td>
						</tr>
						<tr>
							<td class="header-entradas" style="width: 120px">Início Inscrições</td>
							<td class="entradas" colspan="2"><input style="margin-top: 1px" type="date" id="inicio-inscricoes" name="inicio_inscricoes" required title="Início das Inscrições" /></td>
						</tr>
						<tr>
							<td class="header-entradas">Térm. Inscrições</td>
							<td class="entradas" colspan="2"><input style="margin-top: 1px" type="date" id="termino-inscricoes" name="termino_inscricoes" required title="Término das Inscrições" /></td>
						</tr>
						<tr>
							<td colspan="3" class="header-entradas">Escolaridade</td>
						</tr>
						<tr>
							<td colspan="3" class="header-entradas" style="padding: 3px 0;">
								<div class="box-checkbox">
									<label class="nivel" for="fundamental">F</label>
									<input id="fundamental" type="checkbox" name="fundamental" title="Ensino Fundamental" />
								</div>
								<div class="box-checkbox">
									<label class="nivel" for="medio">M</label>
									<input id="medio" type="checkbox" name="medio" title="Ensino Médio" />
								</div>
								<div class="box-checkbox">
									<label class="nivel" for="medio-tecnico" style="margin-left: 3px">M-Tec</label>
									<input id="medio-tecnico" type="checkbox" name="medio_tecnico" title="Ensino Técnico" style="margin-right: 3px" />
								</div>
								<div class="box-checkbox">
									<label class="nivel" for="superior">S</label>
									<input id="superior" type="checkbox" name="superior" title="Superior" />
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="3" class="header-entradas">
							</td>
						</tr>
						<tr>
							<td colspan="3" class="entradas">
								<input id="select-img" style="cursor: pointer" type="file" value="" name="select_img" onclick="this.value = '';" onchange="readycrop(this.id);" />
							</td>
						</tr>
						<tr>
							<td class="header-entradas">Link do Edital</td>
							<td colspan="4" class="entradas">
								<input type="text" id="link-edital" name="link_edital" required title="Link para o Edital" placeholder="Ex.: www.vunesp.com.br/xxx" />
							</td>
						</tr>
						<tr>
							<td class="header-entradas">Link Apostila</td>
							<td colspan="4" class="entradas">
								<input type="text" id="link-apostila" name="link_apostila" value="https://www.apostilasopcao.com.br" title="Link para o Apostil" />
							</td>
						</tr>
						<tr>
							<td colspan="3" class="entradas" id="squisito">
								<input type="text" id="link-concurso" name="link_concurso" title="Link para Imagem e Concurso" required />
							</td>
							<td colspan="2">
								<input id="submit-form" style="cursor: pointer" type="submit" value="CADASTRAR" onclick="return validarForm('abertas')" />
							</td>
						</tr>
					</table>
				</div>
				<div class="container-paragrafos-entradas">
					<div id="container-crop">
						<div id="box-img-clone"><img id="img-clone" src="" /></div>
						<div id="box-canvas"><canvas id="area-canvas" width="0" height="0"></canvas></div>
						<div id="box-crop">
							<div id="area-crop">
								<div
								id="crop"
								onmousedown="document.getElementById('on-off').value = 'on'"
								onmouseup="document.getElementById('on-off').value = 'off'"
								onmouseout="document.getElementById('on-off').value = 'off'"
								onmousemove="movecrop(event)"
								></div>
							</div>
						</div>
						<input
						id="canvas-range"
						type="range"
						title="Largura da Caixa"
						min="0"
						max="0"
						value="0"
						onmousedown="document.getElementById('on-off').value = 'on'"
						onmouseup="document.getElementById('on-off').value = 'off'"
						onmouseout="document.getElementById('on-off').value = 'off'"
						onchange="document.getElementById('on-off').value = 'on';rangecrop(this.value)"
						onmousemove="rangecrop(this.value)"
						/>
						<input id="botao-cortar" type="button" value="CORTAR" onclick="preview()" />
					</div>
					<table id="table-paragrafos">
						<tr>
							<td style="height: 20px;" class="header-entradas">Texto do Concurso</td>
						</tr>
						<tr>
							<td class="entradas" style="height: 452px; margin-top: 7px; padding: 0 5px">
								<textarea id="paragrafos" name="paragrafos" title="Texto do Concurso" placeholder="Parágrafos informativos do Concurso" required ></textarea>
							</td>
						</tr>
					</table>
				</div>
				<input id="id" name="id" type="hidden" value="" /><!-- só recebe valor quando "editar" -->
				<input id="img-instituicao" name="img_instituicao" type="hidden" value="" required />
				<!-- inputs cobaias e coordenadas img -->
				<input id="woriginal" type="hidden" name="woriginal" value="0"/>
				<input id="horiginal" type="hidden" name="horiginal" value="0"/>
				<input id="wclone" type="hidden" name="wclone" value="0"/>
				<input id="hclone" type="hidden" name="hclone" value="0"/>
				<input id="wcrop" type="hidden" name="wcrop" value="0"/>
				<input id="hcrop" type="hidden" name="hcrop" value="0"/>
				<input id="topcrop" type="hidden" name="topcrop" value="0"/>
				<input id="rightcrop" type="hidden" name="rightcrop" value="0"/>
				<input id="bottomcrop" type="hidden" name="bottomcrop" value="0"/>
				<input id="leftcrop" type="hidden" name="leftcrop" value="0"/>
				<input id="cobaia-topcrop" type="hidden" value="0"/>
				<input id="cobaia-rightcrop" type="hidden" value="0"/>
				<input id="cobaia-bottomcrop" type="hidden" value="0"/>
				<input id="cobaia-leftcrop" type="hidden" value="0"/>
				<input id="x-move" type="hidden" value="0"/>
				<input id="y-move" type="hidden" value="0"/>
				<input id="on-off" type="hidden" value="off"/>
				<input id="cobaia-cidade" type="hidden" value="0"/>
			</form>
			<div id="container-manchete">
				<button onclick="document.getElementById('container-manchete').removeAttribute('style')">X</button>
				<?php
					$sql_select = "SELECT * FROM abertas ORDER BY manchete";
					$result = mysqli_query($conn, $sql_select);
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							$bda_id_replica = explode("-", $row["id"]);
							$bda_id = $bda_id_replica[0];
							$bda_manchete = $row["manchete"];
							$bda_sigla = utf8_encode($row["sigla"]);
							$bda_instituicao = utf8_encode($row["instituicao"]);
							$bda_inicio_inscricoes = $row["inicio_inscricoes"];
							$bda_inicio_show = implode(' / ', array_reverse(explode('-', $bda_inicio_inscricoes)));
							$bda_termino_inscricoes = $row["termino_inscricoes"];
							$bda_termino_show = implode(' / ', array_reverse(explode('-', $bda_termino_inscricoes)));
							$bda_link_concurso = utf8_encode($row["link_concurso"]);
							
							$data_atual = date("Y-m-d");
							$expirado = '';
							if ($data_atual >= $row["termino_inscricoes"]) {
								$expirado = ' style="color: red;text-decoration: underline"';
							}
							
							if (($bda_manchete != 0) && (count($bda_id_replica) === 1)){
								echo '
							<div id="box-manchete">
							<img src="http://www.siteconcursos.com.br/imagens/concursos/' . $bda_link_concurso . '-' . $bda_id . '.png" alt="' . $bda_instituicao . '" width="84" height="70" />
							<b>' . $bda_sigla . '</b>
							<p>' . $bda_instituicao . '</p>
							<span' . $expirado . '>Inscrições de &nbsp<strong>' . str_replace('-', ' / ', $bda_inicio_show) . '</strong>&nbsp a &nbsp<strong>' . str_replace('-', ' / ', $bda_termino_show) . '</strong></span>
							<img style="float: left;margin-top: -30px;border: none" src="http://www.siteconcursos.com.br/admin/imagens/icon-manchete-' . $bda_manchete . '.png" alt="" width="40" height="37" />
							</div>' . PHP_EOL;
							}
						}
					}
				?>
			</div>
			<section id="section-abertas">
				<h1>Concursos Abertos Cadastrados:</h1>
				<nav>
					<table id="botoes-nav">
						<tr>
							<td><button onclick="aUnblock('br', 0)" class="a-nav">nacional</button></td>
							<td><button onclick="aUnblock('ac', 1)" class="a-nav">ac</button></td>
							<td><button onclick="aUnblock('al', 2)" class="a-nav">al</button></td>
							<td><button onclick="aUnblock('am', 3)" class="a-nav">am</button></td>
							<td><button onclick="aUnblock('ap', 4)" class="a-nav">ap</button></td>
							<td><button onclick="aUnblock('ba', 5)" class="a-nav">ba</button></td>
							<td><button onclick="aUnblock('ce', 6)" class="a-nav">ce</button></td>
							<td><button onclick="aUnblock('df', 7)" class="a-nav">df</button></td>
							<td><button onclick="aUnblock('es', 8)" class="a-nav">es</button></td>
							<td><button onclick="aUnblock('go', 9)" class="a-nav">go</button></td>
							<td><button onclick="aUnblock('ma', 10)" class="a-nav">ma</button></td>
							<td><button onclick="aUnblock('mg', 11)" class="a-nav">mg</button></td>
							<td><button onclick="aUnblock('ms', 12)" class="a-nav">ms</button></td>
							<td><button onclick="aUnblock('mt', 13)" class="a-nav">mt</button></td>
							<td><button onclick="aUnblock('pa', 14)" class="a-nav">pa</button></td>
							<td><button onclick="aUnblock('pb', 15)" class="a-nav">pb</button></td>
							<td><button onclick="aUnblock('pe', 16)" class="a-nav">pe</button></td>
							<td><button onclick="aUnblock('pi', 17)" class="a-nav">pi</button></td>
							<td><button onclick="aUnblock('pr', 18)" class="a-nav">pr</button></td>
							<td><button onclick="aUnblock('rj', 19)" class="a-nav">rj</button></td>
							<td><button onclick="aUnblock('rn', 20)" class="a-nav">rn</button></td>
							<td><button onclick="aUnblock('ro', 21)" class="a-nav">ro</button></td>
							<td><button onclick="aUnblock('rr', 22)" class="a-nav">rr</button></td>
							<td><button onclick="aUnblock('rs', 23)" class="a-nav">rs</button></td>
							<td><button onclick="aUnblock('sc', 24)" class="a-nav">sc</button></td>
							<td><button onclick="aUnblock('se', 25)" class="a-nav">se</button></td>
							<td><button onclick="aUnblock('sp', 26)" class="a-nav">sp</button></td>
							<td><button onclick="aUnblock('to', 27)" class="a-nav">to</button></td>
						</tr>
					</table>
				</nav>
				<?php
					$sql_select = "SELECT * FROM abertas ORDER BY sigla";
					$result = mysqli_query($conn, $sql_select);
	
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							$bda_id_replica = explode("-", $row["id"]);
							$bda_id = $bda_id_replica[0];
							$bda_uf = $row["uf"];
							
							switch ($bda_uf) {
								case 'BR'; $prepo = 'no'; $uf_url = 'brasil'; $code_uf = 1; break;
								case 'AC'; $prepo = 'no'; $uf_url = 'acre'; $code_uf = 2; break;
								case 'AL'; $prepo = 'em'; $uf_url = 'alagoas'; $code_uf = 3; break;
								case 'AM'; $prepo = 'no'; $uf_url = 'amazonas'; $code_uf = 4; break;
								case 'AP'; $prepo = 'no'; $uf_url = 'amapa'; $code_uf = 5; break;
								case 'BA'; $prepo = 'na'; $uf_url = 'bahia'; $code_uf = 6; break;
								case 'CE'; $prepo = 'no'; $uf_url = 'ceara'; $code_uf = 7; break;
								case 'DF'; $prepo = 'no'; $uf_url = 'distrito-federal'; $code_uf = 8; break;
								case 'ES'; $prepo = 'no'; $uf_url = 'espirito-santo'; $code_uf = 9; break;
								case 'GO'; $prepo = 'em'; $uf_url = 'goias'; $code_uf = 10; break;
								case 'MA'; $prepo = 'no'; $uf_url = 'maranhao'; $code_uf = 11; break;
								case 'MG'; $prepo = 'em'; $uf_url = 'minas-gerais'; $code_uf = 12; break;
								case 'MT'; $prepo = 'no'; $uf_url = 'mato-grosso'; $code_uf = 13; break;
								case 'MS'; $prepo = 'no'; $uf_url = 'mato-grosso-do-sul'; $code_uf = 14; break;
								case 'PA'; $prepo = 'no'; $uf_url = 'para'; $code_uf = 15; break;
								case 'PB'; $prepo = 'na'; $uf_url = 'paraiba'; $code_uf = 16; break;
								case 'PE'; $prepo = 'em'; $uf_url = 'pernambuco'; $code_uf = 17; break;
								case 'PI'; $prepo = 'no'; $uf_url = 'piaui'; $code_uf = 18; break;
								case 'PR'; $prepo = 'no'; $uf_url = 'parana'; $code_uf = 19; break;
								case 'RJ'; $prepo = 'no'; $uf_url = 'rio-de-janeiro'; $code_uf = 20; break;
								case 'RN'; $prepo = 'no'; $uf_url = 'rio-grande-do-norte'; $code_uf = 21; break;
								case 'RO'; $prepo = 'em'; $uf_url = 'rondonia'; $code_uf = 22; break;
								case 'RR'; $prepo = 'em'; $uf_url = 'roraima'; $code_uf = 23; break;
								case 'RS'; $prepo = 'no'; $uf_url = 'rio-grande-do-sul'; $code_uf = 24; break;
								case 'SC'; $prepo = 'em'; $uf_url = 'santa-catarina'; $code_uf = 25; break;
								case 'SE'; $prepo = 'em'; $uf_url = 'sergipe'; $code_uf = 26; break;
								case 'SP'; $prepo = 'em'; $uf_url = 'sao-paulo'; $code_uf = 27; break;
								case 'TO'; $prepo = 'em'; $uf_url = 'tocantins'; $code_uf = 28; break;
								default:
							}
							$bda_cidade = utf8_encode($row["cidade"]);
							$bda_manchete = $row["manchete"];
							$bda_replicado_em = str_replace('"', '|', $row["replicado_em"]);
							$bda_sigla = utf8_encode($row["sigla"]);
							$bda_instituicao = utf8_encode($row["instituicao"]);
							$bda_apresentacao = utf8_encode($row["apresentacao"]);
							$bda_cargos = utf8_encode($row["cargos"]);
							$bda_vagas = utf8_encode($row["vagas"]);
							$bda_salario = $row["salario"];
							$bda_banca = utf8_encode($row["banca"]);
							$bda_link_edital = utf8_encode($row["link_edital"]);
							
							$bda_inicio_inscricoes = $row["inicio_inscricoes"];
							$bda_inicio_show = implode(' / ', array_reverse(explode('-', $bda_inicio_inscricoes)));
							
							$bda_termino_inscricoes = $row["termino_inscricoes"];
							$bda_termino_show = implode(' / ', array_reverse(explode('-', $bda_termino_inscricoes)));
							
							$bda_fundamental = $row["fundamental"];
							$bda_medio = $row["medio"];
							$bda_medio_tecnico = $row["medio_tecnico"];
							$bda_superior = $row["superior"];
							
							$bda_p = utf8_encode($row["paragrafos"]);
							$bda_pa = str_replace('##', '<', $bda_p);
							$bda_paragrafos = str_replace('||', '>', $bda_pa);
							
							$bda_link_concurso = utf8_encode($row["link_concurso"]);
							$bda_link_apostila = utf8_encode($row["link_apostila"]);
							
							$data_atual = date("Y-m-d");
							$expirado = '';
							if ($data_atual >= $row["termino_inscricoes"]) {
								$expirado = ' style="color: red;text-decoration: underline"';
							}
							
							echo '
							<div class="bda-' . strtolower($bda_uf) . '" style="margin-bottom: 50px">
							<img id="bda-img" src="http://www.siteconcursos.com.br/imagens/concursos/' . $bda_link_concurso . '-' . $bda_id . '.png" alt="' . $bda_instituicao . '" width="84" height="70" />
							<h2>' . $bda_sigla . '</h2>
							<p>' . $bda_instituicao . '</p>
							<span' . $expirado . '>Inscrições de &nbsp<strong>' . str_replace('-', ' / ', $bda_inicio_show) . '</strong>&nbsp a &nbsp<strong>' . str_replace('-', ' / ', $bda_termino_show) . '</strong></span>
							<img id="bda-icon" src="http://www.siteconcursos.com.br/admin/imagens/icon-manchete-' . $bda_manchete . '.png" alt="" width="40" height="37" />
							<a href="http://www.siteconcursos.com.br/inscricoes-abertas/concurso-publico-' . $prepo . '-' . $uf_url . '/' . $bda_link_concurso . '-' . $bda_id . '" target="_blank"><button type="button">Visualizar</button></a>
							<button type="button" onclick="editAbertas(' . $bda_id . ', ' . $code_uf . ', ' . $bda_manchete . ')">Editar</button>
							<form id="deletando-abertas" name="deletando_abertas" method="post" action="http://www.siteconcursos.com.br/admin/deletando-abertas.php">
							<input name="link_concurso_deletando" type="hidden" value="' . $bda_link_concurso . '" />
							<input name="id_deletando" type="hidden" value="' . $bda_id . '" />
							<input type="submit" value="Excluir" />
							</form>
							<div id="' . $bda_id .'">
							<input class="bda-id" type="hidden" value="' . $bda_id . '"/>
							<input class="bda-uf" type="hidden" value="' . $bda_uf . '"/>
							<input class="bda-cidade" type="hidden" value="' . $bda_cidade . '"/>
							<input class="bda-manchete" type="hidden" value="' . $bda_manchete . '"/>
							<input class="bda-replicado-em" type="hidden" value="' . $bda_replicado_em . '"/>
							<input class="bda-sigla" type="hidden" value="' . $bda_sigla . '"/>
							<input class="bda-instituicao" type="hidden" value="' . $bda_instituicao . '"/>
							<input class="bda-apresentacao" type="hidden" value="' . $bda_apresentacao . '"/>
							<input class="bda-cargos" type="hidden" value="' . $bda_cargos . '"/>
							<input class="bda-vagas" type="hidden" value="' . $bda_vagas . '"/>
							<input class="bda-salario" type="hidden" value="' . $bda_salario . '"/>
							<input class="bda-banca" type="hidden" value="' . $bda_banca . '"/>
							<input class="bda-link-edital" type="hidden" value="' . $bda_link_edital . '"/>
							<input class="bda-inicio-inscricoes" type="hidden" value="' . $bda_inicio_inscricoes . '"/>
							<input class="bda-termino-inscricoes" type="hidden" value="' . $bda_termino_inscricoes . '"/>
							<input class="bda-fundamental" type="hidden" value="' . $bda_fundamental . '"/>
							<input class="bda-medio" type="hidden" value="' . $bda_medio . '"/>
							<input class="bda-medio-tecnico" type="hidden" value="' . $bda_medio_tecnico . '"/>
							<input class="bda-superior" type="hidden" value="' . $bda_superior . '"/>
							<input class="bda-paragrafos" type="hidden" value="' . $bda_paragrafos . '"/>
							<input class="bda-link-concurso" type="hidden" value="' . $bda_link_concurso . '"/>
							<input class="bda-link-apostila" type="hidden" value="' . $bda_link_apostila . '"/>
							</div>
							</div>' . PHP_EOL;
						}
					}
					$conn->close();
				?>
			</section>
		</main>
		
	</body>
	
	<script type="text/javascript">
		window.addEventListener('resize', function(){readycrop()});
	</script>
</html>