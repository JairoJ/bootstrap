function objetoAjax(){
 var xmlhttp=false;
 try{
 	xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
 } catch (e) {
 	try{
 		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
 	}catch(E) {
 		xmlhttp = false;
 	}
 }
	if (!xmlhttp && typeof XMLHttpRequest!='undefined'){
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
function Registrar(idR, accion){

	nombre = document.frmClientes.nombre.value;
	apellidos = document.frmClientes.apellidos.value;
	ocupacion = document.frmClientes.ocupacion.value;
	cometario = document.frmClientes.comentario.value;
	ajax = objetoAjax();
	// Aquie comienza el condicional
	if (accion=='N') {
		ajax.open("POST", "clases/registrar.php", true);
	}else if (accion=='E') {
		ajax.open("POST", "clases/actualizar.php", true);
	}
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert('Los datos fueron actualizados con exito!');
			window.location.reload(true);
		}
	}
ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
ajax.send("nombre="+nombre+"&apellidos"+apellidos+"&ocupacion"+ocupacion+"&cometario"+cometario+"&idR="+idR);
}


function Eliminar(idR){
if (confirm("REalmente desea eliminar registro?")){
ajax = objetoAjax();
ajax.open("POST", "clases/eliminar.php", true);
ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			alert('Los datos fueron eliminados :(');
			window.location.reload(true);
		}
	}
ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
ajax.send("&idR="+idR)
}else{
	//sin acciones
}
}
