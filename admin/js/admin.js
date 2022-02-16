function retira_acentos(str) {

const com_acento = "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝŔÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿŕ",
	  sem_acento = "AAAAAAACEEEEIIIIDNOOOOOOUUUUYRsBaaaaaaaceeeeiiiionoooooouuuuybyr";
    let novastr = "";
    for(i=0; i<str.length; i++) {
        troca=false;
        for (a=0; a<com_acento.length; a++) {
            if (str.substr(i,1)==com_acento.substr(a,1)) {
                novastr+=sem_acento.substr(a,1);
                troca=true;
                break;
            }
        }
        if (troca==false) {
            novastr+=str.substr(i,1);
        }
    }
    return novastr;
}
function validarForm (valor) {
	const imgI = document.getElementById("img-instituicao"),
		  cobaiaCidade = document.getElementById("cobaia-cidade"),
		  cidade = document.getElementById("cidade");
	if (imgI.value == "") {
		alert("Selecione e recorte uma imagem");
		return false;
	}
	if (cobaiaCidade.value != cidade.value) {
		alert("Municipio inválido!");
		return false;
	}
	return true;
}
function copytolink() {
let instituicao = document.getElementById("instituicao"),
	c = instituicao.value.replace(/ /g, "-");
	campo = c.toLowerCase();
	
document.getElementById("link-concurso").value = retira_acentos(campo);
}
function readycrop (valor) {
	//reset inputs e containers
	document.getElementById("area-canvas").removeAttribute("width");
	document.getElementById("area-canvas").removeAttribute("height");
	document.getElementById("woriginal").value = "0";
	document.getElementById("horiginal").value = "0";
	document.getElementById("wclone").value = "0";
	document.getElementById("hclone").value = "0";
	document.getElementById("wcrop").value = "0";
	document.getElementById("hcrop").value = "0";
	document.getElementById("topcrop").value = "0";
	document.getElementById("rightcrop").value = "0";
	document.getElementById("bottomcrop").value = "0";
	document.getElementById("leftcrop").value = "0";
	if (valor == "select-img") {
		document.getElementById("area-canvas").style.opacity = "0";
		document.getElementById("area-crop").style.opacity = "0";
		document.getElementById("canvas-range").style.opacity = "0";
		document.getElementById("botao-cortar").style.opacity = "0";
		document.getElementById("table-paragrafos").style.display = "none";
		document.getElementById("container-crop").style.display = "flex";
		openboxcrop(valor);
	}else{
		document.getElementById("select-img").value = "";
		document.getElementById("table-paragrafos").removeAttribute("style");
		document.getElementById("container-crop").removeAttribute("style");
	}
}
function openboxcrop (valor) {
	
	var FReader = new FileReader();
	
	FReader.readAsDataURL(document.getElementById(valor).files[0]);
	FReader.onloadend = function (oFREvent) {
		
		let clone = document.getElementById("img-clone"),
			canvas = document.getElementById("area-canvas"),
			areacrop = document.getElementById("area-crop");
		
		var original = document.createElement("img");
		original.setAttribute("style", "position: absolute; margin-top: -5000px");
		original.setAttribute("src", oFREvent.target.result);
		document.body.appendChild(original);

		clone.src = oFREvent.target.result;
		
		setTimeout(function () {
			canvas.setAttribute('width', clone.width);
			canvas.setAttribute('height', clone.height);
			areacrop.setAttribute('style', ('width:' + clone.width + 'px' + '; height:' + clone.height + 'px'));
			document.getElementById("woriginal").value = original.width;
			document.getElementById("horiginal").value = original.height;
			document.getElementById("wclone").value = clone.width;
			document.getElementById("hclone").value = clone.height;
			document.body.removeChild(original);
		}, 30);
		setTimeout(function () {
			let wclone = parseInt(document.getElementById("wclone").value),
				hclone = parseInt(document.getElementById("hclone").value),
				ctx = canvas.getContext("2d");
		
			ctx.drawImage(clone, 0, 0, wclone, hclone);
		
			if ((hclone / wclone) < 1) {
				let bordertop = 0,
					borderright = Math.round((wclone - (hclone * 1.2)) / 2),
					borderbottom = 0,
					borderleft = borderright;
				document.getElementById("wcrop").value = wclone - (borderright * 2);
				document.getElementById("hcrop").value = hclone - (bordertop * 2);
				document.getElementById("topcrop").value = bordertop;
				document.getElementById("rightcrop").value = borderright;
				document.getElementById("bottomcrop").value = borderbottom;
				document.getElementById("leftcrop").value = borderleft;
				document.getElementById("cobaia-topcrop").value = bordertop;
				document.getElementById("cobaia-rightcrop").value = borderright;
				document.getElementById("cobaia-bottomcrop").value = borderbottom;
				document.getElementById("cobaia-leftcrop").value = borderleft;
				setborder(valor);
			}else{
				let bordertop = Math.round((hclone - (wclone * 0.83333333333)) / 2),
					borderright = 0,
					borderbottom = bordertop,
					borderleft = 0;
				document.getElementById("wcrop").value = wclone - (borderright * 2);
				document.getElementById("hcrop").value = hclone - (bordertop * 2);
				document.getElementById("topcrop").value = bordertop;
				document.getElementById("rightcrop").value = borderright;
				document.getElementById("bottomcrop").value = borderbottom;
				document.getElementById("leftcrop").value = borderleft;
				document.getElementById("cobaia-topcrop").value = bordertop;
				document.getElementById("cobaia-rightcrop").value = borderright;
				document.getElementById("cobaia-bottomcrop").value = borderbottom;
				document.getElementById("cobaia-leftcrop").value = borderleft;
				setborder(valor);
			}
		},80);
	}
}
function rangecrop(valor) {
	let onoff = document.getElementById('on-off'),
		wclone = parseInt(document.getElementById("wclone").value),
		hclone = parseInt(document.getElementById("hclone").value),
		wcrop = parseInt(document.getElementById("wcrop").value),
		hcrop = parseInt(document.getElementById("hcrop").value),
		cobaiatop = parseInt(document.getElementById("cobaia-topcrop").value),
		cobaiaright = parseInt(document.getElementById("cobaia-rightcrop").value),
		cobaiabottom = parseInt(document.getElementById("cobaia-bottomcrop").value),
		cobaialeft = parseInt(document.getElementById("cobaia-leftcrop").value),
		max = document.getElementById("canvas-range").max;
		range = max - valor; //inverte range
	if (onoff.value == 'on') {
		if ((hclone / wclone) < 1) {
			let bordertop = Math.round((range + cobaiatop) * 0.83333333333),
				borderright = range + cobaiaright,
				borderbottom = Math.round((range + cobaiabottom) * 0.83333333333),
				borderleft = range + cobaialeft;

			document.getElementById("wcrop").value = wclone - (borderright + borderleft);
			document.getElementById("hcrop").value = hclone - (bordertop + borderbottom);
			document.getElementById("topcrop").value = bordertop;
			document.getElementById("rightcrop").value = borderright;
			document.getElementById("bottomcrop").value = borderbottom;
			document.getElementById("leftcrop").value = borderleft;
			setborder();
		}else{
			let bordertop = range + cobaiatop,
				borderright = Math.round((range + cobaiaright) * 1.2),
				borderbottom = range + cobaiabottom,
				borderleft = Math.round((range + cobaialeft) * 1.2);

			document.getElementById("wcrop").value = wclone - (borderright + borderleft);
			document.getElementById("hcrop").value = hclone - (bordertop + borderbottom);
			document.getElementById("topcrop").value = bordertop;
			document.getElementById("rightcrop").value = borderright;
			document.getElementById("bottomcrop").value = borderbottom;
			document.getElementById("leftcrop").value = borderleft;
			setborder();
		}
	}
}
function movecrop(event) {	
	let onoff = document.getElementById('on-off'),
		topcrop = parseInt(document.getElementById("topcrop").value),
		rightcrop = parseInt(document.getElementById("rightcrop").value),
		bottomcrop = parseInt(document.getElementById("bottomcrop").value),
		leftcrop = parseInt(document.getElementById("leftcrop").value),
		xmove = Math.round(document.getElementById('x-move').value),
		ymove = Math.round(document.getElementById('y-move').value);
	
	let rect = document.getElementById('area-crop').getBoundingClientRect(),
		x = Math.round(event.clientX - rect.left),
		y = Math.round(event.clientY - rect.top);
	if (onoff.value == 'on') {
		if ((x != xmove) || (y != ymove)) {
			if (x < xmove){
				if (leftcrop > 0) {
					document.getElementById("leftcrop").value = leftcrop - 1;
					document.getElementById("rightcrop").value = rightcrop + 1;
					setborder();
				}
			}else{
				if (rightcrop > 0) {
					document.getElementById("leftcrop").value = leftcrop + 1;
					document.getElementById("rightcrop").value = rightcrop - 1;
					setborder();
				}
			}
			if (y < ymove){
				if (topcrop > 0) {
					document.getElementById("topcrop").value = topcrop - 1;
					document.getElementById("bottomcrop").value = bottomcrop + 1;
					setborder();
				}
			}else{
				if (bottomcrop > 0) {
					document.getElementById("topcrop").value = topcrop + 1;
					document.getElementById("bottomcrop").value = bottomcrop - 1;
					setborder();
				}
			}
		}
	}
	document.getElementById('x-move').value = x;
	document.getElementById('y-move').value = y;
}
function setborder(valor) {
	let areacrop = document.getElementById("area-crop"),
		canvas = document.getElementById("area-canvas"),
		range = document.getElementById("canvas-range"),
		wclone = parseInt(document.getElementById("wclone").value),
		hclone = parseInt(document.getElementById("hclone").value),
		wcrop = parseInt(document.getElementById("wcrop").value),
		hcrop = parseInt(document.getElementById("hcrop").value),
		bordertop = parseInt(document.getElementById("topcrop").value),
		borderright = parseInt(document.getElementById("rightcrop").value),
		borderbottom = parseInt(document.getElementById("bottomcrop").value),
		borderleft = parseInt(document.getElementById("leftcrop").value);

	areacrop.style.borderTop = 'solid ' + bordertop + 'px ' + 'rgba(0,0,0,.5)';
	areacrop.style.borderRight = 'solid ' + borderright + 'px ' + 'rgba(0,0,0,.5)';
	areacrop.style.borderBottom = 'solid ' + borderbottom + 'px ' + 'rgba(0,0,0,.5)';
	areacrop.style.borderLeft = 'solid ' + borderleft + 'px ' + 'rgba(0,0,0,.5)';
	
	if (valor == "select-img") {
		var max = Math.round((wcrop / 2) - 2);
		range.style.width = wcrop + 'px';
		range.setAttribute('max', max);
		range.setAttribute('value', max);
		range.value = max;
		setTimeout(function () {
			canvas.style.opacity = "1"
			areacrop.style.opacity = "1"
			range.style.opacity = "1"
			document.getElementById("botao-cortar").style.opacity = "1";
		},1000);
	}
}
function preview () {
	let clone = document.getElementById("img-clone"),
		canvaspreview = document.getElementById("canvas-preview"),
		ctxpreview = canvaspreview.getContext("2d"),
		canvas = document.getElementById("area-canvas");
	
	let wcrop = parseInt(document.getElementById("wcrop").value),
		hcrop = parseInt(document.getElementById("hcrop").value),
		topcrop = parseInt(document.getElementById("topcrop").value),
		leftcrop = parseInt(document.getElementById("leftcrop").value);
	
	ctxpreview.clearRect(0, 0, 264, 220);
	canvaspreview.style.background = "url('../imagens/loading.gif') center white no-repeat";
	
	setTimeout(function () {
		ctxpreview.drawImage(canvas, leftcrop, topcrop, wcrop, hcrop, 0, 0, 264, 220);
		var image = new Image();
		var canvaspreview = document.getElementById("canvas-preview");
		
		image.src = canvaspreview.toDataURL("image/png");
		document.getElementById('img-instituicao').value = image.src;
		document.getElementById("table-paragrafos").removeAttribute("style");
		document.getElementById("container-crop").removeAttribute("style");
	},1000);
}
function aUnblock (uf, cod) {
	let aNav = document.querySelectorAll(".a-nav"),
		aButton = document.querySelectorAll("#section-abertas > div"),
		aUF = document.getElementsByClassName("bda-" + uf), x, y, z;
		
	for (x = 0; x < aNav.length; x++) {
		aNav[x].removeAttribute("style");
	}
	for (y = 0; y < aButton.length; y++) {
		aButton[y].removeAttribute("style");
	}
	for (z = 0; z < aUF.length; z++) {
		aUF[z].style.display = "grid";
	}
	aNav[cod].setAttribute("style", "background:#f3f1d9;background:linear-gradient(#c7bb9e,#f3f1d9);color:red;text-decoration:underline;pointer-events:none;");
	
	
	window.scrollTo(0, 1000);
	
	paragPadrao();
}
function paragPadrao () {
	document.getElementById("paragrafos").value = 
"<p>Publicado Edital com $vagas vagas divididas entre diversos cargos e escolaridade com ganhos de até $salario.</p>\n\n" +
"<p></p>\n" +
"<p></p>\n" +
"<p></p>\n\n" +
"<h2>Concurso $sigla - Inscrições:</h2>\n\n" +
"<p>A inscrição poderá ser realizada no site da organizadora do concurso (link ao final texto) no período de <strong>$inicio_inscricoes</strong> a <strong>$termino_inscricoes</strong>. A taxa de inscrição será de R$ ...</p>\n" +
"<p>A data de aplicação da prova objetiva está definida como prevista para o dia ...</p>\n\n" +
"<h2>Concurso $sigla - Cargos:</h2>\n" +
"<ul>\n" +
"<li></li>\n" +
"<li></li>\n" +
"<li></li>\n" +
"<li></li>\n" +
"<li></li>\n" +
"<li></li>\n" +
"<li></li>\n" +
"<li></li>\n" +
"</ul>\n\n" +
"<h2>Concurso $sigla - Provas:</h2>\n\n" +
"<p>A prova será composta por disciplinas de conhecimentos básicos (para todos os cargos) e específicos de acordo com as diversas especialidades. Segue a composição definida no edital:</p>\n\n" +
"<b>Conhecimentos Básicos:</b>\n" +
"<ul>\n" +
"<li></li>\n" +
"<li></li>\n" +
"<li></li>\n" +
"<li></li>\n" +
"<li></li>\n" +
"<li></li>\n" +
"<li></li>\n" +
"<li></li>\n" +
"<li></li>\n" +
"</ul>\n\n" +
"<b>Conhecimentos Específicos:</b>\n" +
"<ul>\n" +
"<li></li>\n" +
"<li></li>\n" +
"<li></li>\n" +
"<li></li>\n" +
"<li></li>\n" +
"<li></li>\n" +
"<li></li>\n" +
"<li></li>\n" +
"<li></li>\n" +
"</ul>";
}
function checkAllUf () {
	let box = document.querySelectorAll(".box-checkbox-replicar > input"),
		ufSelected = document.getElementById("uf-db").value;
	if (box[0].checked == true) {
		for (i = 0; i < 28; i++) {
			box[i].checked = true;
			if (ufSelected == box[i].value) {
				box[i].setAttribute("style", "opacity: 0.3;pointer-events: none");
			}
		}
	}else{
		for (i = 0; i < 28; i++) {
			box[i].checked = false;
			if (ufSelected == box[i].value) {
				box[i].checked = true;
				box[i].setAttribute("style", "opacity: 0.3;pointer-events: none");
			}
		}	
	}
}
function editAbertas (id, code, mancheteCode) {
	let item = document.getElementById(id).children,
		itemUf = document.getElementById("uf-db").children,
		itemManchete = document.getElementById("manchete").children,
		itemReplica = document.querySelectorAll(".box-checkbox-replicar > input"),
		checkF = document.getElementById("fundamental"),
		checkM = document.getElementById("medio"),
		checkMt = document.getElementById("medio-tecnico"),
		checkS = document.getElementById("superior");
	
	document.getElementsByClassName("container-entradas")[0].style.boxShadow = "0 0 0 2px limegreen";
	document.getElementsByClassName("container-paragrafos-entradas")[0].style.boxShadow = "0 0 0 2px limegreen";
	
	document.getElementById("submit-form").value = "ATUALIZAR";
	
	for (i = 0; i < itemUf.length; i++) {
		itemUf[i].removeAttribute("selected");
	}
	for (z = 0; z < itemManchete.length; z++) {
		itemManchete[z].removeAttribute("selected");
	}
	
	
	document.getElementById("id").value = item[0].value;
	itemUf[code].setAttribute("selected", "selected");//item [1]
	document.getElementById("cidade").value = item[2].value;
	itemManchete[mancheteCode].setAttribute("selected", "selected");//item [3]
	
	let rbd = item[4].value,
		replicaBd = rbd.split('-');		
	for (mn = 0; mn < 28; mn++) {itemReplica[mn].checked = false;itemReplica[mn].removeAttribute("style");}//reset all
	for (m = 0; m < 28; m++) {
		for (n = 0; n < replicaBd.length; n++) {
			if (itemReplica[m].value == replicaBd[n]) {
				itemReplica[m].checked = true;
				if (itemReplica[m].value == itemUf[code].value) {itemReplica[m].setAttribute("style", "opacity: 0.3;pointer-events: none");}
			}
		}
	}
	
	
	document.getElementById("sigla").value = item[5].value;
	document.getElementById("instituicao").value = item[6].value;
	document.getElementById("apresentacao").value = item[7].value;
	document.getElementById("cargos").value = item[8].value;
	document.getElementById("vagas").value = item[9].value;
	document.getElementById("salario").value = item[10].value;
	document.getElementById("banca").value = item[11].value;
	document.getElementById("link-edital").value = item[12].value;
	document.getElementById("inicio-inscricoes").value = item[13].value;
	document.getElementById("termino-inscricoes").value = item[14].value;
	if (item[15].value > 0) {checkF.checked = true}else{checkF.checked = false}
	if (item[16].value > 0) {checkM.checked = true}else{checkM.checked = false}
	if (item[17].value > 0) {checkMt.checked = true}else{checkMt.checked = false}
	if (item[18].value > 0) {checkS.checked = true}else{checkS.checked = false}
	document.getElementById("paragrafos").value = item[19].value;
	document.getElementById("link-concurso").value = item[20].value;
	document.getElementById("img-clone").src = "../imagens/concursos/" + item[20].value + "-" + item[0].value + ".png";
	document.getElementById("link-apostila").value = item[21].value;
	document.getElementById("inscricoes-abertas").setAttribute("action", "../admin/editando-abertas.php");

	rePreview();
}
function rePreview () {
	let canvaspreview = document.getElementById("canvas-preview"),
		ctxpreview = canvaspreview.getContext("2d"),
		img = document.getElementById("img-clone");
	
	ctxpreview.clearRect(0, 0, 264, 220);
	canvaspreview.style.background = "url('../imagens/loading.gif') center white no-repeat";
	
	setTimeout(function () {
		ctxpreview.drawImage(img, 0, 0);
	},800);
	setTimeout(function () {
		let image = new Image();
		image.src = canvaspreview.toDataURL("image/png");
		document.getElementById('img-instituicao').value = image.src;
	},1000);
}


