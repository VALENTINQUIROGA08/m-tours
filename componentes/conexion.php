<?php
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$base = "m_tours";


//conexion propia a la bbdd
$conexion = new mysqli($servidor,$usuario,$contraseña,$base);

// chequeo de conexion
if($conexion->connect_error){
    die("Error de conexion: " . $conexion->connect_error);
}