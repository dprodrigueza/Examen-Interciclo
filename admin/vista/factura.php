<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Factura</title>
    <style type="text/css">
    body {
        background-image: url();
    }

    .Estilo9 {
        color: 1
    }

    .Estilo10 {
        font-size: 9px
    }

    .Estilo11 {
        font-weight: bold
    }
    </style>
</head>

<body>
<?php
        //session_start();
        $mail = $_GET["mail"];
        $codio =$_GET["codio"];
        //$producto =$_GET["producto"];
    ?>

    <header>
        <nav>
            <ul>
                <li> <a href="vista/comprar.php?mail=<?php echo "$mail"; ?>&codigo=<?php echo $codio;?>">Atras</a> </li>
            </ul>
        </nav>
    </header>
    <p align="center">&nbsp;</p>
    <table width="1069" height="325" border="1" bordercolor="#F0F0F0" bgcolor="#FFFFFF" action="com.php">
        
        <tr background="">
            <th width="800" height="39" bgcolor="#FFFFFF" scope="col">FACTURA</th>
        </tr>


        <tr>
            <th height="42" background="" bgcolor="#FFFFFF" scope="col">
                <table width="1067" height="1119" border="1" align="center" bordercolor="#F0F0F0">
                    <tr>
                        <td colspan="5" class="Estilo9">
                            <div align="center">PRODUCTOS</div>
                            <div align="left"></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="Estilo9">
                            <div align="center" class="Estilo11">
                                <table width="100%" border="1" align="center">
                                    <td>CANT.</td>
                                    <td>DESCRIPCION</td>
                                    <td>PRECIO UNITARIO</td>
                                    <td>IMPORTE</td>

                                    <?php
                                    $codio= $_GET['codio'];
                                    include '../config/conexionDB.php';
                                    $sql    = "SELECT * FROM pedidos WHERE cod_usuario = '$codio';";
                                    $result = $conn->query($sql);
                                    $sub2 = 0 ;
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $pro     = $row["pro_id"];
                                            $sql2    = "SELECT * FROM productos WHERE prod_id = '$pro';";
                                            $result2 = $conn->query($sql2);
                                            $rl      = mysqli_fetch_assoc($result2);
                                            $rlt = $rl["prod_caracteristica"];
                                            $rlt2 = $rl["prod_precio"];
                                            $rlt3 = $row["ped_cantidad"];
                                            $stock = $rl["prod_stock"];

                                            //$stock2 = $stock-$rtl;

                                            //$sql2 = "UPDATE  productos set prod_stock = '$stock';";
                                            $importe = $rlt2*$rlt3;

                                            echo "<tr>";
                                            echo "<td>" . $rlt3 ."</td>";
                                            echo "<td>" . $rlt . "</td>";
                                            echo "<td>" . $rlt2 . "</td>";
                                            echo "<td>" . $importe . "</td>";
                                            
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr>";
                                        echo " <td colspan='4'> No existen Mensajes Recibidos</td>";
                                        echo "</tr>";
                                    }
                                    
                                    $conn->close();
                                    ?>
                                    
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td height="62" colspan="2" class="Estilo9">
                            <table width="481" height="278" border="1" align="right">
                                <tr>
                                    <td>
                                        <div align="left">Subtotal</div>
                                    </td>
                                    <?php
                                    include '../config/conexionDB.php';
                                    $sql    = "SELECT * FROM pedidos WHERE cod_usuario = '$codio';";
                                    $result = $conn->query($sql);
                                    $sub2 = 0 ;
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $pro     = $row["pro_id"];
                                            $sql2    = "SELECT * FROM productos WHERE prod_id = '$pro';";
                                            $result2 = $conn->query($sql2);
                                            $rl      = mysqli_fetch_assoc($result2);
                                            $rlt = $rl["prod_descripcion"];
                                            $rlt2 = $rl["prod_precio"];
                                            $rlt4 =  $rl["prod_precio"];
                                            $sub2 += $rlt4;
                                        }
                                    } else {
                                        echo "<tr>";
                                        echo " <td colspan='4'> No existen Mensajes Recibidos</td>";
                                        echo "</tr>";
                                    }
                                        echo "<tr>";
                                        echo "<td>" . $sub2 . "</td>";
                                        echo "</tr>";
                                        $conn->close();
                                    ?>

                                </tr>

                                <tr>
                                    <td>
                                        <div align="left">IVA %12</div>
                                    </td>

                                    <?php
                                    include '../config/conexionDB.php';
                                    $sql    = "SELECT * FROM pedidos WHERE cod_usuario = '$codio';";
                                    $result = $conn->query($sql);
                                    $sub2 = 0 ;
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $pro     = $row["pro_id"];
                                            $sql2    = "SELECT * FROM productos WHERE prod_id = '$pro';";
                                            $result2 = $conn->query($sql2);
                                            $rl      = mysqli_fetch_assoc($result2);
                                            $rlt = $rl["prod_descripcion"];
                                            $rlt2 = $rl["prod_precio"];
                                            $rlt4 = $rl["prod_precio"];
                                            $sub2 += $rlt4;
                                            $iva = ($sub2*12)/100;
                                        }
                                    } else {
                                        echo "<tr>";
                                        echo " <td colspan='4'> No existen Mensajes Recibidos</td>";
                                        echo "</tr>";
                                    }
                                    echo "<tr>";
                                    echo "<td>" . $iva . "</td>";
                                    echo "</tr>";
                                    $conn->close();
                                    ?>

                                </tr>
                                <tr>
                                    <td>
                                        <div align="left">Total</div>
                                    </td>
                                    <?php
                                    include '../config/conexionDB.php';
                                    $sql    = "SELECT * FROM pedidos WHERE cod_usuario = '$codio';";
                                    $result = $conn->query($sql);
                                    $sub2 = 0 ;
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $pro     = $row["pro_id"];
                                            $sql2    = "SELECT * FROM productos WHERE prod_id = '$pro';";
                                            $result2 = $conn->query($sql2);
                                            $rl      = mysqli_fetch_assoc($result2);
                                            $rlt = $rl["prod_descripcion"];
                                            $rlt2 = $rl["prod_precio"];
                                            $rlt4 = $rl["prod_precio"];
                                            $sub2 += $rlt4;
                                            $iva = ($sub2*12)/100;
                                        }
                                    }else{
                                        echo "<tr>";
                                        echo " <td colspan='4'> No existen Mensajes Recibidos</td>";
                                        echo "</tr>";
                                    }
                                    $total = $sub2 + $iva;
                                    echo "<tr>";
                                    echo "<td>" . $total . "</td>";
                                    echo "</tr>";
                                    $conn->close();
                                    ?>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </th>
            <div>
            <button type="button" class="btn btn-default"><a href="com.php">RealizarR</a></button>

            
            <input class="btn" id="borrar" name="borrar" type="Reset" value="Borrar">
        </div>
        </tr>
        


    </table>   
<body>
</html>