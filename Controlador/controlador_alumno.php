<?php
// incluye la conexión
include_once('../Modelo/crud_alumnos.php');
include_once('../Modelo/alumno.php');
$crud= new CrudAlumnos();
$alumno= new Alumno();
if (isset($_POST['add'])) {
//ha pulsado añadir

try{
	$alumno->setNombre($_REQUEST['nombre']);
	$alumno->setApellidos($_REQUEST['apellidos']);
	$alumno->setDireccion($_REQUEST['direccion']);	
	//ya tengo el objeto miembro
	//ahora se lo paso a la funcion que inserta en crud_miembros
	$crud->insertar($alumno);
	
	header("Location:../Vista/form_alumnos.php");

}
catch(PDOException $e){
	echo "Existe algun problema en la Conexión: " . $e->getMessage();
}

}
else
if (isset($_POST['edit'])) {
    //ha pulsado modificar

    try{
        $alumno->setId($_REQUEST['id']);
        $alumno->setNombre($_REQUEST['nombre']);
        $alumno->setApellidos($_REQUEST['apellidos']);
        $alumno->setDireccion($_REQUEST['direccion']);	
        //ya tengo el objeto miembro
        //ahora se lo paso a la funcion que inserta en crud_miembros
        $crud->actualizar($alumno);
        
        header("Location:../Vista/form_alumnos.php");
    
    }
    catch(PDOException $e){
        echo "Existe algun problema en la Conexión: " . $e->getMessage();
    }
}

else{
        //ha pulsado borrar
        try{
            $id=$_REQUEST['id'];
            
            //ya tengo el id 
            //ahora se lo paso a la funcion que borrar en crud_miembros
            $crud->eliminar($id);
            
            header("Location:../Vista/form_alumnos.php");
        
        }
        catch(PDOException $e){
            echo "Existe algun problema en la Conexión: " . $e->getMessage();
        }
        
    }