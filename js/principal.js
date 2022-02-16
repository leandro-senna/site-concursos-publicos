function roling (diodo) {
  const main = document.getElementsByTagName('MAIN')[0],
		nav = document.getElementsByTagName('NAV')[0],
		section = document.getElementsByTagName('SECTION')[0];
    
	let	scroll = section.scrollTop, limite, padding, 
		tst = "transition: all 0.2s ease 0s; ";

	if (innerHeight <= 830) {limite = 700}else{limite = 1100}//Desligar no final do scroll (Refatorar...)
	
	if ((scroll < (section.scrollHeight - limite)) && (innerWidth > 1200)) {
		if (scroll != diodo) {//Estabilidade na inversão
			if (scroll > diodo) {
				main.setAttribute("style", tst + "padding-top: 21px");
				nav.setAttribute("style", tst + "opacity: 0");
			}else{
				main.style.paddingTop = "55px";
				nav.style.opacity = 1;
				setTimeout(function () {
					main.removeAttribute("style");
					nav.removeAttribute("style");
				}, 200);
			}
		}
	}
	section.setAttribute("onscroll", "roling(" + scroll + ")");
}
/*
function roling (diodo) {
  const main = document.getElementsByTagName('MAIN')[0],
		nav = document.getElementsByTagName('NAV')[0],
		section = document.getElementsByTagName('SECTION')[0],
		asideMain = document.getElementById("col-principal"),
		boxCidade = document.getElementById("box-lcz-cidade");
    
	let	scroll = section.scrollTop, limite, padding, 
		tst = "transition: all 0.2s ease 0s; ";

	if (innerHeight <= 830) {limite = 700}else{limite = 1100}//Desligar no final do scroll (Refatorar...)
	

	if (scroll < (section.scrollHeight - limite)) {
		if (scroll != diodo) {//Estabilidade na inversão
			if (scroll > diodo) {
				main.setAttribute("style", tst + "padding-top: 21px");
				nav.setAttribute("style", tst + "opacity: 0");
				if ((innerWidth >= 1001) && (innerWidth <= 1200)) {
					asideMain.setAttribute("style", tst + "padding-top: 55px");
					boxCidade.setAttribute("style", tst + "height: calc(100% - 351px)");
				}
			}else{
				main.style.paddingTop = "55px";
				nav.style.opacity = 1;
				if ((innerWidth >= 1001) && (innerWidth <= 1200)) {//quebra galho tela 1024
					asideMain.style.paddingTop = "90px";
					boxCidade.setAttribute("style", tst + "height: calc(100% - 386px)");
				}
				setTimeout(function () {
					main.removeAttribute("style");
					nav.removeAttribute("style");
					asideMain.removeAttribute("style");
					boxCidade.removeAttribute("style")
				}, 200);
			}
		}
	}
	section.setAttribute("onscroll", "roling(" + scroll + ")");
}*/

