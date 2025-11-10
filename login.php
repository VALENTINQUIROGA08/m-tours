<?php

use function PHPSTORM_META\type;

    require_once 'componentes/conexion.php';
    if($_SERVER['REQUEST_METHOD'] && isset($_POST['ingresar'])){
        $errores= '';
        $correo= $conexion->real_escape_string($_POST['nombre-usuario']);
        $contrasenia= $conexion->real_escape_string($_POST['contraseña-usuario']);

        if(empty($correo) || empty($contrasenia)){
            $errores.= "<div class='alert alert-danger'>PORFAVOR,COMPLETAR LOS CAMPOS</div>";
        } else{
            $frase= $conexion->prepare("SELECT * FROM usuarios WHERE usuarios.email= ?");
            $frase->bind_param('s', $correo);
            $frase->execute();

            $usuario= $frase->get_result()->fetch_assoc();

            if($usuario){
                if(password_verify($contrasenia, ))

            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="login.php">
        <label for="nombre-usuario">Nombre de usuario</label>
        <input type="email" name="nombre-usuario" id="nombre-usuario">
        
        <label for="contraseña-usuario">contraseña</label>
        <input type="password" name="contraseña-usuario" id="contraseña-usuario">

        <input type="submit" value="ingresar" name="ingresar" id="ingresar">
    
    </form>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</body>
</html>