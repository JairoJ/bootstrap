 <?php
 $idR = $_POST['idR'];
 require('conexion.php');
 $con = Conectar();
 $sql = 'DELETE FROM registros WHERE id=:id';
 $q = $con->prepare($sql);
 $q->execute(array(':id'=>$idR));
 ?>