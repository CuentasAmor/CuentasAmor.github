<?php
include('conexion.php'); // Asegúrate de usar la ruta correcta

// Obtener todos los registros de Daniel
$sql_daniel = "SELECT * FROM transacciones_daniel";
$result_daniel = $conn->query($sql_daniel);

// Obtener la suma total de las cantidades de Daniel
$sql_suma_daniel = "SELECT SUM(cantidad) AS total_cantidad FROM transacciones_daniel";
$result_suma_daniel = $conn->query($sql_suma_daniel);
$total_daniel = $result_suma_daniel->fetch_assoc()['total_cantidad'];

// Obtener todos los registros de Mildred
$sql_mildred = "SELECT * FROM transacciones_mildred";
$result_mildred = $conn->query($sql_mildred);

// Obtener la suma total de las cantidades de Mildred
$sql_suma_mildred = "SELECT SUM(cantidad) AS total_cantidad FROM transacciones_mildred";
$result_suma_mildred = $conn->query($sql_suma_mildred);
$total_mildred = $result_suma_mildred->fetch_assoc()['total_cantidad'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuentas del AMOR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6a1b9a, #00bcd4); /* Fondo dividido entre morado y turquesa */
        }
        .container {
            margin-top: 50px;
        }
        .section-left {
            background: white;
            color: white;
            padding: 40px;
            border-radius: 8px;
            margin-top :20px;
            margin-bottom :20px;
        }
        .section-right {    
            background: white;    
            color: white;
            padding: 40px;
            border-radius: 8px;
            margin-top :20px;
            margin-bottom :20px;
        }
        h2{
            color:black;
        }
        h3{
            color :black;
        }
        h1{
        color:white;
        aling-center;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
         <li class="nav-item">
          <a class="nav-link" href="index.php">Prestamos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../gastos/index.php">Gastos</a>
        </li>       
      </ul>
    </div>
  </div>
</nav>
 <h1><center>PRESTAMOS</center></h1>
    <div class="container">
        <div class="row">
            <!-- Sección para Daniel (Lado Izquierdo) -->
            <div class="col-md-6">
                <div class="section-left">
                    <h2 class="text-center mb-4">Daniel</h2>
                    <!-- Mostrar los registros de Daniel -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Razón</th>
                                <th>Cantidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result_daniel->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['fecha']; ?></td>
                                    <td><?php echo $row['razon']; ?></td>
                                    <td><?php echo $row['cantidad']; ?></td>
                                    <td>
                                        <a href="eliminar.php?id=<?php echo $row['id']; ?>&tabla=daniel" class="btn btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <h3>Total Q: <?php echo number_format($total_daniel, 2); ?> </h3>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDaniel">Agregar Registro</button>
                </div>
            </div>

            <!-- Sección para Mildred (Lado Derecho) -->
            <div class="col-md-6">
                <div class="section-right">
                    <h2 class="text-center mb-4">Mildred</h2>
                    <!-- Mostrar los registros de Mildred -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Razón</th>
                                <th>Cantidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result_mildred->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['fecha']; ?></td>
                                    <td><?php echo $row['razon']; ?></td>
                                    <td><?php echo $row['cantidad']; ?></td>
                                    <td>
                                        <a href="eliminar.php?id=<?php echo $row['id']; ?>&tabla=mildred" class="btn btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <h3>Total Q: <?php echo number_format($total_mildred, 2); ?> </h3>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalMildred">Agregar Registro</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Daniel -->
    <div class="modal fade" id="modalDaniel" tabindex="-1" aria-labelledby="modalDanielLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDanielLabel">Nuevo Registro - Daniel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="guardar.php?tabla=daniel">
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" required>
                        </div>
                        <div class="mb-3">
                            <label for="razon" class="form-label">Razón</label>
                            <input type="text" class="form-control" id="razon" name="razon" required>
                        </div>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Mildred -->
    <div class="modal fade" id="modalMildred" tabindex="-1" aria-labelledby="modalMildredLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMildredLabel">Nuevo Registro - Mildred</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="guardar.php?tabla=mildred">
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" required>
                        </div>
                        <div class="mb-3">
                            <label for="razon" class="form-label">Razón</label>
                            <input type="text" class="form-control" id="razon" name="razon" required>
                        </div>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
