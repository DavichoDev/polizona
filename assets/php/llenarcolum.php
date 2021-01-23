<?php
    $hostname_localhost ="68.70.164.26";
    $database_localhost ="polizona_130";
    $username_localhost ="polizona_130";
    $password_localhost ="Cien+30=130";
    
    $tabla = $_POST["tabla"];
    $conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
    $consulta="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '".$tabla."';";
    $resultado=mysqli_query($conexion,$consulta);
    if($conexion){
        while($registro=mysqli_fetch_array($resultado)){
            echo '<option value="'.$registro[0].'">'.$registro[0].'</option>';
        }
        json_encode($json);
        mysqli_close($conexion);
    }
    else{
        echo "error";
    }    
?>