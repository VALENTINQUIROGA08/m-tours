<?php 


    require_once 'componentes/conexion.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ingresar'])){
        $errores = '';
        $correo = $conexion->real_escape_string($_POST['nombre-usuario']);
        $contrasenia = $conexion->real_escape_string($_POST['contraseña-usuario']);

    if (empty($correo) || empty($contrasenia)) {
        $errores .= "<div class='alert alert-danger'>PORFAVOR,COMPLETAR LOS CAMPOS</div>";

    } else {
        $query=$conexion->prepare("SELECT * FROM Usuarios WHERE email= ?");
        $query->bind_param('s',$correo);
        $query->execute();

        if($query->get_result()->num_rows > 1){
            $errores.= "<div class='alert alert-danger'>el usuario ya existe</div>";
        }

        if(empty($errores)){
            $contra_hash=password_hash($contrasenia,PASSWORD_BCRYPT);

            $query=$conexion->prepare('INSERT INTO Usuarios(nombre,contraseña,email,telefono)VALUES(?,?,?,?)');
            $query->bind_param('ssss',$correo,$contra_hash);
            $sentencia = $query->execute();

            $query->close();
            $conexion->close();

            if($sentencia){
                $sucess= "<div class='alert alert-success'>usuario registrado correctamente</div>";
                header("location:index.php");
            }

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
        
        
        
        <label for="telefono">TELEFONO</label>
        <input type="" name="telefono" id="telefono">

        <label for="Nombre">nombre</label>
        <input type="Nombre" name="Nombre" id="Nombre">

        <input type="submit" value="ingresar" name="ingresar" id="ingresar">
    
    
    </form>
    <div>
        
    </div>
</body>
</html>