<?php
include 'conexion.php';
session_start();

$link = mysqli_connect($host, $user, $pass) or die("No puede conectarse");
mysqli_select_db($link, $dbname) or die("No se puede seleccionar la base de datos");



?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Retornar Libro</h2>
        
        
        <form action="PanelUsuario.php" method="post">
            <input type="submit" value="Retornar"/>
        </form>
        
    </body>
</html>


