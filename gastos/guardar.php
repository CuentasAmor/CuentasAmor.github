<?php
include('conexion.php'); // Asegúrate de usar la ruta correcta

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $fecha = $_POST['fecha'];
    $razon = $_POST['razon'];
    $cantidad = $_POST['cantidad'];
    $tabla = $_GET['tabla']; // Obtenemos la tabla a través del parámetro

    // Asegurarnos de que la tabla sea válida
    if ($tabla == 'daniel') {
        $sql = "INSERT INTO transacciones_daniel1 (fecha, razon, cantidad) VALUES ('$fecha', '$razon', '$cantidad')";
    } elseif ($tabla == 'mildred') {
        $sql = "INSERT INTO transacciones_mildred2 (fecha, razon, cantidad) VALUES ('$fecha', '$razon', '$cantidad')";
    } else {
        echo "Tabla no válida";
        exit();
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