function luz (ref) {
	const header = document.getElementsByTagName("HEADER")[0],
		  navMenu = document.getElementsByTagName("NAV")[0],
		  luz = document.getElementById("luz"),
		  ctnJanela = document.getElementById("container-janela"),
		  vBoxRt = document.getElementById("box-rt"),
		  vLczFnd = document.querySelector("#box-rt > input"),
		  seta = document.getElementById('seta'),
		  a = document.querySelectorAll("nav > ul > li > a");
	var endRef = ref.split('/').pop(),
		idJanela = endRef.replace(".php", "");
	
	document.getElementsByTagName("BODY")[0].style.position = "fixed";
	
	if (luz) {
		fecharLuz(ref)
	}else{
		const bornLuz = document.createElement("DIV");
		bornLuz.id = "luz";
		bornLuz.setAttribute("onclick", "luz('" + ref + "')")
		switch (ref) {
		case "menu":
			header.appendChild(bornLuz);
			setTimeout(function () {
				bornLuz.style.opacity = 1;
				openMenu()
			}, 10); break;
		case "boxRt":
			bornLuz.setAttribute("style", "z-index:2");
			document.body.appendChild(bornLuz);
			setTimeout(function () {
				bornLuz.style.opacity = 1;
				openBoxRt()
			}, 10); break;
		default:
			document.getElementById(idJanela).removeAttribute("href");
			document.body.appendChild(bornLuz);
			setTimeout(function () {bornLuz.style.opacity = 1}, 10)
			setTimeout(function () {janela(ref)}, 500)
		}
	}
	function openMenu () {
		navMenu.setAttribute("style", "transition: all 0.5s ease 0s");
		if ((window.screen.width < 481) || (innerWidth < 481)) {
			navMenu.style.width = "90%"
		}else{
			navMenu.style.width = "50%"
		}
		setTimeout(function () {
			for (let i = 0; i < a.length; i++) {
				a[i].setAttribute("style", "transform:scale(1)");
				
			}
			// Temporário
				document.querySelectorAll("nav > ul > li > button")[0].setAttribute("style", "transform:scale(1)");
				document.querySelectorAll("nav > ul > li > button")[1].setAttribute("style", "transform:scale(1)");
			// Fim Temporário
			document.getElementById("btn-menu").style.backgroundPosition = "center";
		}, 500);
	}
	function openBoxRt () {
		if (seta) {
			vBoxRt.setAttribute("style", "height: 50vh; padding-top: 51px");
			seta.setAttribute("style", "transform: rotate(180deg)");
		}else{
			vBoxRt.setAttribute("style", "height: 94px; padding-top: 53px");
			vLczFnd.disabled = false;
			setTimeout(function () {vLczFnd.select()}, 700);
		}
	}
	function janela (ref) {
		const bornJanela = document.createElement("DIV"),
			  contentJanela = '<div id="button-janela"><button onclick="luz(' + "'" + ref + "'" + ')"' +
							  '></button></div><div id="janela"><div id="box-janela"><iframe></iframe></div></div>';
		bornJanela.id = "container-janela";
		bornJanela.innerHTML = contentJanela;
		document.body.appendChild(bornJanela);
		setTimeout(function () {
			if (vBoxRt.style.height){
				vBoxRt.removeAttribute('style');
				seta.removeAttribute('style');
				luz.setAttribute("style", "transition: all 0.5s ease 0s; z-index: 4;opacity: 1")
				setTimeout(function () {bornJanela.style.opacity = 1}, 400)
			}else{
				bornJanela.style.opacity = 1;
			}
			
		}, 10)
		
		setTimeout(function () {document.getElementById(idJanela).setAttribute('href', ref)}, 600)
		if (idJanela != "login") {
			setTimeout(function () {document.querySelector("#box-janela > iframe").src = ref}, 600)
		}else{
			//Quebra galho para load login em div
			document.getElementById("box-janela").innerHTML = '<form style="display: none" id="form-login" name="form_login" method="post" action="logando.php"><table><thead><tr><th>login</th></tr></thead><tbody><tr><td><p><strong>Insira seu e-mail</strong><br>Enviaremos link para recadastro.</p> <input type="text" name="email_entrar" placeholder="e-mail"/> <input type="password" name="senha_entrar" placeholder="senha"/> <input id="confirma-senha" type="password" name="confirma_senha" placeholder="Confirme e senha"/> <input type="submit" value="Entrar"/><hr> <span onclick="comutaPagLogin(0)">Cadastrar senha</span> <span onclick="comutaPagLogin(1)">Esquecí minha senha</span> <span id="span-login" onclick="comutaPagLogin(2)">Voltar ao Login</span></td></tr></tbody></table></form>';
			setTimeout(function () {
				document.getElementById("form-login").removeAttribute('style');
			}, 800);
		}
	}
	function fecharLuz(ref){
		switch (ref) {
		case "menu":		
			if (vBoxRt.style.height) {
				const trocaLuz = document.createElement("DIV");
				trocaLuz.id = "luz";
				trocaLuz.style.opacity = 1;
				trocaLuz.setAttribute("onclick", "luz('" + ref + "')");
				header.appendChild(trocaLuz);
				if (vLczFnd){vLczFnd.disabled = true}
				vBoxRt.removeAttribute("style");
				luz.remove();
				openMenu();
			}else{
				for (let i = 0; i < a.length; i++) {
					a[i].removeAttribute('style');
				}
				// Temporário
					document.querySelectorAll("nav > ul > li > button")[0].removeAttribute('style');
					document.querySelectorAll("nav > ul > li > button")[1].removeAttribute('style');
				// Fim Temporário
				navMenu.style.width = "0";
				luz.style.opacity = "0";
				setTimeout(function () {resetAllLuz()}, 600);
			}
		break;
		case "boxRt":
			luz.style.opacity = 0;
			vBoxRt.removeAttribute('style');
			if (seta) {
				seta.removeAttribute('style');
			}else{
				if (vLczFnd){vLczFnd.disabled = true}
			}
			setTimeout(function () {resetAllLuz()}, 600)
		break;
		case "rsz":
			resetAllLuz();
		break;
		default:
			if (ctnJanela) {
				ctnJanela.style.opacity = 0;
				setTimeout(function () {
					luz.setAttribute("onclick", "luz('menu')")//muda luz para menu pois NAV está com width setado
					ctnJanela.remove();
				}, 550);
				if (!navMenu.style.width) {
					setTimeout(function () {luz.style.opacity = 0}, 500)
					setTimeout(function () {resetAllLuz()}, 1050)
				}
			}else{
				//remove href do link assim como em luz(this.href)
				document.getElementById(idJanela).removeAttribute("href");
				//coloca href em luz pois pulará o inicio do script
				luz.setAttribute("onclick", "luz('" + ref + "')")
				janela(ref)
			}
		}
		document.getElementsByTagName("BODY")[0].removeAttribute("style");
	}
	function resetAllLuz () {
		header.removeAttribute("style");
		navMenu.removeAttribute("style");
		vBoxRt.removeAttribute("style");
		document.getElementById("btn-menu").removeAttribute("style");
		
		if (luz) {luz.remove()}
		if (ctnJanela) {ctnJanela.remove()}
		if (vLczFnd) {vLczFnd.removeAttribute("style")}
		if (seta) {seta.removeAttribute("style")}
		
		for (let f = 0; f < a.length; f++) {
			a[f].removeAttribute("style")
		}		 
	}
}
function rsz () {
	document.getElementsByTagName('MAIN')[0].removeAttribute("style");
	document.getElementsByTagName('NAV')[0].style.opacity = 1;
	
	if (((innerWidth > 880) || (window.screen.width > 880)) &&
	   ((document.getElementsByTagName("NAV")[0].style.width) /*|| 
	   (document.getElementById("box-rt").style.height)*/)) {
        luz("rsz");
    }
}
function imgNone () {document.querySelector("button#seta > img").style.display = "none"}
function imgBlock () {document.querySelector("button#seta > img").style.display = "block"}

