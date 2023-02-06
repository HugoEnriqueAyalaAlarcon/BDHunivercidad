<!--************************portal del administrador**********-->
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
  <link rel="stylesheet" href="../login.css"/>
  <link rel="stylesheet" href="../formularios.css"/>
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
          <a class="btn-login" href="./admin.php?registro=maestro&tabla=''">MAESTRO</a>
          <a class="btn-login" href="./admin.php?registro=alumno&tabla=''">ALUMNO</a>
          <a class="btn-login" href="../salir/salir.php">SALIR</a>
        </div>
      </div>
      <div id="login">
        <?php
        if ($_GET['registro'] == 'maestro') {
          $_GET['tabla'] = '';
        ?>
      <!---****************formulario para el ingreso de nuevos maestros *************-->
          <a href="admin.php?tabla=maestro&registro=''"  class="button form-btn">Ver datos de maestros</a>
          <div id="contenedor-formulario">
          <form action="./procesarRegistroMaestro.php" method="post" id="form">
            <div class="">
              <label for="form-control" class="form-label">Nombre </label>
              <input type="text" required id="form-control" name="nombre" />
            </div>
            <div class="">
              <label for="form-control" class="form-label">Apellido </label>
              <input type="text" required id="form-control" name="apellido" />
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
              <label for="form-control" class="form-label">Grupo </label>
              <select type="text" required id="form-control" name="grupo" aria-label="Default select example">
                <option selected="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </div>
            <input type="submit" name="guardar" value="Guardar" class="button form-btn" />
          </form>
          </div>

        <?php
        }
        ?>
      <!---****************formulario para el ingreso de nuevos maestros *************-->
        <?php
        if ($_GET['tabla'] == 'maestro') {
        ?>
      <!---**********************Tabla maestros ********************* -->

          <a href="admin.php?registro=maestro&tabla=''" class="button form-btn">Ingresar nuevo maestro</a>
          <div id="contenedor-tabla">
            <table class="tabla table table-sm table-striped table-hover bordered">
              <thead class="thead">
                <tr>
                  <th class="th">USUARIO</th>
                  <th class="th">PASSWORD</th>
                  <th class="th">NOMBRE</th>
                  <th class="th">APELLIDO</th>
                  <th class="th">MATERIA</th>
                  <th class="th">GRUPO</th>
                </tr>
              </thead>
              <tbody class="tbody">
                <?php
                $query = "SELECT * FROM maestro";
                $resul = $conexion->query($query);
                while ($row = $resul->fetch_assoc()) {
                  ?>
  
                  <tr class="tr">
                    <td class="td"><?php echo $row['usuario']; ?></td>
                    <td class="td"><?php echo $row['passwd']; ?></td>
                    <td class="td"><?php echo $row['nombre']; ?></td>
                    <td class="td"><?php echo $row['apellido']; ?></td>
                    <td class="td"><?php echo $row['materia']; ?></td>
                    <td class="td"><?php echo $row['grupo']; ?></td>
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
      <!---**********************Tabla maestros ********************* -->
        <?php
        if ($_GET['registro'] == 'alumno') {
          $_GET['tabla'] = '';
        ?>
      <!---****************formulario para el ingreso de nuevos alumnos carnet 	nacimiento 	carrera*************-->
      
          <a href="admin.php?tabla=alumno&registro=''" class="button form-btn">Ver datos de alumno</a>
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
        <?php
        if ($_GET['tabla'] == 'alumno') {
        ?>

      <!---**********************Tabla alumno ********************* -->
        
          <a href="admin.php?registro=alumno&tabla=''" class="button form-btn">Ingresar nuevo alumno</a>
        
          <div id="contenedor-tabla">
            <table class="tabla bordered table table-sm table-striped table-hover">
            <thead class="thead">
              <tr>
                <th class="th">USUARIO</th>
                <th class="th">PASWWORD</th>
                <th class="th">NOMBRE</th>
                <th class="th">APELLIDO</th>
                <th class="th">GRUPO</th>
                <th class="th">MATERIA</th>
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
                  <td class="td"><?php echo $row['grupo']; ?></td>
                  <td class="td"><?php echo $row['materia']; ?></td>
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
      </div>
    </div>
  </div>
  <p class="fooder">Hugo Enrique Ayala Alarcon Escudiante de Funval</p>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>