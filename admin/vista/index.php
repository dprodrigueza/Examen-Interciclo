<<<<<<< HEAD
<!DOCTYPE html>
=======
<?php
session_start();
$codigoui = $_SESSION['cod'];
$nombresui = explode(" ", $_SESSION['nom']);
$apellidosui =  explode(" ", $_SESSION['ape']);
$correoui = $_SESSION['cor'];
$usurol = $_SESSION['rol'];
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: /Examen-Interciclo/public/vista/index.php");
	header("Location: /SistemaDeGestion/public/vista/login.html");
}
if ($usurol == 'user') {
?>
	<!DOCTYPE html>
>>>>>>> 89e8da55b8bcce18fe938e7ad09867e513dc99b5
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

	</body>

</html>

<<<<<<< HEAD
=======


<!--<?php
	/*} else {
		header("Location: ../../config/acceso.html");
	}*/
?>-->
>>>>>>> 89e8da55b8bcce18fe938e7ad09867e513dc99b5
