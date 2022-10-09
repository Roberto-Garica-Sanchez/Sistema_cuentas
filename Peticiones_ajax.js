function load_variables_sistema() {
    if (document.getElementById('Soft_version')) {
        Soft_version = document.getElementById('Soft_version');
        if (typeof Soft_version !== 'undefined') {
            selected_Soft_version = Soft_version.options[Soft_version.selectedIndex].text;
        }
    }
    if (document.getElementById('Programa')) {
        programa_actual = document.getElementById('Programa');
        if (typeof programa_actual !== 'undefined') {
            selected_programa_actual = programa_actual.options[programa_actual.selectedIndex].text;
        }
    }
    URLactual = window.location.pathname;

}

function cambia_menu(elemento) {
    load_variables_sistema();
    //console.log(selected_Soft_version);
    //console.log(selected_programa_actual);
    arrayAjax = {
        "URL": URLactual + selected_Soft_version + '/' + selected_programa_actual + '/',
        "METODO": "POST",
        "DATOS": "Soft_version=" + selected_Soft_version +
            "&" + "name_programa=" + selected_programa_actual, //+
        //"&" + "menus=" + ,
        "RESPUESTA": {
            "PRESENTA": {
                "DIV": "menu_principal",
            }
        }
    };

    consulta_v4(arrayAjax);

}


function crearAjax() {
    var objetoAjax = false;
    if (navigator.appName == "Microsoft Internet Explorer")
        objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
    else
        objetoAjax = new XMLHttpRequest();
    return (objetoAjax);
}

function consulta_v4(arrayAjax) {
    //if(arrayAjax["URL"])
    //alert(URLactual);
    /*
    arrayAjax = {
        "URL": URLactual + selected_Soft_version + '/' + selected_programa_actual + '/',
        "METODO": "POST",
        "DATOS": "Soft_version=" + selected_Soft_version + "&" + "Programa=" + selected_programa_actual,
        "RESPUESTA": {
            "PRESENTA": {
                "DIV": "",
                "IMPUT": "",
                "OTRO": {
                    "ID": "",
                    "PROPIEDAD": ""
                }
            }
        }
    };
	*/
    if (arrayAjax["URL"].length == 0) { alert("peticion sin direccion "); }
    if (arrayAjax["METODO"].length == 0) { arrayAjax["METODO"] = "POST"; }
    var ajax = crearAjax();
    if (ajax) {
        ajax.onreadystatechange = function() {
            if (((ajax.readyState == 1) || (ajax.readyState == 2) || (ajax.readyState == 3)) && (ajax.status == 200)) { //Mientras esta en ejecucion la peticion 
                console.log("conectando");
            }
            if ((ajax.readyState == 3) && (ajax.status == 200)) {
                console.log("cargando");
            }
            if ((ajax.readyState == 4) && (ajax.status == 200)) {
                console.log("datos recividos");
                respuesta = document.createTextNode(ajax.responseText);
                contesta = this.responseText;
                console.log(respuesta);
                if (typeof arrayAjax.RESPUESTA.PRESENTA !== 'undefined') {
                    if (typeof arrayAjax.RESPUESTA.PRESENTA.DIV !== 'undefined') {
                        if (document.getElementById(arrayAjax.RESPUESTA.PRESENTA.DIV)) {
                            div_select = document.getElementById(arrayAjax.RESPUESTA.PRESENTA.DIV);
                            div_select.innerHTML = contesta;
                        }
                    }
                }
                /*
				var respuesta = document.createTextNode(ajax.responseText);
				var contesta = this.responseText;
				if (conso) { //verifica si definio y existe la consola
					if (tipo_conso == "inn") { //si la consola es un Div 
						//if()
						if ((contesta != "0") && (contesta != "1")) { //si responde algo que no sea 1 o 0 
							if (echo_conso == "echo_conso") {
								conso.innerHTML += contesta;
							} //imprime la respuesta en la consola si lo solicita 
						}
						if (diagnostico != '') {
							console.log("conso Respuesta Ajax: " + contesta);
						}
						if (Callback) Callback(destino, contesta, opcion, conso, conte_res, elemento, carga); //si definio una funcion
					}
					if (tipo_conso == "value") { //si la consola es un input 
						conso.innerHTML = "";
						if ((contesta != "0") && (contesta != "1")) { //si responde algo que no sea 1 o 0 
							if (echo_conso == "echo_conso") { conso.value = contesta; } //imprime la respuesta en la consola si lo solicita 
						}
						if (diagnostico != '') {
							console.log("conso Respuesta Ajax: " + contesta);
						}
						if (Callback) Callback(destino, contesta, opcion, conso, conte_res, elemento, carga); //si definio una funcion
					}
				} 
				*/
            }
        }

        ajax.open(arrayAjax["METODO"], arrayAjax["URL"], true);
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        ajax.send(arrayAjax["DATOS"]);
    }

}