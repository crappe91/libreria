<?php
session_start();
include 'ControlCarrito.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>NoEncuentroNiUnLibro.com</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h1 class="text-center m-4 p-3 ">Carrito de <?php echo " " . $_SESSION['nombre']; ?></h1>
            <h2 class="text-center text-primary bg-light m-4 p-3">Artículos Seleccionados</h2>

            <div class="d-flex justify-content-center mb-3">
                <a class="btn btn-primary me-3" href="index.php">volver</a>
                <a class="btn btn-secondary" href="pedido.php">Ver pedidos</a>
            </div>

            <?php mostrarCarrito(); ?> 

        </div>
        
        <!-- JavaScript de Bootstrap -->
        <script src="../js/bootstrap.bundle.min.js"></script>
    </body>
</html>
