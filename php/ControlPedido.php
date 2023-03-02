<?php

include '../utilidades/bd.php';
function mostrarPedido(){
    $con = conexionBd();
    $usuario = $_SESSION['nombre'];
    $sql="SELECT * FROM `pedido` WHERE `usuario` = '$usuario'";
    $resultado = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($resultado) > 0) {
        echo "<table class='table table-dark table-striped text-center align-middle table-bordered'>";
        echo "<thead><th>ID</th><th>Título</th><th>Precio</th><th>Total</th><th>Usuario</th><th>Dirección</th><th>Fecha</th><th>Acción</th></thead>";
        echo "<tbody>";
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $nombreLibro = $fila['libros'];
            // Mostrar cada libro en una fila de la tabla
            echo "<tr>";
            echo "<td>" . $fila['id'] . "</td>";
            echo "<td>" . $fila['libros'] . "</td>";
            echo "<td>" . $fila['precio'] . "</td>";
            echo "<td>" . $fila['total'] . "</td>";
            echo "<td>" . $fila['usuario'] . "</td>";
            echo "<td>" . $fila['direccion'] . "</td>";
            echo "<td>" . $fila['fecha'] . "</td>";
            echo "<td><form method='post' action=''>";
            echo "<input type='hidden' name='id' value='" . $fila['id'] . "' />";
            echo "<input type='hidden' name='total' value='" . $fila['total'] . "' />";
            echo "<button type='submit' name='borrarpedido' class='btn btn-danger me-2'>Borrar artículo</button>";
            echo "<button type='submit' name='pagarpedido' class='btn btn-success'>Pagar artículo</button>";
            echo "</form></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p class='alert alert-warning text-center'>No se encontraron resultados</p>";   
     }
    


if (isset($_POST['borrarpedido'])) {
    $id = $_POST['id'];
    $sentencia = $con->prepare("DELETE FROM pedido WHERE `pedido`.`id` = ?");
    $sentencia->bind_param("i", $id);
    $sentencia->execute();

    header("Location: pedido.php");
        exit();
}

if (isset($_POST['pagarpedido'])) {
    $total = $_POST['total'];
    $usuario = $_SESSION['nombre'];
    $fechaActual = date('Y-m-d');
    $metodo_pago = "tarjeta";

    $con = conexionBd();
    $sentencia = $con->prepare("INSERT INTO pago (monto, fecha, usuario, metodo) VALUES (?, ?, ?, ?)");
    if($sentencia->execute([$total, $fechaActual, $usuario, $metodo_pago])){
        echo "<div class='alert alert-success text-center' role='alert'>El pago se ha realizado correctamente</div>";
    }

}

mysqli_close($con);
}