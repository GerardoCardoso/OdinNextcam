
<?php
error_reporting(0);

 if(isset($_POST["boton2"])) {
  include("../conexion.php");  
$nombre = $_POST["nombre"];
$foto = $_POST["foto"];
   

$sql = "INSERT INTO marcas (nombre, foto) VALUES ('$nombre', '$foto')";
if (mysqli_query($con, $sql)) {
     echo "<script type=\"text/javascript\">alert(\"Datos guardados correctamente\");window.location = 'marcas.php';</script>";
    } else {
     echo '<div class="alert alert-danger" role="alert">'. $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);
 }


?>