<?php
    if(isset($_POST["nombre"])){
        $conexion= new mysqli("localhost", "root", "","huniversidad");
        if(!$conexion){
            echo "No se establecio la conexion";
        };
        //nombre  apellido materia grupo usuario paswwd
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $materia=$_POST["materia"];
        $grupo=$_POST["grupo"];
        $usuario="hun$nombre";
        $passwd="hun$nombre";
    
        $query = "INSERT INTO `maestro` (`usuario`, `passwd`, `nombre`, `apellido`, `materia`, `grupo`)
         VALUES ('$usuario' ,'$passwd' ,'$nombre','$apellido','$materia','$grupo')";
        $resultado = $conexion -> query($query);
        if($resultado){
            echo "<script> alert('Se an guadado los cambios'); window.history.go(-1);</script>";
        }else{
      
            //echo "<script> alert('No se han guardado los cambios'); window.history.go(-1);</script>";
        }
    }   
?>
