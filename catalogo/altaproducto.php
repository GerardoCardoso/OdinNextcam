<?php
error_reporting(0);
 if(isset($_POST["boton2"])) {
  include("../conexion.php");  
  date_default_timezone_set("America/Mexico_City");
$nombre = $_POST["nombre"]; 
$descripcion = $_POST["descripcion"];
$tunidad = $_POST["tunidad"];   
$cbarras = $_POST["codigob"];
$codigo = $_POST["codigo"];
$modelo = $_POST["modelo"];
$categoria = $_POST["categoria"];
$marca = $_POST["marca"];   
$provee = $_POST["proveedor"];   
$cmin = $_POST["cminima"];   
$cmax = $_POST["cmaxima"];
$utilidad = $_POST["utilidad"];
$foto = $_POST["foto"];   
   
   
$sql = "INSERT INTO productos (nombre, codigo, foto, descripcion, cbarras, cantidadmin, cantidadmax, categoria, modelo, utilidad, marca, unidad, proveedor ) VALUES ('$nombre', '$codigo', '$foto', '$descripcion', '$cbarras', '$cmin', '$cmax', '$categoria', '$modelo', '$utilidad', '$marca', '$tunidad', '$provee')";
if (mysqli_query($con, $sql)) {
     echo "<script type=\"text/javascript\">alert(\"Datos guardados correctamente\");window.location = 'productos.php';</script>";
    } else {
     echo '<div class="alert alert-danger" role="alert">'. $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);
 }


?>