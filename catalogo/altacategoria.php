
<?php
error_reporting(0);

 if(isset($_POST["boton2"])) {
  include("../conexion.php");  
  date_default_timezone_set("America/Mexico_City");

   
  $cuenta = $_POST["nombre"];
  $url = $_POST["descripcion"]; 


$sql = "INSERT INTO categoria (nombre, descripcion) VALUES ('$cuenta', '$url')";
if (mysqli_query($con, $sql)) {
     echo "<script type=\"text/javascript\">alert(\"Datos guardados correctamente\");window.location = 'categorias.php';</script>";
    } else {
     echo '<div class="alert alert-danger" role="alert">'. $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);
 }


?>