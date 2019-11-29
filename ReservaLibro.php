<?php
include 'conexion.php';
session_start();
$username = $_SESSION['username'];

$link = mysqli_connect($host, $user, $pass) or die("No puede conectarse");
mysqli_select_db($link, $dbname) or die("No se puede seleccionar la base de datos");

$idlibro = $_REQUEST['idlibro'];
//echo $idlibro;



//echo $today;
//echo $plus;
//echo $estimate;

$query = "Select * From libro Where Id_ISBN = '$idlibro'";

$result = mysqli_query($link, $query) or die(mysqli_error($link));
    if ($result == false) {
        echo "La consulta falló";
        exit();
    }
$row = mysqli_fetch_array($result);
//echo "Los datos del libro son: \n -ID: " . $row['ID_ISBN']." \n -NOMBRE: ".$row['Titulo']." \n -Autor: ".$row['Autor'];


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h2>Confirmacion de Libro</h2>
        <form action="LibroConfirmado.php" method="post">
            <p>Datos del libro a reservar</p>
			<p>ISBN del libro: <?php echo $row['ID_ISBN'];?></p>
			<p>Nombre de libro: <?php echo $row['Titulo'];?></p>
			<p>Autor del libro: <?php echo $row['Autor'];?></p>
			<p>¿Está seguro de reservar el libro?</p>
			<input type="hidden" name="idlibro" value = "<?php echo $row['ID_ISBN'];?>" />
            <input type="Submit" value="Confirmar"/>
        </form>

        <form action="PanelUsuario.php" method="post">
            <input type="submit" value="Regresar"/>
        </form>
    </body>
</html>
