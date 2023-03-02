<?php
session_start();
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>

    <form action="php/ControlLogin.php" method= "post" enctype="multipart/form-data">
    <div class="container">
    <h1 class="display-2 fw-bold text-center mt-5 text-primary">No vendo un libro.com</h1>
    <h1 class="mb-3 mt-2 bg-light text-center m-4 p-3">Login</h1>
    <h2 class="mb-3 mt-2 bg-dark text-white text-center m-4 p-3">Rellene los campos para entrar.</h2>
    
            <div class="mb-3">
                <label for="nombre" class="form-label"><b>Nombre Usuario</b></label>
                <input type="text" class="form-control" placeholder="Introduzca nombre de usuario" name="nombre" id="nombre" required>
            </div>

            <div class="mb-3">
                <label for="psw" class="form-label"><b>Password</b></label>
                <input type="password" class="form-control" placeholder="Enter Password" name="psw" id="psw" required>
            </div>

            <span class="error"><?php if (isset($_SESSION['error_login'])){ echo $_SESSION['error_login'] ;};?></span>


<div class="container text-center mt-5">
            <p>¿Aún no estás registrado? <a href="php/registro.php">Regístrate</a>.</p>
        </div>
      <div class="text-center align-middle">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </div>

       
    </form>

    </body>
</html>

