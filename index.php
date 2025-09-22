<?php
require_once 'componentes/conexion.php';

$Usuarios = $conexion->query("SELECT * FROM `Usuarios`;");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>EMPRESA</title>
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <a href="#" class="enlace">
            <img src="logo.png" alt="" class="logo">
        </a>
        <ul>
            <li><a class="active "href="#">Pagina principal</a></li>
            <li class="paquetes"><a href="#">Paquetes</a></li>
            <li class="contacto"><a href="#">Contacto</a></li>
        </ul>
    </nav>
    <div class="row row-cols-2 row-cols-md-3 g-3">
        <?php foreach ($paquetes as $paquete) { ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="d-flex flex-column">
                    <div class="card">
                        <div class="card-title">
                            <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fpixabay.com%2Fes%2Fimages%2Fsearch%2Ffondo%2520noche%2F&psig=AOvVaw0vhigkzvx5UXa7ZarQf1gj&ust=1758655995305000&source=images&cd=vfe&opi=89978449&ved=0CBUQjRxqFwoTCJj7i6GO7Y8DFQAAAAAdAAAAABAK" alt="">
                            <h3><?= $paquete['destino'] ?></h3>
                        </div>
                        <div class="card-body">
                            <img class="card-img-top"  src="<?=$paquete['url_imagen']?>" alt="">
                            <p><?=$paquete ?></p>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html> 