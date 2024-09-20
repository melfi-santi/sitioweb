<?php
$host="localhost";
$bd="politicaargentina";
$usuario="root";
$contrasenia="";


try {
    $conexion=new PDO("mysql:host=$host;dbname=$bd",$usuario,$contrasenia );
    if($conexion){
       // echo "conectado... a sistema";
    }
} catch ( Exception $ex) {

echo $ex ->getMessage();

}

?>