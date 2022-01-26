<?php

include("db.php");


if (isset($_POST['save_product'])){
    $nombre = $_POST['nombre'];
    $ref = $_POST['referencia'];
    $valor = $_POST['precio'];
    $peso = $_POST['peso'];
    $cat = $_POST['categoria'];
    $stock = $_POST['stock'];
    $fecha = $_POST['creacion'];
    
    
    $query = "INSERT INTO producto(nombre, referencia, precio, peso, categoria, stock) VALUES ('$nombre', '$ref', '$valor', '$peso', '$cat', '$stock')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("query failed");
    }
    
    $_SESSION['message'] = 'producto guardado exitosamente';
    $_SESSION['message_type'] = 'success';
    
    header("location: index.php");
}

?>