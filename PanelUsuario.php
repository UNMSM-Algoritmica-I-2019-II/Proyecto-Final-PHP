<?php
include 'conexion.php'; 
session_start();  
$username = $_SESSION['username'];
?> 

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h2>Panel de Usuario</h2>
        <form action="BuscarLibro.php" method="post">
            <input type="submit" value="Buscar Libro"/>
        </form>

        <form action="RetornarLibro.php" method="post">
            <input type="submit" value="Retornar Libro"/>
        </form>

        <form action="Login.php" method="post">
            <input type="submit" value="Cerrar Sesión"/>
        </form>
    </body>
</html>


