<?php
session_start();

// Simulación de la base de datos (puedes ajustar esto según tu entorno)
$usuarios = [
    ['usuario' => 'usuario1', 'password' => 'contraseña1', 'rol' => 'usuario'],
    ['usuario' => 'admin', 'password' => 'adminpass', 'rol' => 'admin']
];

// Función para verificar las credenciales del usuario
function verificarCredenciales($usuario, $password) {
    global $usuarios;
    foreach ($usuarios as $u) {
        if ($u['usuario'] === $usuario && $u['password'] === $password) {
            return $u;
        }
    }
    return null;
}

// Pantalla de login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Verificar si el usuario y la contraseña son correctos
    $usuarioEncontrado = verificarCredenciales($usuario, $password);

    if ($usuarioEncontrado) {
        // Iniciar sesión
        $_SESSION['usuario'] = $usuarioEncontrado;
        header('Location: vista_productos.php');
        exit;
    } else {
        $mensajeError = "Credenciales incorrectas. Intenta de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <?php if (isset($mensajeError)) : ?>
        <p style="color: red;"><?php echo $mensajeError; ?></p>
    <?php endif; ?>

    <form id="loginForm" action="" method="post">
        Usuario: <input type="text" name="usuario" required><br>
        Contraseña: <input type="password" name="password" required><br>
        <input type="submit" value="Iniciar Sesión">
    </form>

    <p>¿No tienes una cuenta? <a href="registro.php">Regístrate</a></p>

    <script>
        // Ejemplo de interactividad del lado del cliente con JavaScript
        document.getElementById('loginForm').addEventListener('submit', function (event) {
            event.preventDefault();
            // Puedes agregar lógica adicional aquí, como validación del lado del cliente antes de enviar el formulario.
            // Por ejemplo, puedes usar Fetch API para enviar datos al servidor sin recargar la página.
        });
    </script>
</body>
</html>
