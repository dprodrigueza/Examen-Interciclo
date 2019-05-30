<?php
$codio= $_GET['codio'];
include '../config/conexionDB.php';
$sql    = "SELECT * FROM pedidos WHERE cod_usuario = '$codio';";
$result = $conn->query($sql);

$sub2 = 0 ;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        //echo $row["ped_id"];

        $pro     = $row["pro_id"];
        //$can = $row["ped_cantidad"];
        //$sub2 = $sub2 + $row["ped_cantidad"];
        
        //echo $pro;
        $sql2    = "SELECT * FROM productos WHERE prod_id = '$pro';";
        $result2 = $conn->query($sql2);
        $rl      = mysqli_fetch_assoc($result2);

        
        
        $rlt = $rl["prod_descripcion"];
        $rlt2 = $rl["prod_precio"];
        //$rlt4 = $can *$rl["prod_precio"];
        //$sub2 += $rlt4;
        //$iva = ($sub2*12)/100;
        echo "<tr>";
echo "<td>" . $rlt . "</td>";
echo "<td>" . $rlt2 . "</td>";

        
       

        echo "</tr>";
        
        
        
        //echo $rlt;
    }
} else {
    echo "<tr>";
    echo " <td colspan='4'> No existen Mensajes Recibidos</td>";
    echo "</tr>";
}
//$total = $sub2 + $iva;

$conn->close();

?>
