<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesListado.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<body class="yup">
    <div class="principal">
        <div class="barralateral">
            <div class="barraoculta">
                <i class="fa fa-times" aria-hidden="true"></i>
                <img src="https://pm1.aminoapps.com/8402/a81ad5903e36df22e838e3c27f17e95f09cd3cbar1-1070-1637v2_hq.jpg"
                    style="width: 100px;" alt=":(">
            </div>
            <ul>
                <li><a href="index.php"><label for="inicio">Inicio</label></a></li>
                <li><a href="registrarViajero.php"><label for="inicio">Registrar Viajeros</label></a></li>
                <li><a href="#"><label for="inicio">Visualizar Informe de Viajes</label></a></li>
                <li><a href="cerrar.php"><label for="inicio">Cerrar Sesión</label></a></li>
            </ul>
        </div>

        <form id="form2" name="form2" method="POST" action="listado.php">
            <div class="col-12 row">
                <table class="table">
                    <thead>
                        <tr class="filters">
                            <th>
                                Viajero
                                <select name="buscarViajero" class="form-control mt-2"
                                    style="border: #bababa 1px solid; color:#000000;">
                                    <?php if ($_POST["buscarViajero"] != '') { ?>
                                        <option value="<?php echo $_POST["buscarViajero"]; ?>"><?php echo $_POST["buscarViajero"]; ?>
                                        </option>
                                    <?php } ?>
                                    <option value="Todos">Todos</option>
                                    <?php

                                    $server = "localhost";
                                    $user = "root";
                                    $pass = "";
                                    $db = "agencia_viajes";
                                    $conn = mysqli_connect($server, $user, $pass, $db);

                                    if (!$conn) {
                                        die("La conexion fallo: " . mysqli_connect_error());
                                    } else {
                                        $sql = "SELECT * FROM viajero $filtro";
                                        $resultado = mysqli_query($conn, $sql);
                                        if ($resultado) {
                                            while ($row = $resultado->fetch_array()) {
                                                echo "<option value=" . 'primernombre' . " >" . $row['primernombre'] . "</option>";
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </th>
                        </tr>
                    </thead>
                </table>
                <input type="submit" class="btn btn-success" value="Ver">;
            </div>

            <?php
            if ($_POST["buscarViajero"] == 'Todos') {
                $filtro = '';
            } else {
                if ($_POST["buscarViajero"] !== 'Todos') {
                    $filtro = "WHERE primernombre = '" . $_POST["buscarViajero"];
                }
            }
            ?>
        </form>



        <table class="table table-sm table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Primer Nombre</th>
                    <th scope="col">Segundo Nombre</th>
                    <th scope="col">Primer Apellido</th>
                    <th scope="col">Segundo Apellido</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Correo Electrónico</th>
                    <th scope="col">Lugar a Visitar</th>
                    <th scope="col">Fecha Ida</th>
                    <th scope="col">Fecha Regreso</th>
                    <th scope="col">Mótivo</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <?php

            $server = "localhost";
            $user = "root";
            $pass = "";
            $db = "agencia_viajes";
            $conn = mysqli_connect($server, $user, $pass, $db);

            if (!$conn) {
                die("La conexion fallo: " . mysqli_connect_error());
            } else {
                $sql = "SELECT * FROM estudiantes $filtro";
                $resultado = mysqli_query($conn, $sql);
                if ($resultado) {
                    while ($row = $resultado->fetch_array()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['primernombre'] . "</td>";
                        echo "<td>" . $row['segundonombre'] . "</td>";
                        echo "<td>" . $row['primerapellido'] . "</td>";
                        echo "<td>" . $row['segundoapellido'] . "</td>";
                        echo "<td>" . $row['telefono'] . "</td>";
                        echo "<td>" . $row['telefonopadres'] . "</td>";
                        echo "<td>" . $row['jornada'] . "</td>";
                        echo "<td>" . $row['grado'] . "</td>";
                        echo "<td>" . $row['carrera'] . "</td>";
                        ?>
                        <td><a
                                href="editar.php?id=<?php echo $row['id']; ?>&primernombre=<?php echo urlencode($row['primernombre']); ?>&segundonombre=<?php echo urlencode($row['segundonombre']); ?>&tercernombre=<?php echo urlencode($row['tercernombre']); ?>&primerapellido=<?php echo urlencode($row['primerapellido']); ?>&segundoapellido=<?php echo urlencode($row['segundoapellido']); ?>&telefono=<?php echo urlencode($row['telefono']); ?>&telefonopadres=<?php echo urlencode($row['telefonopadres']); ?>&jornada=<?php echo urlencode($row['jornada']); ?>&grado=<?php echo urlencode($row['grado']); ?>&carrera=<?php echo urlencode($row['carrera']); ?>"><button
                                    type="button" class="btn btn-warning"><i class="bi bi-pencil"></button></i></button></a>
                            <a
                                href="delete.php?id=<?php echo $row['id']; ?>&primernombre=<?php echo urlencode($row['primernombre']); ?>&segundonombre=<?php echo urlencode($row['segundonombre']); ?>&tercernombre=<?php echo urlencode($row['tercernombre']); ?>&primerapellido=<?php echo urlencode($row['primerapellido']); ?>&segundoapellido=<?php echo urlencode($row['segundoapellido']); ?>&telefono=<?php echo urlencode($row['telefono']); ?>&telefonopadres=<?php echo urlencode($row['telefonopadres']); ?>&jornada=<?php echo urlencode($row['jornada']); ?>&grado=<?php echo urlencode($row['grado']); ?>&carrera=<?php echo urlencode($row['carrera']); ?>"><button
                                    type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
                        </td>
                        <?php
                        echo "</tr>";
                    }
                }
            }
            ?>
        </table>
    </div>

</body>

</html>
<?php
