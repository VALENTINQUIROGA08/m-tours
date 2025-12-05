<?php


require_once 'componentes/conexion.php';
if ($_SERVER['REQUEST_METHOD'] && isset($_POST['ingresar'])) {
    $errores = '';
    $correo = $conexion->real_escape_string($_POST['nombre-usuario']);
    $contrasenia = $conexion->real_escape_string($_POST['contraseña-usuario']);

    if (empty($correo) || empty($contrasenia)) {
        $errores .= "<div class='alert alert-danger'>PORFAVOR,COMPLETAR LOS CAMPOS</div>";
    } else {
        $frase = $conexion->prepare("SELECT * FROM Usuarios WHERE Usuarios.email= ?");
        $frase->bind_param('s', $correo);
        $frase->execute();

        $usuario = $frase->get_result()->fetch_assoc();

        if ($usuario) {
            if (password_verify($contrasenia, $usuario['contraseña'])) {
                session_start();
                $_SESSION["userid"] = $usuario['id_usuario'];
                $_SESSION["rol"] = $usuario['rol'];
                $_SESSION['nombre'] = $usuario['nombre'];

                $conexion->close();

                header('Location:index.php');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="index2.css">
    <title>Document</title>

    <style>
        .login-card {
            max-width: 400px;
            margin: auto;
            margin-top: 60px;
            padding: 30px;
            border-radius: 15px;
            background-color: #02273bff;
            color:#a2907d ;
            
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="login-card">
            <h2 class="text-center mb-4">Iniciar Sesión</h2>
            <form method="POST" action="login.php">
                <?php require_once 'componentes/comp-form.php'; ?>

                <div class="text-center mt-3">
                    <input type="submit" value="Ingresar" name="ingresar" id="ingresar" class="btn btn-primary w-100">
                </div>
            </form>
            

            <div class="text-center mt-4">
                <p>¿NO TIENES USUARIO? Regístrate <a href="registro.php">aquí</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</body>

</html>
