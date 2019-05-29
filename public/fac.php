<?php
include '../config/conexionDB.php';
$sql    = "SELECT * FROM pedidos WHERE cod_usuario = '3';";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        //echo $row["ped_id"];
        $pro     = $row["pro_id"];
        //echo $pro;
        $sql2    = "SELECT * FROM productos WHERE prod_id = '$pro';";
        $result2 = $conn->query($sql2);
        $rl      = mysqli_fetch_assoc($result2);
        $rlt = $rl["prod_descripcion"];
        echo "<tr>";
        echo "   <td>" . $rlt . "</td>";
        echo "</tr>";
        //echo $rlt;
    }
} else {
    echo "<tr>";
    echo " <td colspan='4'> No existen Mensajes Recibidos</td>";
    echo "</tr>";
}
$conn->close();

?>