function mudaCidCargo(a, b) {
	const boxA = document.getElementById("box-lcz-" + a),
		  boxB = document.getElementById("box-lcz-" + b),
		  labelA = document.querySelector("div#box-lcz-" + a + " > label")
		  labelB = document.querySelector("div#box-lcz-" + b + " > label");
	
	boxB.removeAttribute("style");
	labelB.setAttribute("style", "background-color: #f2f2f2; color: #888; font-weight: normal");
	boxA.style.zIndex = 1;
	labelA.setAttribute("style", "background-color: #fff; color: maroon; font-weight: bold");
}

//Refatorar código Amador:
function comutaPagLogin (valor) {
  const thead = document.querySelector("#form-login > table > thead > tr > th"),
		td = document.querySelector("#form-login > table > tbody > tr > td"),
		p = document.querySelector("#form-login > table > tbody > tr > td > p"),
		mail = document.querySelectorAll("#form-login > table > tbody > tr > td > input")[0],
		pass = document.querySelectorAll("#form-login > table > tbody > tr > td > input")[1],
		confirma = document.querySelectorAll("#form-login > table > tbody > tr > td > input")[2],
		btn = document.querySelectorAll("#form-login > table > tbody > tr > td > input")[3],
		cadastrar = document.querySelectorAll("#form-login > table > tbody > tr > td > span")[0],
		recuperar = document.querySelectorAll("#form-login > table > tbody > tr > td > span")[1],
		spanLogin = document.querySelectorAll("#form-login > table > tbody > tr > td > span")[2];
		
	if (valor == 0) {
		thead.innerHTML = "Cadastrar Usuário";
		td.style.paddingTop = "20px";
		td.style.paddingBottom = "12px";
		p.style.display = "none";
		pass.style.display = "block";
		confirma.style.display = "block";
		btn.value = "Enviar";
		cadastrar.style.display = "none";
		recuperar.style.display = "none";
		spanLogin.style.display = "block";
	}else if (valor == 1) {
		thead.innerHTML = "Recuperar Senha";
		p.style.display = "block";
		p.style.marginTop = "-15px";
		pass.style.display = "none";
		confirma.style.display = "none";
		btn.value = "Recuperar";
		cadastrar.style.display = "none";
		recuperar.style.display = "none";
		spanLogin.style.display = "block";
		spanLogin.style.marginTop = "12px";
	}else{
		thead.innerHTML = "Login";
		td.removeAttribute("style");
		p.removeAttribute("style");
		pass.removeAttribute("style");
		mail.removeAttribute("style");
		confirma.removeAttribute("style");
		btn.value = "Entrar";
		cadastrar.removeAttribute("style");
		recuperar.removeAttribute("style");
		spanLogin.removeAttribute("style");
	}
}
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
function carregarXMLDoc(input, valor) {	
	if (input.length > 2){
		document.getElementById("list-" + valor + "-xml").style.display = "block";
		document.getElementById("list-" + valor + "").style.display = "none";
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				myFunction(this, input, valor);
			}
		};
		xmlhttp.open("GET", "xml/" + valor + ".xml", true);
		xmlhttp.send();
	}else{
		document.getElementById("list-" + valor + "-xml").style.display = "none";
		document.getElementById("list-" + valor + "").style.display = "block";
	}
}

