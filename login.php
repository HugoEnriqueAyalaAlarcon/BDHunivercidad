<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Huniversidad Temixco</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="./formularios.css">
</head>

<body>
<?php
$tipo_usuario=$_GET['tipo_usuario']
?>
  <div class="container-fluid">
    <div class="container-xxl" id="container-login">
      <div  id="logo">
        <img width="250" src="./logo/logo.png"/>
        <div class="cont-btn-login">
          <a class="btn-login" href="./login.php?tipo_usuario=admin">ADMINISTRADOR</a>
          <a class="btn-login" href="./login.php?tipo_usuario=maestro">MAESTRO</a>
          <a class="btn-login" href="./login.php?tipo_usuario=alumno">ALUMNO</a>
        </div>
      </div>
      <div  id="login">
        <form action="./validar/validarLogin.php" method="post">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Usuario del <?php echo $tipo_usuario?> </label>
            <input type="text" required id="form-control" name="usuario" placeholder=" 👤 Usuario">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password del <?php echo $tipo_usuario?></label>
            <input type="password" require id="form-control"  name="passwd" placeholder=" ⚿ Password">
            <input type="hidden" name="tipo_usuario" value="<?php echo $tipo_usuario?>"/>
          </div>
          <input type="submit"  id="validar" name="enviar" value="Validar" class="button form-btn"/>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>