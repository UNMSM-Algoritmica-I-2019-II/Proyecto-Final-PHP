<?php
include 'conexion.php';
session_start();

$link = mysqli_connect($host, $user, $pass) or die("No puede conectarse");
mysqli_select_db($link, $dbname) or die("No se puede seleccionar la base de datos");

if (isset($_POST['username']) and isset($_POST['password']) and isset($_POST['cpassword'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['cpassword'] = $cpassword;

    if ($password == $cpassword) {
        $insert = "INSERT INTO usuario (ID_Username, Password) VALUES ('$username', '$password')";
        $result = mysqli_query($link, $insert) or die(mysqli_error($link));
        if ($result == false) {
            echo "La consulta falló";
            exit();
        } else {
            header('Location: PanelUsuario.php');
        }
    } else {
        echo "Contraseñas diferentes";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Registro</title>
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
