<?php
session_start();
include 'head.php';

if ($_SESSION['logueado']==sha1("juan"))
{
 echo $_SESSION['logueado'];

}

?>
	<h1 class="page-header text-center">PHP CRUD usando PDO</h1>
	<div class="row">
		<div class="col-sm-12">
			<a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="fa fa-plus"></span> Nuevo</a>
            
			<table class="table table-bordered table-striped" style="margin-top:20px;">
				<thead>
					<th>ID</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Dirección</th>
					<th>Acción</th>
				</thead>
				<tbody>
					<?php
						
						// incluye la conexión
						include_once('../Modelo/crud_alumnos.php');
						include_once('../Modelo/alumno.php');
						$crud= new CrudAlumnos();
						
						try{	
							$listado_alumnos=$crud->mostrar();
						    foreach ($listado_alumnos as $row) {
						    	?>
						    	<tr>
						    		<td><?php echo $row['id']; ?></td>
						    		<td><?php echo $row['nombre']; ?></td>
						    		<td><?php echo $row['apellidos']; ?></td>
						    		<td><?php echo $row['direccion']; ?></td>
						    		<td>
						    			<a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="fa fa-edit"></span> Editar</a>
						    			<a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="fa fa-trash"></span> Eliminar</a>
						    		</td>
						    		<?php include('edit_delete_modal.php'); ?>
						    	</tr>
						    	<?php 
						    }
						}
						catch(PDOException $e){
							echo "Existe un problema en la conexion: " . $e->getMessage();
						}

						

					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php 
include('add_modal.php'); 
include 'footer.php';
?>