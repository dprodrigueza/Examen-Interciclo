<?php
session_start();
$codigoui = $_SESSION['cod'];
$nombresui = explode(" ", $_SESSION['nom']);
$apellidosui =  explode(" ", $_SESSION['ape']);
$correoui = $_SESSION['cor'];
$usurol = $_SESSION['rol'];
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: /SistemaDeGestion/public/vista/login.html");
}
if ($usurol == 'user'){
	?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8" />
		<title>Home</title>

	</head>

	<body>
		<?php  
		include '../../../config/conexionDB.php'

		?>

    	<h1>ADMIN</h1>
    	<h1>ADMIN</h1>

	</body>

	</html>

<?php
} else {
	header("Location: ../../config/acceso.html");
}
?>