<?php
session_start();
include 'ControlPedido.php';
?>

<html>
<head>
  <title>NoEncuentroNiUnLibro.com</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1 class="text-center m-4 p-3">Pedido de <?php echo " " . $_SESSION['nombre']; ?></h1>
    <h2 class="text-center text-primary bg-light m-4 p-3">Datos Pedido</h2>
  <div class="d-flex justify-content-center mb-3">
    <a href="carrito.php" class="btn btn-primary mb-3">Volver</a>
    </div>
  
  <?php mostrarPedido() ?> 

  </div>
</body>
</html>