function myFunction(xml, input, valor) {
	var li = "", x, i, xmlDoc, valor, 
		xmlDoc = xml.responseXML;

	xmlList = xmlDoc.getElementsByTagName(valor);
	for (i = 0; i< xmlList.length; i++) {
		itemXML = xmlList[i].childNodes[0].nodeValue;
		var m = itemXML.toLowerCase();
		var v = input.toLowerCase();
		var mLink = retira_acentos(m.replace(" - ", "-"));
		if (m.includes(v) == true) {
			li += "<li><a href='http://www.siteconcursos.com.br/concurso-publico-por-" + valor + "/" + mLink + "'>" + itemXML + "</a></li>";
		}
	}
	document.getElementById("list-" + valor + "-xml").innerHTML = li;
}

/*
// Para load login in javascript

var txtFile = new XMLHttpRequest();
txtFile.open("GET", "${resourcesFolderName}/text.txt", true);
txtFile.onreadystatechange = function() {
  if (txtFile.readyState === 4) {  // Makes sure the document is ready to parse.
    if (txtFile.status === 200) {  // Makes sure it's found the file.
      allText = txtFile.responseText; 
      //lines = txtFile.responseText.split("\n"); // Will separate each line into an array
      var customTextElement = document.getElementById('textHolder');
customTextElement.innerHTML = txtFile.responseText;
    }
  }
}
txtFile.send(null);
*/