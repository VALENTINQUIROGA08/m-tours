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
            <li><a class="active "href="#">Inicio</a></li>
            <li><a href="#">Nosotros</a></li>
            <li><a href="#">QSY</a></li>
            <li><a href="#">OPT</a></li>
            <li><a href="#">HOLA</a></li>

        </ul>
    </nav>
    <section></section>
    <?php
        foreach($Usuarios as $Usuarios){
            echo $Usuarios ['nombre'];
        }
    ?>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html> 