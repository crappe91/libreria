
<?php
include '../utilidades/bd.php';

//MOSTRAMOS EL CATÁLOGO DE LIBROS EN EL INDEX 
function mostrarCompra(){
    $con = conexionBd();
    $sql="SELECT * FROM pedido";
    $resultado = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($resultado) > 0) {
        echo "<table table-bordered>";
        echo "<tr><th>ID</th><th>Título</th><th>Precio</th><th>Total</th><th>Usuario</th><th>Dirección</th><th>Fecha</th></tr>";
        while ($fila = mysqli_fetch_assoc($resultado)) {
           // Mostrar cada libro en una fila de la tabla
        echo "<tr>";

        echo "<td>" . $fila['id'] . "</td>";
        echo "<td>" . $fila['libros'] . "</td>";
        echo "<td>" . $fila['precio'] . "</td>";
        echo "<td>" . $fila['total'] . "</td>";
        echo "<td>" . $fila['usuario'] . "</td>";
        echo "<td>" . $fila['direccion'] . "</td>";
        echo "<td>" . $fila['fecha'] . "</td>";
      
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron resultados";
}
}

function borrarCarrito(){
    $con= conexionBd();
    $id = $_POST['id'];
    $sentencia = $con->prepare("DELETE FROM carrito WHERE `usuario`.`id` = ?");
    $sentencia->bind_param("i", $id);

    $resultado = mysqli_query($con, $sentencia);
    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
        $sentencia->execute();
        }
    }

    header("Location: index.php");
        exit();
}

?>