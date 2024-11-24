<?php
$servername = "sql5.freemysqlhosting.net";
$username = "sql5747075";
$password = "467Ff8ZIjB";
$dbname = "sql5747075"; // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
