<?php


echo encabezadoPaquete(titulo: "¡M-Tours - detalle del paquete!");

$paqueteId = isset($_GET['id_paquete']) ? intval(value: $_GET['id_paquete']) : 0;

if ($paqueteId !null && $paqueteId > 0) 
    require_once 'componentes/conexion.php';

    $paqueteId = $conexion->query("SELECT * 
    FROM paquetes 
    WHERE paquetes.id_paquete = $paqueteId AND estado='disponible' OR paquetes.estado = proximo ;")->fetch_assoc();

if(!$paqueteId) {
    echo "<div class='alert alert-danger'>paquete no encontrado o no disponible.</div>";
    exit;   
} else