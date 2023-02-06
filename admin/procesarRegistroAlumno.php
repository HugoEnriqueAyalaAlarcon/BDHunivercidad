<?php
    if(isset($_POST["nombre"])){
        $conexion= new mysqli("localhost", "root", "","huniversidad");
        if(!$conexion){
            echo "No se establecio la conexion";
        };
        //variables
        $nombre=$_POST["nombre"];
        $usuario="hun$nombre";
        $passwd="hun$nombre";
        $apellido=$_POST["apellido"];
        $carnet=$_POST["carnet"];
        $nacimiento=$_POST["nacimiento"];
        $carrera=$_POST["carrera"];
        $grupo=$_POST["grupo"];
        $materia=$_POST["materia"];
  
       
    
        $query = "INSERT INTO `alumno`(`usuario`, `passwd`, `nombre`, `apellido`, `grupo`, `materia`, `carnet`, `nacimiento`, `carrera`)
         VALUES ('$usuario' ,'$passwd' ,'$nombre','$apellido','$grupo','$materia','$carnet','$nacimiento','$carrera')";
        $resultado = $conexion -> query($query);
        if($resultado){
            echo "<script> alert('Se an guadado los cambios'); window.history.go(-1);</script>";
        }else{
      
            echo "<script> alert('No se han guardado los cambios'); window.history.go(-1);</script>";
        }
    }
    ?>
