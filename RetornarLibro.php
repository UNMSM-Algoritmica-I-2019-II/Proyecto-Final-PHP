<?php
include 'conexion.php';
session_start();

$link = mysqli_connect($host, $user, $pass) or die("No puede conectarse");
mysqli_select_db($link, $dbname) or die("No se puede seleccionar la base de datos");

$username = $_SESSION['username'];

$query = "Select * from prestamo where ID_Username = '$username' and Retornado = 0";

$result = mysqli_query ($link, $query) or die(mysqli_error($link));  
            if($result == false)
            {
                    //echo "La consulta falló";
                    exit();
            }
			else {
				$exito = "Se muestran libros sin retornar";
			}
$numrow = mysqli_num_rows($result);
if ($numrow == 0) {
    echo "Busqueda sin resultados";
}
/*$numrow = mysqli_num_rows($result);
if ($numrow == 0) {
    echo "Busqueda sin resultados";
}
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$cons = $cons."'".$row['ID_ISBN']."',";
			}
			$cons = $cons . "ps'"; 
			$query2 = "Select * from libro where ID_ISBN in (".$cons.") ";
			$result2 = mysqli_query ($link, $query2) or die(mysqli_error($link));  
            if($result2 == false)
            {
                    //echo "La consulta falló";
                    exit();
            }
			else {
				$exito2 = "Se muestran libros sin retornar";
			}
$numrow = mysqli_num_rows($result); */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Retornar Libro</h2>
		<table>
            <tr>
                <th>ISBN</th>
                <th>Usuario</th>
                <th>Fecha Salida</th>
				<th>Fecha Retorno</th>
				</tr>
                <?php
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { 
				?>
				<form action="ConfirmarRetorno.php" method="post">
				<tr>
				<td><?php echo $row['ID_ISBN']; ?></td>
                <td><?php echo $row['ID_Username']; ?></td>
                <td><?php echo $row['FechaSalida']; ?></td>
				<td><?php echo $row['FechaRetorno']; ?></td>
				<input type="hidden" name="idlibro" value = "<?php echo $row['ID_ISBN'];?>" />
				<td><input type="Submit" value="Retornar" /></td>
				</form>
				</tr>
                
				<?php } ?>
                
            
        </table>
        
        <form action="PanelUsuario.php" method="post">
            <input type="submit" value="Regresar al menu"/>
        </form>
        
    </body>
</html>

<?php 
?>


