 <?php
 nombre = $_POST['nombre'];
 apellidos = $_POST['apellidos'];
 ocupacion = $_POST['ocupacion'];
 cometario = $_POST['comentario'];
 require('conexion.php');
 $con = Conectar();
 $sql = 'INSERT INTO registros (nombre, apellidos, ocupacion, comentarios) VALUES (:nombre, :apellidos, :ocupacion, :comentario)';
 $q = $con->prepare($sql);
 $q->execute(array(':nombre'=>$nombre, ':apellidos'=>$apellidos, ':ocupacion'=>$ocupacion, ':comentario'=>$comentario ));
 ?>