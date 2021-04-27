<?php

 if(isset($_POST["boton2"])) {
  include("../conexion.php");  
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



  $nombre = $_POST["nombre"];
  $apaterno = $_POST["apaterno"];
  $amaterno = $_POST["amaterno"];
  $email = $_POST["email"];
  $telefono = $_POST["telefono"];
  $fechanac = $_POST["fecnacimiento"];
  $usuan = $_POST["nusuario"];
  $contra = $_POST["contrase"];
  $nivel = $_POST["nivel"];
     $cusuario = $_POST["cusuario"];
  $fecalta = $dia." "
      .$ndia." de "
      .$mes." del "
      .$año.", "
      .$ceroh.$hora.":"
      .$cerom.$minuto;



   $sql = "INSERT INTO usuarios (nombre, appaterno, amaterno, email, telefono, fechanac, usuarion, contraseña, nivel, fecalta, codigo_persona) VALUES ('$nombre', '$apaterno', '$amaterno', '$email', '$telefono', '$fechanac', '$usuan', '$contra', '$nivel', '$fecalta', '$cusuario')";
if (mysqli_query($con, $sql)) {
      echo "<script type=\"text/javascript\">alert(\"Datos guardados correctamente\");window.location = 'usuarios.php';</script>";
    } else {
      echo '<div class="alert alert-danger" role="alert">'. $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);
 }


?>