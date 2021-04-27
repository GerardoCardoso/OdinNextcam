<?php
$cliente=$_POST['codigo'];
include("../conexion.php"); 
$cotizaciones=0;
$oservicio=0;
$cont="SELECT nombre FROM clientes WHERE id='$cliente'";
$count = mysqli_query($con,$cont);
while($row=mysqli_fetch_array($count)){
$nombre=$row['nombre'];
};
$cont="SELECT appaterno FROM clientes WHERE id='$cliente'";
$count = mysqli_query($con,$cont);
while($row=mysqli_fetch_array($count)){
$appaterno=$row['appaterno'];
};




$cont="SELECT count(*) FROM cotizacion WHERE cliente='$cliente'";
$count = mysqli_query($con,$cont);
while($row=mysqli_fetch_array($count)){
$cotizaciones=$row[0];
};
$cont2="SELECT count(*) FROM ordenservicio WHERE cliente='$cliente'";
$count2 = mysqli_query($con,$cont2);
while($row=mysqli_fetch_array($count2)){
$oservicio=$row[0];
};


if($cotizaciones>0 || $oservicio>0){
  echo'<script type="text/javascript">
        alert("Este cliente tiene '.$cotizaciones.' cotizaciones y '.$oservicio.'  ordenes de servicio. Por lo tanto no es posible eliminar este registro");
       window.location.href="../catalogo/clientes.php";
        </script>';
}else{
    $consulta = "DELETE FROM clientes WHERE id='$cliente'";

if ($con->query($consulta) === TRUE){
  echo '<script>alert("Se eliminó al cliente correctamente");
    window.location.href="../catalogo/clientes.php";</script>';
}else{
  echo '<script>alert("No se pudo eliminar el cliente");
  window.location.href="../catalogo/clientes.php";</script>';  
}

 

}
  


?>