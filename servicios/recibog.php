<?php
 if(isset($_POST["boton2"])){
  include("../conexion.php");
   
  session_start();
   
  date_default_timezone_set("America/Mexico_City");
  $formatterES = new NumberFormatter("es-ES", NumberFormatter::SPELLOUT);
   
  $cotizacion = $_POST["userN"];
  $nombreCliente= $_POST["nombre"]; //1)pdf
  $telefonoCliente= $_POST["telefono"]; //2)pdf
  $folio= $_POST["folio"]; //3)pdf
  $direccion= $_POST["direccion"]; //4)pdf
  $fecha = date('d-m-Y'); //5)pdf
  $correo = $_POST["correo"]; //6)pdf
  $plazos = $_POST["pagos"]; //7)pdf
  $descripcion = $_POST["descripcion"]; //8)pdf
  $tot = $_POST["tot"]; //9) y 11)pdf
  $abono = $_POST["abono"]; //10)pdf
  $formadpago = $_POST["fpago"]; //12)pdf
  $restante = $_POST["total"]; //13)pdf
  $stuff = $_SESSION["usuario"];

  foreach ($stuff as $value2){
       $nom[]= $value2;
  }
  
  $token = $nom[0];

  $n = $abono;
  $izquierda = intval(floor($n));
  $derecha = intval(($n - floor($n)) * 100);
  $totaldescrito = $formatterES->format($izquierda) . " punto " . $formatterES->format($derecha) . " pesos mexicanos";

  $sql = "INSERT INTO recibos (cotizacion, correo, fdepago, fecha, descripcion, total, abono, restante, usuario, totaldes, plazos) VALUES ('$cotizacion', '$correo', '$formadpago', '$fecha', '$descripcion', '$tot', '$abono', '$restante', '$token', '$totaldescrito', '$plazos')";
   
  if (mysqli_query($con, $sql)) {
    $lastInsertedId= mysqli_insert_id($con);
    echo "<script type=\"text/javascript\">
            alert(\"Datos guardados correctamente\");
            window.location = 'recibo.php?identifier={$lastInsertedId}';
          </script>";
  }
  else{
    echo '<div class="alert alert-danger" role="alert">'. $sql . "<br>" . mysqli_error($con);
  }
  
  mysqli_close($con);
}
?>