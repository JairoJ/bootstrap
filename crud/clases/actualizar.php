 <?php
 nombre = $_POST['nombre'];
 apellidos = $_POST['apellidos'];
 ocupacion = $_POST['ocupacion'];
 cometario = $_POST['comentario'];
 $idR = $_POST ['idR'];
 require('conexion.php');
 $con = Conectar();
 $sql = 'UPDATE registros SET nombre=:nombre, apellidos=:apellidos, ocupacion=:ocupacion, comentario=:comentario WHERE id=:id';
 $q = $con->prepare($sql);
 $q->execute(array(':nombre'=>$nombre, ':apellidos'=>$apellidos, ':ocupacion'=>$ocupacion, ':comentario'=>$comentario ':id'=>$idR));
 ?>