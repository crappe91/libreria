
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<?php
session_start();
?>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
    </head>
    <body>
<form action="controlRegistro.php" method= "post" enctype="multipart/form-data">
  <div class="container">
    <h1 class="display-2 fw-bold text-center mt-5 text-primary">No vendo un libro.com</h1>
    <h1 class="mb-3 mt-2 bg-light text-center m-4 p-3">Registro de usuario</h1>
    <h2 class="mb-3 mt-2 bg-dark text-white text-center m-4 p-3">Rellene los campos para realizar el registro.</h2>
    
<label for="nombre"><b>Nombre</b></label>
<input type="text" placeholder="Introduzca nombre" name="nombre" id="nombre" required class="form-control">
<span class="error"> <?php if (isset($_SESSION['error_nombre'])){ echo $_SESSION['error_nombre'];};?></span>


<label for="email"><b>Email</b></label>
<input type="text" placeholder="Introduzca email" name="email" id="email" required class="form-control">
<span class="error"> <?php if (isset($_SESSION['error_email'])){ echo $_SESSION['error_email'];};?></span>

<label for="psw"><b>Password</b></label>
<input type="password" placeholder="Introduzca Password" name="psw" id="psw" class="form-control">
<span class="error"> <?php if (isset($_SESSION['error_psw'])){ echo $_SESSION['error_psw'];};?></span>

<label for="psw-repeat"><b>Repeat Password</b></label>
<input type="password" placeholder="Repita Password" name="psw2" id="psw2" class="form-control">
<span class="error"> <?php if (isset($_SESSION['error_psw2'])){ echo $_SESSION['error_psw2'];};?></span>

<label for="direccion"><b>Dirección</b></label>
<input type="text" placeholder="Introduzca dirección" name="direccion" id="direccion" required class="form-control">
 <span class="error"> <?php if (isset($_SESSION['error_direccion'])){ echo $_SESSION['error_direccion'];};?></span>

<div class="container mt-3 text-center">
    <p>¿Tienes ya una cuenta? <a href="../login.php">Login</a>.</p>
  </div>
<div class="text-center align-middle">
<button type="submit" class="btn btn-primary">Registrame</button>
            </div>

  
  
</form>
</body>
</html>
