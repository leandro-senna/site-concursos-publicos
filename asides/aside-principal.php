	<div id="container-cidade-cargo">
		<div id="box-lcz-cidade">
			<label for="lcz-cidade">Concursos na sua Cidade</label>
			<input id="lcz-cidade" type="text" placeholder="Ex.: Osasco, Uberlândia..." onkeyup="carregarXMLDoc(this.value, 'municipio')"/>
			<ul id="list-municipio-xml"></ul>
			<ul id="list-municipio">
			<?php
			function retiraAcentos($string){
			   $acentos  =  'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
			   $sem_acentos  =  'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
			   $string = strtr($string, utf8_decode($acentos), $sem_acentos);
			   return utf8_decode($string);
			}
			$uf_cid = "";
			if ($id_uf >= 2) {$uf_cid = "-" . strtolower($uf_sigla);}

			foreach($cid as $v_cid) {
			$v_cid_link = strtolower(str_replace(' ', '-', str_replace(' - ', '-', $v_cid)));
			$v_cid_link_s_acento = retiraAcentos(utf8_decode($v_cid_link));
			echo '				<li><a href="http://www.siteconcursos.com.br/concurso-publico-por-municipio/' . $v_cid_link_s_acento . $uf_cid . '" title="Concursos em ' . str_replace(' - ', '-', $v_cid) .'">' . $v_cid . '</a></li>' . PHP_EOL;
			}
			?>
			</ul>
		</div>
	</div>
