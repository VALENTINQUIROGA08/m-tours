<?php

$paqueteId = isset($_GET['id_paquete']) ? intval(value: $_GET['id_paquete']) : 0;

if ($paqueteId != null && $paqueteId > 0) {
    require_once 'componentes/conexion.php';

    $paquete = $conexion->query("SELECT * 
    FROM paquetes 
    WHERE paquetes.id_paquete = $paqueteId AND estado='disponible' OR paquetes.estado = 'proximo' ;")->fetch_assoc();
    if (!$paquete) {
        echo "<div class='alert alert-dange'>paquete no encontrado o no disponible.</div>";
        exit;
    } else {
        $servicios = $conexion->query("
    SELECT * 
    FROM paquetes 
    WHERE paquetes.id_paquete = $paqueteId AND estado='disponible' OR paquetes.estado = 'proximo';");
    }
} else {
    echo "<div class='alert alert-danger'>ID de paquete no válido.</div>";
    exit;
}
?>
