<?php
include('conexion.php'); // Asegúrate de usar la ruta correcta

if (isset($_GET['id']) && isset($_GET['tabla'])) {
    $id = $_GET['id'];
    $tabla = $_GET['tabla'];

    if ($tabla == 'daniel') {
        $sql = "DELETE FROM transacciones_daniel WHERE id=$id";
    } elseif ($tabla == 'mildred') {
        $sql = "DELETE FROM transacciones_mildred WHERE id=$id";
    } else {
        echo "Tabla no válida";
        exit();
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
}
?>
