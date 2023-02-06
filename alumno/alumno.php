<!--************************portal del maestro**********-->
<?php
session_start();
$varsesion = $_SESSION['nombre'];
if ($varsesion == null || $varsesion = '') {
    echo 'usted no tiene autorizacion';
  die();
}
?>
<?php
$conexion = new mysqli("localhost", "root", "", "huniversidad");
if (!$conexion) {
  echo "No se establecio la conexion";
};
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
          <a class="btn-login" href="./alumno.php?tabla=alumno">MIS DATOS</a>
          <a class="btn-login" href="./alumno.php?&tabla=notas">MIS NOTAS</a>
          <a class="btn-login" href="../salir/salir.php">SALIR</a>
        </div>
      </div>
      <div id="login">

    <!---**********************Tabla alumno ********************* -->
        <?php
        if ($_GET['tabla'] == 'alumno') {
        ?>
          <div id="contenedor-tabla">
            <table class="tabla bordered">
              <thead class="thead">
                <tr>
                    <th class="th">NOMBRE</th>
                    <th class="th">APELLIDO</th>
                    <th class="th">GRUPO</th>
                    <th class="th">CARNET</th>
                    <th class="th">NACIMIENTO</th>
                    <th class="th">CARRERA</th>
                </tr>
            </thead>
            <tbody class="tbody">
              <?php
      
              $varsesion= $_SESSION['nombre'];

              $query = "SELECT * FROM alumno WHERE nombre='$varsesion'";
              $resul = $conexion->query($query);
              $row = $resul->fetch_assoc()
              ?>


                <tr class="tr">
                    <td class="td"><?php echo $row['nombre']; ?></td>
                    <td class="td"><?php echo $row['apellido']; ?></td>
                    <td class="td"><?php echo $row['grupo']; ?></td>
                    <td class="td"><?php echo $row['carnet']; ?></td>
                    <td class="td"><?php echo $row['nacimiento']; ?></td>
                    <td class="td"><?php echo $row['carrera']; ?></td>
                  </tr>
              </tbody>
            </table>
          </div>


        <?php
        }
        ?>
     <!---**********************Tabla alumno ********************* -->
    <!---**********************Tabla notas de los alumno ********************* -->
        <?php
        if ($_GET['tabla'] == 'notas') {
        ?>
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
          
                </tr>
              </thead>
              <tbody class="tbody">
                <form action="updateNota.php" method="post">
                <?php
      
      $varsesion= $_SESSION['nombre'];

      $query = "SELECT * FROM alumno WHERE nombre='$varsesion'";
      $resul = $conexion->query($query);
      $row = $resul->fetch_assoc()
      ?>

                  <tr class="tr">
                    <td class="td"><?php echo $row['nombre']; ?></td>
                    <td class="td"><?php echo $row['apellido']; ?></td>
                    <td class="td">
                      <?php echo  ($row['Matematicas'] < 101 && $row['Matematicas'] >0) ?  
                        $row['Matematicas'] : 
                          "N/A";
                      ?>
                    </td>
                    <td class="td">
                      <?php echo ($row['Quimica'] < 101 && $row['Quimica'] >0) ?  
                         $row['Quimica'] : 
                          "N/A";
                        ?>
                    </td>
                    <td class="td">
                      <?php echo ($row['Sociales'] < 101 && $row['Sociales'] >0) ?  
                         $row['Sociales'] :
                          "N/A";
                        ?>
                    </td>
                    <td class="td">
                      <?php echo ($row['Biologia'] < 101 && $row['Biologia'] >0) ?  
                         $row['Biologia'] :
                          "N/A";
                        ?>
                    </td>
                  </tr>
   
                </form>
              </tbody>
            </table>
          </div>
        <?php
        }
        ?>
      <!---**********************Tabla notas de los alumno ********************* -->
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>