<?php
    session_start();
    $varsesion = $_SESSION['nombre'];
    if ($varsesion == null || $varsesion = '') {
      echo 'usted no tiene autorizacion';
      die();
    }
    $conexion = new mysqli("localhost", "root", "", "huniversidad");
    if (!$conexion) {
      echo "No se establecio la conexion";
    };

    $idAlumno=$_POST["idAlumno"];
    $sql = "SELECT * FROM alumno WHERE idAlumno='$idAlumno'"; 
    $resultado = mysqli_query($conexion, $sql);
    $row = $resultado->fetch_assoc();
    ($_POST['Matematicas'] < 101 && $_POST['Matematicas'] > 0) ?  
        $Matematicas=$_POST['Matematicas'] : 
        $Matematicas=$row['Matematicas'];
    ($_POST['Quimica'] < 101 && $_POST['Quimica'] > 0) ?  
        $Quimica=$_POST['Quimica'] : 
        $Quimica=$row['Quimica'];   
    ($_POST['Sociales'] < 101 && $_POST['Sociales'] > 0) ?  
        $Sociales=$_POST['Sociales'] : 
        $Sociales=$row['Sociales'];  
    ($_POST['Biologia'] < 101 && $_POST['Biologia'] > 0) ?  
        $Biologia=$_POST['Biologia'] : 
        $Biologia=$row['Biologia'];
 
    //actualizar los datos
    $actualizar="UPDATE `alumno` SET 
        `Matematicas`='$Matematicas', 
        `Quimica`='$Quimica', 
        `Sociales`='$Sociales', 
        `Biologia`='$Biologia'
        WHERE idAlumno='$idAlumno'";

    //aplicar conexion y actualizar
    $result = mysqli_query($conexion, $actualizar);
    //mensajes

    if($result){
        echo "<script>  window.history.go(-2);</script>";
    }else{
        echo "<script> alert('Ne se han guardado actualizado los cambios'); window.history.go(-1);</script>";
    }

?>