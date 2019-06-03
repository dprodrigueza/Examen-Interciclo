<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8" />
	<title>Home</title>
</head>

<body>
	<?php
	include '../../config/conexionDB.php'
	?>
	<h1>ADMIN</h1>
	<h1>ADMIN</h1>
	<a href="crear_producto.html">CREAR PRODUCTO</a>
	<a href="crear_sucursal.html">CREAR SUCURSAL</a>
	<a href="listar_productos.php">VER PRODUCTOS</a>
	<a href="listar_sucursal.php">VER SUCURSALES</a>
	<a href="listar_facturas.php">VER EN CAMINO</a>
	<a href="listar_pedidos.php">PEDIDOS FENALIZADOS</a>
</body>
<table style="width:100%" border>
	<tr>
		<th>FECHA</th>
		<th>USUARIO</th>
		<th>TOTAL PEDIDO</th>
		<th>....enviar...</th>
	</tr>
	<?php
	include '../../config/conexionDB.php';
	$sql = "SELECT * FROM facturacab where fac_estado='CONFIRMADO';";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			echo "<tr>";
			echo "   <td>" . $row["fcab_fecha"] . "</td>";
			$codigo = $row["cod_id"];
			$codigo2 = $row["fcab_id"];
			$sql2    = "SELECT * FROM usuarios WHERE usu_id = '$codigo';";
			$result2 = $conn->query($sql2);
			$rl      = mysqli_fetch_assoc($result2);
			$rlt = $rl["usu_nombre"];
			echo "   <td>" . $rlt . "</td>";
			echo "   <td>" . $row['fcab_total'] . "</td>";
			echo "   <td><a href='../../controladores/controlador_modificarfactura.php?codigo=$codigo2' >ENVIAR PEDIDO</a></td>";
			// echo "   <td ><a  href='modificar_sucursal.php?codigo=" . $row['suc_id'] . "'>MODIFICAR<a/></td>";
			echo "</tr>";
		}
	} else {
		echo "<tr>";
		echo " <td colspan='6'> No existe Usuarios </td>";
		echo "</tr>";
	}

	$conn->close();

	?>
</table>

</html>