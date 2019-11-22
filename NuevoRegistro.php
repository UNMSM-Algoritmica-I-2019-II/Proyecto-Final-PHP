<?php
include 'conexion.php';
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="" method="post">
        <table>
            <tr>
                <td>Usuario</td>
                <td><input type="text" name="username" required/></td>
            </tr>
            <tr>
                <td>Contraseña</td>
                <td><input type="text" name="password" required/></td>
            </tr>
            <tr>
                <td>Confirmar Contraseña</td>
                <td><input type="text" name="cpassword" required/></td>
            </tr>
        </table>
        <input type="Submit" value="Registrar"/>
    </form>
    <form action="Login.php" method="post">
        <input type="Submit" value="Regresar"/>
    </form>

</body>
</html>
