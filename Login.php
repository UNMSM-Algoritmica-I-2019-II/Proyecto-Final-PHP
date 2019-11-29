<?php
include 'conexion.php';
session_start();

if (isset($_POST['username']) and isset($_POST['password'])) { //check null
    $username = $_POST['username']; // text field for username
    $password = $_POST['password']; // text field for password
// Guarda datos de sesion
    $_SESSION['username'] = $username;
    // Conecta a la BBDD
    $link = mysqli_connect($host, $user, $pass) or die("No puede conectarse");
    mysqli_select_db($link, $dbname) or die("No se puede seleccionar la base de datos");

    // Consulta sql
    $query = "Select ID_Username From usuario Where ID_Username = '$username' AND Password = '$password'";
    // Verifica la consulta sql
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    if ($result == false) {
        echo "La consulta falló";
        exit();
    }
    // Si encontro un match, redirige al PanelUsuario.php
    if (mysqli_num_rows($result) == 1) {
        header('Location: PanelUsuario.php');
    } else {
        $err = "ERROR: Usuario o Contraseña incorrecto";
    }
    // Muestra el mensaje de error
    echo "$err";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Iniciar Sesión Biblioteca FISI</title>
    </head>
    <body>
        <form action="" method="post" class="loginform">
            <h1>Sistema de Biblioteca FISI</h1>
            
            <div class="txtb">
                <input type="text" name="username" required>
                <span data-placeholder="Usuario"></span>
            </div>
            
            <div class="txtb">
                <input type="text" name="password" required>
                <span data-placeholder="Contraseña"></span>
            </div>

            <input type="Submit" class="logbtn" value="Iniciar Sesión"/>
            
            <div class="bottom-text">
                Registrese <a href="NuevoRegistro.php">Clic Aquí</a>
            </div>
        </form>
    </body>
</html>
