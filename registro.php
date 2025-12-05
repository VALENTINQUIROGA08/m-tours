<?php 


    require_once 'componentes/conexion.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ingresar'])){
        $errores = '';
        $nombre = $conexion->real_escape_string($_POST['Nombre']);
        $correo = $conexion->real_escape_string($_POST['nombre-usuario']);
        $contrasenia = $conexion->real_escape_string($_POST['contraseña-usuario']);
        $telefono = $conexion->real_escape_string($_POST['telefono']);

    if (empty($correo) || empty($contrasenia)) {
        $errores .= "<div class='alert alert-danger'>PORFAVOR,COMPLETAR LOS CAMPOS</div>";

    } else {
        $query=$conexion->prepare("SELECT * FROM Usuarios WHERE Usuarios.email= ?");
        $query->bind_param('s', $correo);
        $query->execute();

        if($query->get_result()->num_rows > 1){
            $errores.= "<div class='alert alert-danger'>el usuario ya existe</div>";
        }

        echo $errores;

        if(empty($errores)){
            $contra_hash = password_hash($contrasenia, PASSWORD_BCRYPT);

            $query=$conexion->prepare('INSERT INTO Usuarios (nombre, contraseña, email, telefono) VALUES(?,?,?,?)');
            $query->bind_param('ssss', $nombre, $contra_hash, $correo, $telefono);
            $sentencia = $query->execute();



            $query->close();
            $conexion->close();

            if($sentencia){
                $sucess= "<div class='alert alert-success'>usuario registrado correctamente</div>";
                header("Location:index.php");
            }

    } 
}
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index3.css">
    <title>Iniciar Sesión</title>


   
</head>

<body>
    <div class="contenedor">
        <h2>Iniciar sesión</h2>

        <form method="POST" action="registro.php">

        
            <input type="email" class="input-field" placeholder="Email">

            <input type="password" class="input-field" placeholder="Contraseña">

            <input type="text" class="input-field" placeholder="Telefono">

            <input type="text" class="input-field" placeholder="Nombre">

            <button id="ingresar">Ingresar</button>
        </form>
    
    </div>
</body>
</html>