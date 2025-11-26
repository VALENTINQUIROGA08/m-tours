<?php
session_start();
require_once 'componentes/conexion.php';

$paquetes = $conexion->query("SELECT * FROM paquetes WHERE estado='disponible';");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="index.css">
    <title>EMPRESA</title>
</head>

<body>
    <?php
    if ($_SESSION['userid']) {
        echo 'hola' . $_SESSION['nombre'];
        echo '<a href="logOut.php">CERRAR SESION</a>';
    } else {
        echo '<a href="login.php">INICIO SESION</a>';
    }
    ?>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <a href="#" class="enlace">
            <img src="logo.png" alt="" class="logo">
        </a>
        <ul>
            <li><a class="active" href="#">Página principal</a></li>
            <li class="paquetes"><a href="#">Paquetes</a></li>
            <li class="contacto"><a href="#">Contacto</a></li>
        </ul>
    </nav>


    <hr>
    <div class="detallec">
        <div class="row row-cols-2 row-cols-md-3 g-3">
            <?php foreach ($paquetes as $paquete) { ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="d-flex flex-column">
                        <div class="card" style="background-color: #054568ff; color:beige">
                            <div class="card-body">
                                <img src="https://picsum.photos/50/50" alt="Logo del paquete" class="card-img-top mb-2">
                                <h5 class="card-title"><?= $paquete['nombre_paquete'] ?></h5>
                                <p class="card-text"><?= $paquete['descripcion_breve'] ?></p>

                            </div>

                            <div class="card-footer"></div>
                            <div class="card-footer border-0 mt-3">
                                <a href="pagina.php?id=<?= $paquete["id_paquete"] ?>"
                                    class="btn  w-100 fw-bold rounded-pill" style="background-color: beige;color: black;" target="_blank">
                                    !RESERVA AHORA!
                                </a>

                            </div>
                        </div>

                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>