function carregarXMLDoc(input, valor) {	
	if (input.length > 2){
		
		document.getElementById("list-admin-" + valor + "-xml").style.display = "block";
		
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				myFunction(this, input, valor);
			}
		};
		xmlhttp.open("GET", "../admin/xml/" + valor + ".xml", true);
		xmlhttp.send();
	}else{
		document.getElementById("list-admin-" + valor + "-xml").style.display = "none";
	}
}

function myFunction(xml, input, valor) {
	var li = "", x, i, xmlDoc, valor, xclick, 
		xmlDoc = xml.responseXML;
	
	xmlList = xmlDoc.getElementsByTagName(valor);
	for (i = 0; i< xmlList.length; i++) {
		itemXML = xmlList[i].childNodes[0].nodeValue;
		var m = itemXML.toLowerCase();
		var v = input.toLowerCase();
			//mLink = retira_acentos(m.replace(" - ", "-"));
			
		xclick = "'list-admin-municipio-xml', " + "'" + itemXML + "'";
		
		if (m.includes(v) == true) {
			li += '<li onclick="fillInput(' + xclick + ')">' + itemXML + "</li>";
		}
	}
	document.getElementById("list-admin-" + valor + "-xml").innerHTML = li;
}
function fillInput (valor, itemXML) {
	/*if (valor.includes("municipio") == true) {
		document.getElementById("cidade").value = itemXML;
	}else{
		document.getElementById("cargos").value = itemXML;
	}*/
	document.getElementById("cidade").value = itemXML;
	document.getElementById("cobaia-cidade").value = itemXML;
	document.getElementById("sigla").focus();
	document.getElementById(valor).removeAttribute("style");
}


function acionaReplica (valor) {
	const itemReplica = document.querySelectorAll(".box-checkbox-replicar > input");
	
	for (mn = 0; mn < 28; mn++) {
		if (itemReplica[mn].value == valor) {
			itemReplica[mn].checked = true;
			itemReplica[mn].setAttribute("style", "opacity: 0.3;pointer-events: none");
		}else{
			itemReplica[mn].checked = false;
			itemReplica[mn].removeAttribute("style");
		}
	}
}