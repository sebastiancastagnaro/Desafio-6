<?php
session_start();

$usuarios = [
    ['usuario' => 'usuario1', 'password' => 'contraseña1', 'rol' => 'usuario'],
    ['usuario' => 'admin', 'password' => 'adminpass', 'rol' => 'admin']
];

function verificarCredenciales($usuario, $password) {
    global $usuarios;
    foreach ($usuarios as $u) {
        if ($u['usuario'] === $usuario && $u['password'] === $password) {
            return $u;
        }
    }
    return null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $usuarioEncontrado = verificarCredenciales($usuario, $password);

    if ($usuarioEncontrado) {
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
        <p

