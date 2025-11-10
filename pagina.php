<?php
require_once 'componentes/conexion.php';
require_once 'componentes/encabezado.php';

echo pagina("VOLAR DESPUES TE DIGO");


$paqueteId = isset($_GET['id']) ? intval(value: $_GET['id']) : 0;

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


   <?php require_once 'componentes/menu.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
