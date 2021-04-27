<?php
if(session_status() ===2){  header("location: bienvenido.php");
}else{
?>
<!DOCTYPE html>
<html>
<head>
  <meta lang="es">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Iniciar Sesión | NextOdin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="dist/img/favicon.png" rel="icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div align="center">
  <img src="/dist/img/icon.png" width="35%" height="35%" align="center">
</div>
  <div class="login-logo">
    <a ><b>Next</b> Odin</a>
  </div>
  <!-- /.login-logo -->
  <div class="card" style="">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Para ingresar, inicie sesión</p>
<style>background-image: url("http://odin.nextcam.com.mx/dist/img/fondo.jpg");</style>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <div class="input-group mb-3">
          <input type="user" name="user" id="user" class="form-control" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="contrasenia" id="contrasenia" class="form-control" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
         
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button id="boton" name="boton" type="submit" class="btn btn-primary btn-block">Iniciar</button>
          </div>
          <!-- /.col -->
        </div>
     </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<?php
date_default_timezone_set("America/Mexico_City");
  $hoy = getdate();           //contiene todos los datos de fecha y hora

  $dia = $hoy["wday"];        //obtengo número del día actual (0 a 6)
  $dias = ["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"];
  $dia = $dias[$dia];         //capturo el nombre del día

  $ndia = $hoy["mday"];       //el número del día (1 a 31)
  $mes = $hoy["mon"];         //el número del mes (1 a 12)
  $meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre",];
  $mes = $meses[$mes-1];      //capturo el nombre del mes

  $año = $hoy["year"];        //el año (4 dígitos)
  $hora = $hoy["hours"];      //la hora  (esta necesito que sea la de mi pc)
  $minuto = $hoy["minutes"];  //minutos  (estos sí son los de mi pc)

  $ceroh = "";  //cero extra por estética de la hora
  if($hora < 10){
    $ceroh = "0";
  }else{
    $ceroh = "";
  }
  $cerom = ""; //cero extra por estética de los minutos
  if($minuto < 10){
    $cerom = "0";
  }else{
    $cerom = "";
  }


if(isset($_POST["boton"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
$usuario = $_POST["user"];
$contra = $_POST["contrasenia"];


require_once 'conexion.php';

$consulta = mysqli_query ($con, "SELECT * FROM usuarios WHERE usuarion = '$usuario' AND contraseña = '$contra'");  
$sql1="SELECT id FROM usuarios WHERE usuarion = '$usuario' AND contraseña = '$contra'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $id[]=$row1['id'];
    };

    $sql2="SELECT nivel FROM usuarios WHERE usuarion = '$usuario' AND contraseña = '$contra'";
    $res2 = mysqli_query($con,$sql2);
    while($row1=mysqli_fetch_array($res2)){
      $nivel[]=$row1['nivel'];
    };
   
if(!$consulta){ 
    // echo "Usuario no existe " . $nombre . " " . $password. " o hubo un error " . 
    echo mysqli_error($mysqli);
    // si la consulta falla es bueno evitar que el código se siga ejecutando
    exit;
} 
if($usuario = mysqli_fetch_assoc($consulta)) {
 $fecha = $dia." "
      .$ndia." de "
      .$mes." del "
      .$año;

$hora = $ceroh.$hora.":"
      .$cerom.$minuto; 
$iusuario = $id[0];
       

   $sql = "INSERT INTO accesos (fecha, hora, usuario) VALUES ('$fecha', '$hora', '$iusuario')";
if (mysqli_query($con, $sql)) {
  session_set_cookie_params(60*60*24*1);
     session_start();
  $_SESSION["usuario"] = $usuario;
  $_SESSION["nivel"] = $nivel[0];
  header("location: sesion.php");
    // el usuario y la pwd son correctas
    } else {
      echo '<div class="alert alert-danger" role="alert">'. $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);



  
} else {
  echo '<div class="alert alert-danger" role="alert">Datos incorrectos!</div>';
    // Usuario incorrecto o no existe
  exit;
}}
else {
  # code...
}


?>

</body>
</html>
<?php
     }
     ?>