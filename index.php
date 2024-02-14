<?php
//$_SERVER['REQUEST_URI'] === 'sesion.php';
session_start();

// Definir los nombres de usuario y las contraseñas
$usuarios = array(
    "administrador" => "asd",
    "cliente" => "123"
);

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST["nombre_usuario"];
    $contraseña = $_POST["contraseña"];
    
    // Verificar si el usuario y la contraseña son válidos
    if (isset($usuarios[$nombre_usuario]) && $usuarios[$nombre_usuario] == $contraseña) {
        // Iniciar sesión y redirigir al usuario adecuado
        $_SESSION["nombre_usuario"] = $nombre_usuario;
        if ($nombre_usuario == "administrador") {
            header("Location: admin.html");
            exit();
        } else {
            header("Location: cliente.html");
            exit();
        }
    } else {
        $mensaje_error = "Nombre de usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div id="contenedor">
        <div id="central">
            <div id="login">
                <h2 class="titulo">Iniciar sesión</h2>
                <?php if (isset($mensaje_error)) { ?>
                    <p class="error-message"><?php echo $mensaje_error; ?></p>
                <?php } ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="nombre_usuario">Nombre de usuario:</label>
                        <input type="text" id="nombre_usuario" name="nombre_usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="contraseña">Contraseña:</label>
                        <input type="password" id="contraseña" name="contraseña" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Iniciar sesión">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

