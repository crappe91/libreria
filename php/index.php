<?php
session_start();
include 'Controlindex.php';
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
            <h1 class="text-center m-4 p-3">Bienvenido<?php echo " " . $_SESSION['nombre']; ?></h1>
            <h2 class="text-center text-primary bg-light m-4 p-3">Catálogo de Libros</h2>
            
            <div class="d-flex justify-content-center mb-3">
                <a  class="btn btn-primary me-3" href="carrito.php">Carrito</a>
                <form action='../login.php'>
                <input type="submit" name="sesionDestroy" value="Cerrar sesion" class="btn btn-danger"/>
                <?php if (isset($_POST['sesionDestroy'])) {
                        session_destroy();
                        header("Location: ../login.php");
                    }
                ?>
            </form>
           
            </div>
            
                <div class="row">

            <?php mostrarCatalogo(); ?>
                </div>

        </div>
        
        <script src="../js/bootstrap.bundle.min.js"></script>
    </body>
</html>