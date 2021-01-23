<?php
    $hostname_localhost ="68.70.164.26";
    $database_localhost ="polizona_130";
    $username_localhost ="polizona_130";
    $password_localhost ="Cien+30=130";

    // $consulta= "select idempresa, count(*)/(select count(*) from embarque) as probabilidad from embarque where idempresa in(select distinct idempresa from embarque) group by idempresa";
    $consulta = $_POST["query1"];
    $conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
    $resultado=mysqli_query($conexion,$consulta);

    while($registro=mysqli_fetch_array($resultado)){
        $result["ID_EMPRESA"]=$registro['idempresa'];
        $result["Probabilidad"]=$registro['probabilidad'];
        $json['Clasificador'][]=$result;

        echo "<tr>";
        echo "<td>".$registro['idempresa']." </td>";
        echo "<td>".$registro['probabilidad']." </td>";
        echo "</tr>";
    }     
    mysqli_close($conexion);
?>