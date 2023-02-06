<?php
    session_destroy();//cerra seciones previas

    $usuario=$_POST["usuario"];
    $passwd=$_POST["passwd"];
    $tipo_usuario=$_POST["tipo_usuario"];
    

    //conectar ala BD
    $conexion = mysqli_connect("localhost","root","" ,"huniversidad");
    $consulta = "SELECT * FROM  $tipo_usuario WHERE usuario='$usuario' and passwd='$passwd'";
    $resultado = mysqli_query($conexion, $consulta);
  
    $fila = mysqli_num_rows($resultado);
    $mostrar = mysqli_fetch_array($resultado);

    if($fila>0){

        if($tipo_usuario=='admin'){
            session_start();
            $_SESSION['nombre'] =  $mostrar['nombre'];
            header("location:../admin/admin.php?registro=maestro");
        }
        if($tipo_usuario=='maestro'){
            session_start();
            $_SESSION['nombre'] =  $mostrar['nombre'];
            header("location:../maestro/maestro.php?registro=alumno");
        }
        if($tipo_usuario=='alumno'){
            session_start();
            $_SESSION['nombre'] =  $mostrar['nombre'];
            header("location:../alumno/alumno.php?tabla=alumno");
        }
        //header("location:../index.php");

    }
    else{
        echo "error";
        //header("location:../mensajes/erroAteuntificar.php");  
    };
    mysqli_free_result($resultado);
    mysqli_close($conexion);
?>