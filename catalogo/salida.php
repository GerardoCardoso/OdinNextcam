<?php
error_reporting(0);
session_start();
 if(isset($_POST["bsalida"])) {
  include("../conexion.php");  
  date_default_timezone_set("America/Mexico_City");

 $producto = $_POST["producto2"]; 
 $cantidad = $_POST["cantidad2"];
 $unidad = $_POST["unidad2"];
 $destino = $_POST["salida"];
 $odecompra = $_POST["pedimento"];
 $tdeentrada = $_POST["tsalida"];
 $observaciones = $_POST["observaciones"];  
 $fecha = date("d-m-Y");
 $hora = date("H:i:s");
 $stuff = $_SESSION["usuario"];  
 foreach ($stuff as $value2) {
     $nom[]=$value2;}
     $token = $nom[0];


$sql = "INSERT INTO salidas (producto, cantidad, unidad, usuario, fecha, hora, salida, pedimento, tdesalida, observaciones) VALUES ('$producto', '$cantidad', '$unidad', '$token', '$fecha', '$hora', '$destino', '$odecompra', '$tdeentrada', '$observaciones')";
if (mysqli_query($con, $sql)) {
     echo "<script type=\"text/javascript\">alert(\"Datos guardados correctamente\");window.location = 'movimientos.php';</script>";
    } else {
     echo '<div class="alert alert-danger" role="alert">'. $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);
 }


?>