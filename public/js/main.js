// document.getElementById("email").addEventListener("keyup", validarEmail);
function validarEmail(valor) {
    var campoEmail = document.getElementById("email");

    re=/^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
	if(!re.exec(valor)){
        campoEmail.style.backgroundColor = "#FFA6A1";
    } else{
        campoEmail.style.backgroundColor = "#C7FFDD";
    }
}

/* ----------------------------------------------------------------------------------------- */

document.getElementById("dni").addEventListener("keyup", comprobarDni);

function comprobarDni(dni_user){
    var campo = document.getElementById("dni");

    var vLetras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
    var numerosDni= dni_user.substring(0,8);
    var letraDni= dni_user.substring(8,9);
    var resto = parseInt(numerosDni)%23;

    if(vLetras[resto] != letraDni.toUpperCase()){
        //campo.style.border = "2px solid red";
        campo.style.backgroundColor = "#FFA6A1";
    } else{
        campo.style.backgroundColor = "#C7FFDD";
        //campo.style.border = "2px solid green";
        
    }
}

/* ----------------------------------------------------------------------------------------- */



function fn_ValidateIBAN(IBAN, idusu1) {
    
    var campoiban = document.getElementById("cc_"+idusu1);
    //Se pasa a Mayusculas
    IBAN = IBAN.toUpperCase();
    //Se quita los blancos de principio y final.
    IBAN = IBAN.trim();
    IBAN = IBAN.replace(/\s/g, ""); //Y se quita los espacios en blanco dentro de la cadena

    var letra1,letra2,num1,num2;
    var isbanaux;
    var numeroSustitucion;
    //La longitud debe ser siempre de 24 caracteres
    if (IBAN.length != 24) {
        campoiban.style.backgroundColor = "#FFA6A1";
    } else {
        campoiban.style.backgroundColor = "#C7FFDD";
    }

    // Se coge las primeras dos letras y se pasan a números
    letra1 = IBAN.substring(0, 1);
    letra2 = IBAN.substring(1, 2);
    num1 = getnumIBAN(letra1);
    num2 = getnumIBAN(letra2);
    //Se sustituye las letras por números.
    isbanaux = String(num1) + String(num2) + IBAN.substring(2);
    // Se mueve los 6 primeros caracteres al final de la cadena.
    isbanaux = isbanaux.substring(6) + isbanaux.substring(0,6);

    //Se calcula el resto, llamando a la función modulo97, definida más abajo
    resto = modulo97(isbanaux);
    if (resto == 1){
        campoiban.style.backgroundColor = "#C7FFDD";
    }else{
        campoiban.style.backgroundColor = "#FFA6A1";
    }
}

function modulo97(iban) {
    var parts = Math.ceil(iban.length/7);
    var remainer = "";

    for (var i = 1; i <= parts; i++) {
        remainer = String(parseFloat(remainer+iban.substr((i-1)*7, 7))%97);
    }

    return remainer;
}

function getnumIBAN(letra) {
    ls_letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return ls_letras.search(letra) + 10;
}

/* ----------------------------------------------------------------------------------------- */

/* arreglar modal cambiar contraseña para que funcione con javascript/bootstrap */
function mostrarPass(id){
    var campo = document.getElementById("clave_"+id);

    if(campo.type == "password"){
        campo.type = "text";
    }else{
        campo.type = "password";
    }
}

/* ----------------------------------------------------------------------------------------- */
function crearmodalEditar(idusu) {
    var modal=document.getElementById(idusu);
    
    var close =document.getElementsByTagName("close")[0];
    modal.style.display="block";
    close.style.overflow="hidden";
}

function crearmodalInfo(id) {
    var modal1=document.getElementById(id);
    
    var close1 =document.getElementsByTagName("close")[0];
    modal1.style.display="block";
    close1.style.overflow="hidden";
}


function cerrar(idusu){
    var modal=document.getElementById(idusu);
    var close=document.getElementsByTagName("close")[0];
    modal.style.display="none";
    close.style.overflow="visible";
}
/*------------------------------------------------------------ */