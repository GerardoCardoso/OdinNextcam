<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
include("../conexion.php");
session_start();
date_default_timezone_set("America/Mexico_City");
$cliente=$_POST['userN'];
$fecha=date('d-m-Y');
$condpago=$_POST['servicior'];
$validez=$_POST['vacoti'];
$tiempoen=$_POST['tentrega'];
$nota=$_POST['nota'];
$sub=$_POST['subotal'];
$des=$_POST['descuento'];
$total=$_POST['total'];
$iva=$_POST['ivat'];
$anticipo=$_POST['anticipo'];
$cantidad =  array_filter($_POST['field_name']);
$medida = array_filter($_POST['field_name2']);
$descripcion = array_filter($_POST['field_name3']);
$precio = array_filter($_POST['field_name4']);
$btniva = $_POST["biva"];
$btndescuento = $_POST["bdescuento"];
$btnanticipo = $_POST["banticipio"];



$subto=array();
$stuff = $_SESSION["usuario"];



foreach ($stuff as $value2) {
     $nom[]=$value2;}
     $token = $nom[0];
$vari=0;
foreach($cantidad as $value ){
$vari=$vari+1;
}
for ($i = 0; $i < $vari; ++$i){
  
  $subto[$i]=$cantidad[$i]*$precio[$i];
  
}
$sq = "INSERT INTO cotizacion (cliente, fecha, condpago, validez, tiempoentrega, nota, descuento, total, useralta, subtotal, anticipo, iva, btniva, btndescuento, btnanticipo) VALUES ('$cliente', '$fecha', '$condpago', '$validez', '$tiempoen', '$nota', '$des', '$total', '$token', '$sub','$anticipo','$iva','$btniva','$btndescuento','$btnanticipo')";
if (mysqli_query($con, $sq)) { 
//Busqueda de la ultima cotizacion
$idos = array();
$sql1="SELECT id FROM cotizacion ORDER by ID DESC";
$res1 = mysqli_query($con,$sql1);
while($row1=mysqli_fetch_array($res1)){
$idos[]=$row1['id'];
};
for ($i = 0; $i < $vari; ++$i){

//Insertar detalle de la cotizacion
 $sq = "INSERT INTO cotizaciondetalle (cantidad, medida, descripcion, precio, total, cotizacion) VALUES ('$cantidad[$i]', '$medida[$i]', '$descripcion[$i]', '$precio[$i]', '$subto[$i]', '$idos[0]')";
 if (mysqli_query($con, $sq)) {
   
  
   //SI FUE CLICLEADO EL BOTON IVA UNICAMENTE
if(!empty($btniva)){
  //SI FUE CLICLEADO EL BOTON IVA Y DESCUENTO UNICAMENTE
  if(!empty($btndescuento)){
    //SI FUE CLICLEADO EL BOTON IVA Y DESCUENTO Y ANTICIPO UNICAMENTE
    if(!empty($btnanticipo)){
       echo "<script type=\"text/javascript\">alert(\"Datos guardados correctamente\");window.location = 'cotizacionvxii.php';</script>";
    }
    else{echo "<script type=\"text/javascript\">alert(\"Datos guardados correctamente\");window.location = 'cotizacionviii.php';</script>";} 
  }
  else{ if(!empty($btnanticipo)){
    echo "<script type=\"text/javascript\">alert(\"Datos guardados correctamente\");window.location = 'cotizacionvii.php';</script>";
  }else{echo "<script type=\"text/javascript\">alert(\"Datos guardados correctamente\");window.location = 'cotizacionvix.php';</script>";}  
}
}
//FIN DE IVA UNICAMENTE
//-----------------------------------------------
//SI FUE CLICEADO EL BOTON DESCUENTO UNICAMENTE
elseif(!empty($btndescuento)){
  //SI FUE CLICEADO EL BOTON DESCUENTO Y ANTICIPO UNICAMENTE
   if(!empty($btnanticipo)){
       echo "<script type=\"text/javascript\">alert(\"Datos guardados correctamente\");window.location = 'cotizacionv.php';</script>";
    }
    else{echo "<script type=\"text/javascript\">alert(\"Datos guardados correctamente\");window.location = 'cotizacionvx.php';</script>";} 
  
  
}
   
//FIN DE DESCUENTO UNICAMENTE
//-----------------------------------------------

//SI FUE CLICEADO EL BOTON ANTICIPO UNICAMENTE
elseif(!empty($btnanticipo)){

       echo "<script type=\"text/javascript\">alert(\"Datos guardados correctamente\");window.location = 'cotizacionvii.php';</script>";


}else{
    echo "<script type=\"text/javascript\">alert(\"Datos guardados correctamente\");window.location = 'cotizacionv.php';</script>";}  
   
 }else {
  echo '<div class="alert alert-danger" role="alert">'. $sq . "<br>" . mysqli_error($con);}
  
 //  echo $cantidad[$i]." ".$medida[$i]." ".$descripcion[$i]." ".$precio[$i]." ".$subtotal[$i]."<br>";
}
}else {
echo '<div class="alert alert-danger" role="alert">'. $sq . "<br>" . mysqli_error($con);}







  

    
 
 
?>