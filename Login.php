<?php
include 'conexion.php';
session_start();

if (isset($_POST['username']) and isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['username'] = $username; // Variable glogal 
    // Conexion a la DB
    $link = mysqli_connect($host, $user, $pass) or die("Falló la conexión");
    mysqli_select_db($link, $dbname) or die("Falló la conexión a la base de datos");

    // Query para usuarios
    $query = "SELECT ID.Username FROM usuario WHERE ID_Username = '$username' AND Password = '$password'";
    $result = mysqli_query($link, $query) or die(mysqli_errno($link));
    if ($result == false) {
        echo "La consulta falló";
        exit();
    }
    // Verificacion
    if (mysqli_num_rows($result) == 1) { // Hay un match
        header('Location: PanelUsuario.php');  
    } else {
        $error = "Usuario o Constraseña incorrecto";
    }
    echo "$error";
}
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
        </table>
        <input type="Submit" value="Iniciar Sesión"/>
    </form>
    <form action="NuevoRegistro.php" method="post">
        <input type="Submit" value="Crear Cuenta"/>
    </form>
</body>
</html>
