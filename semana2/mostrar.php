<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Topicos Avanzados de Programación - Modulo Mostrar</title>
</head>
<body class="container mt-4">
    <h2 class="text-center mb-4">Lista de Datos</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Teléfono</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'conexion.php';
                $query = "SELECT * FROM datos";
                $resultado = mysqli_query($conexion, $query);
                
                if (mysqli_num_rows($resultado) > 0) {
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>" . $fila['id'] . "</td>";
                        echo "<td>" . $fila['nombre'] . "</td>";
                        echo "<td>" . $fila['edad'] . "</td>";
                        echo "<td>" . $fila['telefono'] . "</td>";
                        echo "<td class='text-center'>
                                <a href='editar.php?id=" . $fila['id'] . "' class='btn btn-warning btn-sm'>
                                    <i class='bi bi-pencil-square'></i> Editar
                                </a>
                              </td>";
                        echo "<td class='text-center'>
                                <a href='eliminar.php?id=" . $fila['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de eliminar este registro?\");'>
                                    <i class='bi bi-trash'></i> Eliminar
                                </a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No hay datos disponibles</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
