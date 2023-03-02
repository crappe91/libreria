
<?php
include '../utilidades/bd.php';

//MOSTRAMOS EL CATÁLOGO DE LIBROS EN EL INDEX 
function mostrarCatalogo(){
    $con = conexionBd();
    $sql="SELECT * FROM libro";
    $resultado = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($resultado) > 0) {
        echo "<table class='table table-dark table-striped text-center align-middle table-bordered rounded'>";
        echo "<thead><tr><th>ID</th><th>Título</th><th>Autor</th><th>Editorial</th><th>Fecha de publicación</th><th>Género</th><th>Precio</th><th>Imagen</th><th>Descripción</th><th>Acciones</th></tr></thead>";
        echo "<tbody>";
        while ($fila = mysqli_fetch_assoc($resultado)) {
            // Mostrar cada libro en una fila de la tabla
            echo "<tr>";
            echo "<td>" . $fila['id'] . "</td>";
            echo "<td>" . $fila['titulo'] . "</td>";
            echo "<td>" . $fila['autor'] . "</td>";
            echo "<td>" . $fila['editorial'] . "</td>";
            echo "<td>" . $fila['fecha_publicacion'] . "</td>";
            echo "<td>" . $fila['genero'] . "</td>";
            echo "<td>" . $fila['precio'] . " €"."</td>";
            echo "<td><img src=" ."../img/" . $fila['imagen'] . ".png" ."></td>";
            echo "<td>" . $fila['descripcion'] . "</td>";
            echo "<td><form method='post' action=''>";
            echo "<input type='hidden' name='usuario' value='<?php echo ".$_SESSION['nombre']." ?>' />";
            echo "<input type='hidden' name='id' value='" . $fila['id'] . "' />";
            echo "<input type='hidden' name='precio' value='" . $fila['precio'] . "' />";
            echo "<input type='hidden' name='titulo' value='" . $fila['titulo'] . "' />";
            echo "<button class='btn btn-primary' name='aniadirAcarrito'>Añadir al carrito</button>"; 
            echo "</form></td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p class='alert alert-warning text-center'>No se encontraron resultados</p>";   
    }
    

// Agregar libro a la lista de compras
if (isset($_POST['aniadirAcarrito'])) {
    $fechaActual = date('Y-m-d');
    $usuario = $_SESSION['nombre'];
    $nombreLibro = $_POST['titulo'];
    $precio = $_POST['precio'];
    $sentencia = $con->prepare("SELECT * FROM carrito WHERE libros = ? AND usuario = ?");
    $sentencia->bind_param("ss", $nombreLibro, $usuario);
    $sentencia->execute();
    $resultado = $sentencia->get_result();

    if (mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $id = $fila['id'];
        $total = $fila['total'] + $precio;

        $sentencia = $con->prepare("UPDATE carrito SET total = ? WHERE id = ?");
        $sentencia->bind_param("ii", $total, $id);
        $sentencia->execute();
    } else {
        $sentencia = $con->prepare("INSERT INTO carrito(libros, total, usuario, fecha_pedido) VALUES (?, ?, ?, ?)");
        $sentencia->execute([$nombreLibro, $precio, $usuario, $fechaActual]);
    }
}

mysqli_close($con);
}

?>