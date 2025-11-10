<?php 


    require_once 'componentes/conexion.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ingresar'])){
        $errores = '';
        $correo = $conexion->real_escape_string($_POST['nombre-usuario']);
        $contrasenia = $conexion->real_escape_string($_POST['contraseña-usuario']);

    if (empty($correo) || empty($contrasenia)) {
        $errores .= "<div class='alert alert-danger'>PORFAVOR,COMPLETAR LOS CAMPOS</div>";

    } else {
        $query=$conexion->prepare("SELECT * FROM usuarios WHERE email= ?");
        $query->bind_param('s',$correo);
        $query->execute();

        if($query->get_result()->num_rows > 1){
            $errores.= "<div class='alert alert-danger'>el usuario ya existe</div>";
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
    <form method="$_POST" action="registro.php">
        <?php require_once 'componentes/comp-form.php'; ?>
    </form>
    <div>
        <p>¿NO TIENES USUARIO?registrate aqui: <a href="registro.php">aqui</a></p>
    </div>
</body>
</html>