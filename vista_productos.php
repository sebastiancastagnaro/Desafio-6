<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

// Obtener información del usuario desde la sesión
$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Productos</title>
</head>
<body>
    <h2>Vista de Productos</h2>

    <p>Bienvenido, <?php echo $usuario['usuario']; ?>. Rol: <?php echo $usuario['rol']; ?></p>

    <!-- Aquí iría la presentación de los productos y cualquier otra información relevante -->

    <form action="logout.php" method="post">
        <input type="submit" value="Cerrar Sesión">
    </form>
</body>
</html>
