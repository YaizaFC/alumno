<?php
include '../Vista/head.php';
$ch = curl_init();
//Abrimos conexión cURL y la almacenamos en la variable $ch.
curl_setopt($ch, CURLOPT_URL, "https://localhost/crud_pdo/API_REST/RESTful.php/");
//Abrimos conexión cURL y la almacenamos en la variable $ch.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// 0 o 1, indicamos que no queremos al Header en nuestra respuesta
curl_setopt($ch, CURLOPT_HEADER, 0); 
//Ejecuta la petición HTTP y almacena la respuesta en la variable $data.
$data = curl_exec($ch);

curl_close($ch);
var_dump( $data); 
//$json = json_decode(file_get_contents('https://localhost/crud_pdo/API_REST/RESTful.php/'), true);
//var_dump($json);

//echo file_get_contents('https://localhost/crud_pdo/API_REST/RESTful.php/');

include '../Vista/footer.php';
?>