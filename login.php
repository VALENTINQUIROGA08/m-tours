<?php


require_once 'componentes/conexion.php';
if ($_SERVER['REQUEST_METHOD'] && isset($_POST['ingresar'])) {
    $errores = '';
    $correo = $conexion->real_escape_string($_POST['nombre-usuario']);
    $contrasenia = $conexion->real_escape_string($_POST['contraseña-usuario']);

    if (empty($correo) || empty($contrasenia)) {
        $errores .= "<div class='alert alert-danger'>PORFAVOR,COMPLETAR LOS CAMPOS</div>";
    } else {
        $frase = $conexion->prepare("SELECT * FROM usuarios WHERE usuarios.email= ?");
        $frase->bind_param('s', $correo);
        $frase->execute();

        $usuario = $frase->get_result()->fetch_assoc();

        if ($usuario) {
            if (password_verify($contrasenia, $usuario['contrasenia'])) {
                session_start();
                $_session["userid"] = $usuario['id_usuario'];
                $_session["rol"] = $usuario['rol'];
                $_SESSION['nombre'] = $usuario['nombre'];

                $conexion->close();

                header('location:index.php');
                exit();
            } else {
                $errores .= "<div class='alert alert-danger'>email o contraseña incorrecta</div";
            }
        } else {
            $errores .= "<div class='alert alert-danger'>el usuario no existe</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="login.php">

        <?php require_once 'componentes/comp-form.php'; ?>
        
        <input type="submit" value="ingresar" name="ingresar" id="ingresar">
    </form>

    <div>
        <p>¿NO TIENES USUARIO?registrate aqui: <a href="registro.php">aqui</a></p>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>