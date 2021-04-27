<?php
error_reporting(0);
session_start();
 if(isset($_POST["bentrada"])) {
  include("../conexion.php");  
  date_default_timezone_set("America/Mexico_City");

 $producto = $_POST["producto"]; 
 $cantidad = $_POST["cantidad"];
 $unidad = $_POST["unidad"];
 $destino = $_POST["destino"];
 $odecompra = $_POST["odecompra"];
 $tdeentrada = $_POST["tentrada"];
 $observaciones = $_POST["observaciones"];  
 $fecha = date("d-m-Y");
 $hora = date("H:i:s");
 $stuff = $_SESSION["usuario"];  
 foreach ($stuff as $value2) {
     $nom[]=$value2;}
     $token = $nom[0];


$sql = "INSERT INTO entradas (producto, cantidad, unidad, usuario, fecha, hora, destino, odecompra, tdeentrada, observaciones) VALUES ('$producto', '$cantidad', '$unidad', '$token', '$fecha', '$hora', '$destino', '$odecompra', '$tdeentrada', '$observaciones')";
if (mysqli_query($con, $sql)) {
     echo "<script type=\"text/javascript\">alert(\"Datos guardados correctamente\");window.location = 'movimientos.php';</script>";
    } else {
     echo '<div class="alert alert-danger" role="alert">'. $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);
 }


?>