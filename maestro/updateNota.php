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

$idAlumno=$_GET['idAlumno'];
$sql = "SELECT * FROM alumno WHERE idAlumno='$idAlumno'"; //selecciona datos de tabla productos
$result = mysqli_query($conexion, $sql); //guarda lo datos en result
?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Huniversidad Temixco</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="../login.css" />
  <link rel="stylesheet" href="../formularios.css" />
  <link rel="stylesheet" href="../tablas.css">
</head>

<body>
  <?php
  $registro = "maestro";
  $tabla = "maestro";
  ?>
  <div class="container-fluid">
    <div class="container-xxl" id="container-login">
      <div id="logo">
        <img width="250" src="../logo/logo.png" />
        <div class="cont-btn-login">
          <a class="btn-login" href="./maestro.php?registro=alumno&tabla=''">INGRESAR ALUMNO</a>
          <a class="btn-login" href="./maestro.php?registro=notas&tabla=''">NOTAS DE ALUMNO</a>
          <a class="btn-login" href="../salir/salir.php">SALIR</a>
        </div>
      </div>
      <div id="login">

      <!---**********************Tabla notas de los alumno ********************* -->

          <div id="contenedor-tabla">
            <table class="tabla bordered">
              <thead class="thead">
                <tr>
                  <th class="th">NOMBRE</th>
                  <th class="th">APELLIDO</th>
                  <th class="th">MAT</th>
                  <th class="th">QUI</th>
                  <th class="th">SOC</th>
                  <th class="th">BIO</th>
                  <th class="th">CAMBIAR NOTAS</th>
                </tr>
              </thead>
              <tbody class="tbody">
                <form action="procesarUpdateNota.php" method="post">
                <?php
                while ($row = $result->fetch_assoc()) {
                  $Matematicas=$row['Matematicas'];
                  $Quimica=$row['Quimica'];
                  $Sociales=$row['Sociales'];
                  $Biologia=$row['Biologia'];
                ?>
                  <tr class="tr">
                    <td class="td"><?php echo $row['nombre']; ?></td>
                    <td class="td"><?php echo $row['apellido']; ?></td>
                    <td class="td">
                      <?php echo  ($row['Matematicas'] < 101 && $row['Matematicas'] >0) ?
                        " <h6>Nota Anterior <br>$Matematicas <br> Ingresar Nueva Nota</h6>
                        <input type='text' require name='Matematicas' id='input-materia'/>": 
                          "<h6>Ingrsar Nota por favor</h6>
                          <input type='text' require name='Matematicas' id='input-materia'/>";
                      ?>
                    </td>
                    <td class="td">
                      <?php echo ($row['Quimica'] < 101 && $row['Quimica'] >0) ?
                        " <h6>Nota Anterior $Quimica <br> Ingresar Nueva Nota</h6>
                        <input type='text' require name='Quimica' id='input-materia'/>": 
                          "<h6>Ingrsar Nota por favor</h6>
                          <input type='text' require name='Quimica' id='input-materia'/>";
                        ?>
                    </td>
                    <td class="td">
                      <?php echo ($row['Sociales'] < 101 && $row['Sociales'] >0) ?
                        " <h6>Nota Anterior $Sociales <br> Ingresar Nueva Nota</h6>
                        <input type='text' require name='Sociales' id='input-materia'/>":                      
                          "<h6>Ingrsar Nota por favor</h6>
                          <input type='text' require name='Sociales' id='input-materia'/>";
                        ?>
                    </td>
                    <td class="td">
                      <?php echo ($row['Biologia'] < 101 && $row['Biologia'] >0) ?
                        " <h6>Nota Anterior $Biologia <br> Ingresar Nueva Nota</h6>
                        <input type='text' require name='Biologia' id='input-materia'/>":
                          "<h6>Ingrsar Nota por favor</h6>
                          <input type='text' require name='Biologia' id='input-materia'/>";
                        ?>
                    </td>
                    <td class="td"> 
                      <input type="hidden" value="<?php echo $row['idAlumno'];?>" name="idAlumno">
                      <input type="submit" id="cambiar-nota" value="🗹"/>
                   </td>
                  </tr>
                <?php
                }
                ?>
                </form>
              </tbody>
            </table>
          </div>

      <!---**********************Tabla notas de los alumno ********************* -->
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>