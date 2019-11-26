<?php
include 'conexion.php'; 

session_start();  
$username = $_SESSION['username'];

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Buscar Libro</h2>
        
        <h2>Pedir Libro</h2>
        <form action="PanelUsuario.php" method="post">
            <input type="submit" value="Pedir Libro"/>
        </form>
    </body>
</html>