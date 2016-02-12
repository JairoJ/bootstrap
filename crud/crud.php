<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD AJAX+PHP+MYSQL</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script type="text/javascript" src="js/ajax.js"></script>
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Jairo</a>
      </div>
    </nav>
    <div class="container">
      <div class="starter-template">
        <h1>CRUD PHP+Mysql+AJAX</h1>
        <p class="lead">Aplicación gestión de clientes</p>
        <button type="button" onclick="Nuevo();" class="btn btn-primary btn-lg" >
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Nuevo
        </button>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">Lista de Usuarios</div>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>Ocupacion</th>
              <th>Comentarios</th>
            </tr>
          </thead>
          <tbody>
          <!--Conexion php-->
              <?php
              require("clases/conexion.php");
              	$con = Conectar();
              	$sql = 'SELECT id, nombre, apellidos, ocupacion, comentario FROM registros';
              	$stmt = $con->prepare($sql);
              	$result= $stmt->execute();
              	$rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
              	foreach ($rows as $row){
              ?>
              	<tr>
              	<td><?php print($row->id); ?></td>
                <td><?php print($row->nombre); ?></td>
                <td><?php print($row->apellidos); ?></td>
                <td><?php print($row->ocupacion); ?></td>
                <td><?php print($row->comentario); ?></td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-danger">Seleccione</button>
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <span class="caret"></span>
                    </button>
                   	<ul class="dropdown-menu" role="menu">
                      <li><a onclick="Eliminar('<?php print($row->id); ?>');">Eliminar</a></li>
                      <li><a onclick="Editar('<?php print($row->id); ?>',<?php print($row->nombre); ?>', '<?php print($row->apellidos); ?>', '<?php print($row->ocupacion); ?>', '<?php print($row->comentario); ?>');">Actualizar</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
              <!-- Aqui cerramos foreach -->
                <?php	
                }
                ?>
            
             </tbody>
        </table>
      </div>

      <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Nuevo Usuario</h4>
            </div>
            <!-- Formulario -->
            <form role="form" action="" name="frmClientes" onsubmit="Registrar(idR, accion); return false">
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Nombre</label>
                  <input name="nombre" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Apellidos</label>
                  <input name="apellidos" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Ocupación</label>
                  <input name="ocupacion" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Comentario</label>
                  <input name="comentario" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-info btn-lg">
                  <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Registrar
                </button>

              </div>
            </form>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-circle" data-dismiss="modal"><i class="fa fa-times"></i>x</button>
            </div>
          </div>
        </div>
      </div>

    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>	
    <script type="text/javascript">
    	var accion;
    	var idR;
    			function Nuevo(){
    				accion = 'N';
    				document.frmClientes.nombre.value = "";
    				document.frmClientes.apellidos.value = "";
    				document.frmClientes.ocupacion.value = "";
    				document.frmClientes.comentario.value = "";
    				$('#modal').modal('show');
    			}

    			function Editar(id, nombre, apellidos, ocupacion, comentario){
    				accion = 'E';
    				idR = id;
    				document.frmClientes.nombre.value = nombre;
    				document.frmClientes.apellidos.value = apellidos;
    				document.frmClientes.ocupacion.value = ocupacion;
    				document.frmClientes.comentario.value = comentario;
    				$('#modal').modal('show');
    			}
    	</script>

  </body>
  </html>