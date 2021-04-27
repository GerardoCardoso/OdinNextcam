
<?php
error_reporting(0);

 if(isset($_POST["boton2"])) {
  include("../conexion.php");  
  date_default_timezone_set("America/Mexico_City");
$usuario=$_POST["nombre"];
$area=$_POST["area"];
$fecalta = date("Y-m-d H:i:s");

$target_path = "firmas/"; 
$target_path = $target_path . basename( $_FILES['firma']['name']); 
$documento="firmas/". basename( $_FILES['firma']['name']);
if (file_exists($documento)) {
echo "<script>
alert('El archivo: ".$documento." ya existe en el servidor, firma no guardada');
window.location = 'firmas.php';
</script>";
}
else {
move_uploaded_file($_FILES['firma']['tmp_name'], $target_path);
   $sql = "INSERT INTO firmas (nombre, area, ruta, fechaact) VALUES ('$usuario', '$area', '$documento', '$fecalta')";
if (mysqli_query($con, $sql)) {
      echo "<script type=\"text/javascript\">alert(\"Datos guardados correctamente\");window.location = 'firmas.php';</script>";
    } else {
      echo '<div class="alert alert-danger" role="alert">'. $sql . "<br>" . mysqli_error($con);
}
mysqli_close($con);
 
 }
 }

?>