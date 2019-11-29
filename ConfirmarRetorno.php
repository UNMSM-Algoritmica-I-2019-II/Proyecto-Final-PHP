<?php
include 'conexion.php';
session_start();

$link = mysqli_connect($host, $user, $pass) or die("No puede conectarse");
mysqli_select_db($link, $dbname) or die("No se puede seleccionar la base de datos");

$username = $_SESSION['username'];

$idlibro = $_POST['idlibro'];

$query = "UPDATE prestamo SET Retornado = 1 where ID_ISBN = '$idlibro'";
    
        $result = mysqli_query ($link, $query) or die(mysqli_error($link));  
            if($result == false)
            {
                    echo "La consulta falló";
                    exit();
            } else {
				echo "se actualizo prestamo";
			}

$query2 = "UPDATE libro SET EnPrestamo = 0 where ID_ISBN = '$idlibro'";
$result2 = mysqli_query ($link, $query2) or die(mysqli_error($link));  
            if($result2 == false)
            {
                    echo "La consulta falló";
                    exit();
            } else {
				echo "se actualizo libro";
				$exito = "libro retornado con exito";
			}

			
			
//$query = "";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h2>Confirmacion de Retorno</h2>
        <p> <?php echo $exito; ?></p>

        <form action="PanelUsuario.php" method="post">
            <input type="submit" value="Regresar"/>
        </form>
    </body>
</html>