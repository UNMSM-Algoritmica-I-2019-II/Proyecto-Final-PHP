<?php
include 'conexion.php';
session_start();
$username = $_SESSION['username'];

$link = mysqli_connect($host, $user, $pass) or die("No puede conectarse");
mysqli_select_db($link, $dbname) or die("No se puede seleccionar la base de datos");

$idlibro = $_POST['idlibro'];
$today = date("Y-m-d");
$plus = strtotime("+5 day", time());
$estimate = date('Y-m-d', $plus);
//echo $idlibro;
//echo $username;

$query = "Insert into prestamo (ID_ISBN, ID_Username, FechaSalida, FechaRetorno) values ('$idlibro', '$username', '$today', '$estimate')";
    
        $result = mysqli_query ($link, $query) or die(mysqli_error($link));  
            if($result == false)
            {
                    //echo "La consulta falló";
                    exit();
            }
			else {
				$exito = "Se Reservo con exito";
			}
			
$query2 = "UPDATE libro SET EnPrestamo = 1 where ID_ISBN = '$idlibro'";
    
        $result2 = mysqli_query ($link, $query2) or die(mysqli_error($link));  
            if($result2 == false)
            {
                    echo "La consulta falló";
                    exit();
            }
			
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h2>Confirmacion de Libro</h2>
        <p> <?php echo $exito; ?></p>

        <form action="PanelUsuario.php" method="post">
            <input type="submit" value="Regresar"/>
        </form>
    </body>
</html>