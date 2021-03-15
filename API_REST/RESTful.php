<?php

require_once('../Modelo/Conexion.php');
include_once('../Modelo/crud_alumnos.php');

//header('Access-Control-Allow-Origin: *');
//header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
//header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
//header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$conexion = new Conexion();
$con = $conexion->open();

/*
  listar todos los posts o solo uno
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['id']))
    {
      //Mostrar un post

      $select=$con->prepare('SELECT * FROM alumnos where id=?');
	  $select->execute(array($_GET['id']));
	  $filas=$select->fetchAll();
      //header("HTTP/1.1 200 OK");
      echo json_encode($filas);
	 $conexion->close();
     exit();
     
	  }
    else {
      //Mostrar lista de post
      /*$select=$con->prepare('SELECT * FROM alumnos');
	  $select->execute();
	  $filas=$select->fetchAll();
      echo json_encode ($filas);
	  $conexion->close();*/

      $crud= new CrudAlumnos();
      $lista=$crud->mostrar();
      echo json_encode ($lista);

     //header("HTTP/1.1 200 OK");
     
     exit();
     
	}
}

if($_POST['METHOD']=='POST'){
    /*unset($_POST['METHOD']);
    $nombre=$_POST['nombre'];
    $lanzamiento=$_POST['lanzamiento'];
    $desarrollador=$_POST['desarrollador'];
    $query="insert into frameworks(nombre, lanzamiento, desarrollador) values ('$nombre', '$lanzamiento', '$desarrollador')";
    $queryAutoIncrement="select MAX(id) as id from frameworks";
    $resultado=metodoPost($query, $queryAutoIncrement);
    echo json_encode($resultado);
    header("HTTP/1.1 200 OK");
    exit();*/
}

if($_POST['METHOD']=='PUT'){
    /*unset($_POST['METHOD']);
    $id=$_GET['id'];
    $nombre=$_POST['nombre'];
    $lanzamiento=$_POST['lanzamiento'];
    $desarrollador=$_POST['desarrollador'];
    $query="UPDATE frameworks SET nombre='$nombre', lanzamiento='$lanzamiento', desarrollador='$desarrollador' WHERE id='$id'";
    $resultado=metodoPut($query);
    echo json_encode($resultado);
    header("HTTP/1.1 200 OK");
    exit();*/
}

if($_POST['METHOD']=='DELETE'){
    unset($_POST['METHOD']);
    $id=$_GET['id'];
    
     $sql="DELETE FROM alumnos WHERE id=?";
     //preparo la sentencia
    $eliminar=$con->prepare($sql);
    //la ejecuto pasando los parametros que hagan falta
    $eliminar->execute(array($id));
    $conexion->close();
    echo json_encode($resultado);
    header("HTTP/1.1 200 OK");
    exit();
}

header("HTTP/1.1 400 Bad Request");

?>