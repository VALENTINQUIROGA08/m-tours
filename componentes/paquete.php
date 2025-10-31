<?php


echo encabezadoPaquete(titulo: "¡M-Tours - detalle del paquete!");

$paqueteId = isset($_GET['id_paquete']) ? intval(value: $_GET['id_paquete']) : 0;

if ($paqueteId !=null && $paqueteId > 0) {
    require_once 'componentes/conexion.php';

    $paqueteId = $conexion->query("SELECT * 
    FROM paquetes 
    WHERE paquetes.id_paquete = $paqueteId AND estado='disponible' OR paquetes.estado = proximo ;")->fetch_assoc();
}
    $servicios = $conexion->query("
    SELECT *
    FROM servicios JOIN paquete_servicio ON servicios.id_servicio = paquete_servicio.id_servicio
    WHERE paquete_servicio.id_paquete = $paqueteId;");
     