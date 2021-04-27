<?php
error_reporting(0);

 if(isset($_POST["boton2"])) {
  include("../conexion.php");  
  date_default_timezone_set("America/Mexico_City");
  
 $nombrep = $_POST["nproveedores"];
 $rfcp =  $_POST["rfcprov"];  
 $logop = $_POST["logoprov"];  
 $nconp = $_POST["ncontacto"];
 $cconp = $_POST["cargodcontacto"];
 $direcp = $_POST["direccion"];   
 $colo = $_POST["colonia"];
 $ciudad = $_POST["ciudad"];
 $cppro = $_POST["codigop"];  
 $telpro = $_POST["telefono"];  
 $correop = $_POST["correo"];
 $notap = $_POST["nota"];


//if ($nempresa==NULL && $rfc==NULL && $nfacturacion==NULL) {
//  $nempresa="-";
//  $rfc="-";
//  $nfacturacion="-";
//}

   $sql = "INSERT INTO proveedores (nombrep, rfc, logo, nombrecont, cargocon, direccion, colonia, ciudad, cpostal, telefono, correo, nota) VALUES ('$nombrep', '$rfcp', '$logop', '$nconp', '$cconp', '$direcp', '$colo', '$ciudad', '$cppro', '$telpro', '$correop', '$notap')";
if (mysqli_query($con, $sql)) {
      echo "<script type=\"text/javascript\">alert(\"Datos guardados correctamente\");window.location = 'proveedor.php';</script>";
    } else {
      echo '<div class="alert alert-danger" role="alert">'. $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);
 }


?>