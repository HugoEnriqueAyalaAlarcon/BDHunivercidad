<!--************************portal del maestro**********-->
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
        <?php
        if ($_GET['registro'] == 'alumno') {
          $_GET['tabla'] = '';
        ?>
          <!---****************formulario para el ingreso de nuevos alumnos *************-->

          <a href="maestro.php?tabla=alumno&registro=''" class="button form-btn">Ver datos de alumno</a>
          <div id="contenedor-formulario">
            <form action="./procesarRegistroAlumno.php" method="post" id="form">
              <div class="">
                <label for="form-control" class="form-label">Nombre </label>
                <input type="text" required id="form-control" name="nombre" />
              </div>
              <div class="">
                <label for="form-control" class="form-label">Apellido </label>
                <input type="text" required id="form-control" name="apellido" />
              </div>
              <div class="">
                <label for="form-control" class="form-label">Carnet </label>
                <input type="text" required id="form-control" name="carnet" />
              </div>
              <div class="">
                <label for="form-control" class="form-label">Fecha de Nacimiento</label>
                <input type="text" required id="form-control" name="nacimiento" />
              </div>
              <div>
                <label for="form-control" class="form-label">Grupo </label>
                <select type="text" required id="form-control" name="grupo">
                  <option selected="Informatica">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>
              </div>
              <div class="">
                <label for="form-control" class="form-label">Materia </label>
                <select type="text" required id="form-control" name="materia" aria-label="Default select example">
                  <option selected="Matematias">Matematias</option>
                  <option value="Quimica">Quimica</option>
                  <option value="Sociales">Sociales</option>
                  <option value="Biologia">Biologia</option>
                </select>
              </div>

              <div class="">
                <label for="form-control" class="form-label">Carrera </label>
                <select type="text" required id="form-control" name="carrera">
                  <option selected="Informatica">Informatica</option>
                  <option value="Derecho">Derecho</option>
                  <option value="Robotica">Robotica</option>
              </div>
              <input type="submit" name="guardar" value="Guardar" class="button form-btn" />
            </form>
          </div>
        <?php
        }
        ?>
        <!---****************formulario para el ingreso de nuevos alumnos *************-->

        <!---****************formulario para el ingreso de nuevos alumnos *************-->
        <!---**********************Tabla alumno ********************* -->
        <?php
        if ($_GET['tabla'] == 'alumno') {
        ?>


          <a href="maestro.php?registro=alumno&tabla=''" class="button form-btn">Ingresar nuevo alumno</a>

          <div id="contenedor-tabla">
            <table class="tabla bordered">
              <thead class="thead">
                <tr>
                  <th class="th">USUARIO</th>
                  <th class="th">PASWWORD</th>
                  <th class="th">NOMBRE</th>
                  <th class="th">APELLIDO</th>
                  <th class="th">CARNET</th>
                  <th class="th">NACIMIENTO</th>
                  <th class="th">CARRERA</th>
                </tr>
              </thead>
              <tbody class="tbody">
                <?php
                $query = "SELECT * FROM alumno";
                $resul = $conexion->query($query);
                while ($row = $resul->fetch_assoc()) {
                ?>

                  <tr class="tr">
                    <td class="td"><?php echo $row['usuario']; ?></td>
                    <td class="td"><?php echo $row['passwd']; ?></td>
                    <td class="td"><?php echo $row['nombre']; ?></td>
                    <td class="td"><?php echo $row['apellido']; ?></td>
                    <td class="td"><?php echo $row['carnet']; ?></td>
                    <td class="td"><?php echo $row['nacimiento']; ?></td>
                    <td class="td"><?php echo $row['carrera']; ?></td>
                  </tr>

                <?php
                }
                ?>
              </tbody>
            </table>
          </div>


        <?php
        }
        ?>
        <!---**********************Tabla alumno ********************* -->
      <!---**********************Tabla notas de los alumno ********************* -->
        <?php
        if ($_GET['registro'] == 'notas') {
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
                  <th class="th">CAMBIAR NOTAS</th>
                </tr>
              </thead>
              <tbody class="tbody">
                <form action="updateNota.php" method="post">
                <?php
                $query = "SELECT * FROM alumno";
                $resul = $conexion->query($query);
                while ($row = $resul->fetch_assoc()) {
                $idAlumno=$row['idAlumno'];
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
                    <td class="td"> 
                      <a id="cambiar-nota" href="./updateNota.php?idAlumno=<?php echo $row['idAlumno'];?>"> 🗹 </a>
                   </td>
                  </tr>
                <?php
                }
                ?>
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