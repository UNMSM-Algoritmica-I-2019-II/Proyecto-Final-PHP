<?php
include 'conexion.php';
session_start();
$username = $_SESSION['username'];

$link = mysqli_connect($host, $user, $pass) or die("No puede conectarse");
mysqli_select_db($link, $dbname) or die("No se puede seleccionar la base de datos");

$today = date("Y-m-d");
$plus = strtotime("+5 day", time());
$estimate = date('Y-m-d', $plus);

if ($_POST['id'] != null) {
    $isbn = $_POST['id'];
    // SQL query
    $query1 = "Select ID_ISBN From libro Where Id_ISBN = '$isbn' AND EnPrestamo = 0";
    // Realizar consulta en BBDD
    $result1 = mysqli_query($link, $query1) or die(mysqli_error($link));
    if ($result1 == false) {
        echo "La consulta falló";
        exit();
    }
    $row = mysqli_fetch_array($result1);
    if($row == 1) {
        // inserta en tabla prestamo
        $query2 = "Insert into prestamo (ID_ISBN, ID_Username, FechaSalida, FechaRetorno) values ('$isbn', $username, $today, $estimate)";
    
        $result2 = mysqli_query ($link, $query2) or die(mysqli_error($link));  
            if($result2 == false)
            {
                    echo "La consulta falló";
                    exit();
            }
        // actualiza tabla libro
        $query3 = "Update libro set EnPrestamo = 1 where ID_ISBN = '$isbn'";
        $result3 = mysqli_query ($link, $query3)  or die(mysqli_error($link));  
            if($result3 == false)
            {
                    echo "La consulta falló";
                    exit();
            }
    }
    }



?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div>
            <form action="" method="post">
                Ingresa ID ISBN
                <input type="text" name="id" required>
                <input type="submit" value="Pedir"/>
            </form>
            
            <form action="PanelUsuario.php" method="post">
                <input type="submit" value="Regresar"/>
            </form>

        </div>

        
    </body>
</html>