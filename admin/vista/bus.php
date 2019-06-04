<?php
    session_start();
    include '../../config/conexionDB.php';
    $correo_dest=$_SESSION['usu_correo'];
    $salida="";
    $query = "SELECT * FROM productos";
    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM productos";
    }
    $resultado = $conn->query($query);
    if ($resultado->num_rows>0) {
    	$salida.="<table>
    				<tr>
    					<th>Fecha</th>
    					<th>Emisor</th>
    					<th>Asunto</th>
                        <th></th>
    				</tr>";
    	while ($row = $resultado->fetch_assoc()) {
    		$salida.="<tr>
    					<td>".$row['correo_fecha_creacion']."</td>
    					<td>".$row['correo_emisor']."</td>
    					<td>".$row['correo_asunto']."</td>
                        <td><a href='cargar_correo.php?codigo=".$row['correo_codigo']."'>Leer</a></td>
    				</tr>";
    	}
    	$salida.="</table>";
    }else{
    	$salida.="<table>
                    <tr>
    					<th>Fecha</th>
    					<th>Emisor</th>
    					<th>Asunto</th>
    				</tr>
                    <tr><td colspan='7'> No se encontraron resultados </td></tr>
                  </table>";
    }
    echo $salida;
    $conn->close();
?>