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
        <h2>Buscar Libro</h2>
        <form action="ResultadoBusqueda.php" method="post">
            <table>
                <tr>
                    <td>ISBN</td>
                    <td><input type="text" name="isbn"/></td>
                </tr>
                <tr>
                    <td>Título</td>
                    <td><input type="text" name="password"/></td>
                </tr>
                <tr>
                    <td>Autor</td>
                    <td><input type="text" name="autor"/></td>
                </tr>
            </table>
            <input type="Submit" value="Buscar"/>
        </form>

        <form action="PanelUsuario.php" method="post">
            <input type="submit" value="Regresar"/>
        </form>
    </body>
</html>