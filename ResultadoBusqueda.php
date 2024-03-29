<?php
include 'conexion.php';
session_start();
$username = $_SESSION['username'];

$link = mysqli_connect($host, $user, $pass) or die("No puede conectarse");
mysqli_select_db($link, $dbname) or die("No se puede seleccionar la base de datos");

// Busqueda por ISBN
if ($_POST['isbn'] != null) {
    $isbn = $_POST['isbn'];
    // SQL query
    $query1 = "Select ID_ISBN, Titulo, Autor From libro Where Id_ISBN like '%" . $isbn . "%' AND EnPrestamo = 0";
    // Realizar consulta en BBDD
    $result1 = mysqli_query($link, $query1) or die(mysqli_error($link));
    if ($result1 == false) {
        echo "La consulta por ISBN falló";
        exit();
    }
} elseif ($_POST['titulo'] != null) {
    $titulo = $_POST['titulo'];
    $query1 = "Select ID_ISBN, Titulo, Autor From libro Where Titulo like '%" . $titulo . "%' AND EnPrestamo = 0";
    $result1 = mysqli_query($link, $query1) or die(mysqli_error($link));
    if ($result1 == false) {
        echo "La consulta por Título falló";
        exit();
    }
} elseif ($_POST['autor'] != null) {
    $autor = $_POST['autor'];
    $query1 = "Select ID_ISBN, Titulo, Autor From libro Where Autor like '%" . $autor . "%' AND EnPrestamo = 0";
    $result1 = mysqli_query($link, $query1) or die(mysqli_error($link));
    if ($result1 == false) {
        echo "La consulta por Autor falló";
        exit();
    }
}
$numrow = mysqli_num_rows($result1);
if ($numrow == 0) {
    echo "Busqueda sin resultados";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <table>
            <tr>
                <th>ISBN</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Reserva</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                ?>
                <form action="ReservaLibro.php" method="post">
                    <tr>
                        <td><?php echo $row['ID_ISBN']; ?></td>
                        <td><?php echo $row['Titulo']; ?></td>
                        <td><?php echo $row['Autor']; ?></td>
                    <input type="hidden" name="idlibro" value = "<?php echo $row['ID_ISBN']; ?>" />
                    <td><input type="Submit" value="Reservar" /></td>
                </form>
            </tr>

        <?php } ?>


    </table>

    <form action="PanelUsuario.php" method="post">
        <input type="submit" value="Regresar"/>
    </form>
</body>
</html>