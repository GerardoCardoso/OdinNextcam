<?php

error_reporting(1);
if(isset($_POST["enviar"])) {
session_start();
include('../conexion.php');
$cotizacion = $_POST["userN"];  
$correobu= $_POST["correo"];  

  
$btniva = array();
$btndescuento = array();
$btnanticipo = array();




$sql1="SELECT btniva FROM cotizacion where id='$cotizacion'";
$res1 = mysqli_query($con,$sql1);
while($row1=mysqli_fetch_array($res1)){
$btniva[]=$row1['btniva'];
};

$sql1="SELECT btndescuento FROM cotizacion where id='$cotizacion'";
$res1 = mysqli_query($con,$sql1);
while($row1=mysqli_fetch_array($res1)){
$btndescuento[]=$row1['btndescuento'];
};

$sql1="SELECT btnanticipo FROM cotizacion where id='$cotizacion'";
$res1 = mysqli_query($con,$sql1);
while($row1=mysqli_fetch_array($res1)){
$btnanticipo[]=$row1['btnanticipo'];
};
     //SI FUE CLICLEADO EL BOTON IVA UNICAMENTE
if($btniva[0]==1){
  //SI FUE CLICLEADO EL BOTON IVA Y DESCUENTO UNICAMENTE
  if($btndescuento[0]==1){
    //SI FUE CLICLEADO EL BOTON IVA Y DESCUENTO Y ANTICIPO UNICAMENTE
    if($btnanticipo[0]==1){
      //echo "<script type=\"text/javascript\">alert('Dioclc1');</script>";
      echo "<script type=\"text/javascript\">window.location = 'http://odin.nextcam.com.mx/servicios/cotenv1.php?opcion=$cotizacion&correo=$correobu';</script>";
      
    }
    else{ //echo "<script type=\"text/javascript\">alert('Dioclc2');</script>";
      echo "<script type=\"text/javascript\">window.location = 'http://odin.nextcam.com.mx/servicios/cotenv2.php?opcion=$cotizacion&correo=$correobu';</script>";
    } 
  }
  else{ if($btnanticipo[0]==1){
    //echo "<script type=\"text/javascript\">alert('Dioclc3');</script>";
    echo "<script type=\"text/javascript\">window.location = 'http://odin.nextcam.com.mx/servicios/cotenv3.php?opcion=$cotizacion&correo=$correobu';</script>";
  }else{
    //echo "<script type=\"text/javascript\">alert('Dioclc4');</script>";
    echo "<script type=\"text/javascript\">window.location = 'http://odin.nextcam.com.mx/servicios/cotenv4.php?opcion=$cotizacion&correo=$correobu';</script>";
  }  
}
}
//FIN DE IVA UNICAMENTE
//-----------------------------------------------
//SI FUE CLICEADO EL BOTON DESCUENTO UNICAMENTE
elseif($btndescuento[0]==1){
  //SI FUE CLICEADO EL BOTON DESCUENTO Y ANTICIPO UNICAMENTE
   if($btnanticipo[0]==1){
     //echo "<script type=\"text/javascript\">alert('Dioclc5');</script>";
      echo "<script type=\"text/javascript\">window.location = 'http://odin.nextcam.com.mx/servicios/cotenv5.php?opcion=$cotizacion&correo=$correobu';</script>";
    }
    else{
      //echo "<script type=\"text/javascript\">alert('Dioclc6');</script>";
      echo "<script type=\"text/javascript\">window.location = 'http://odin.nextcam.com.mx/servicios/cotenv6.php?opcion=$cotizacion&correo=$correobu';</script>";
    } 
  
  
}
   
//FIN DE DESCUENTO UNICAMENTE
//-----------------------------------------------

//SI FUE CLICEADO EL BOTON ANTICIPO UNICAMENTE
elseif($btnanticipo[0]==1){
//echo "<script type=\"text/javascript\">alert('Dioclc7');</script>";
 echo "<script type=\"text/javascript\">window.location = 'http://odin.nextcam.com.mx/servicios/cotenv7.php?opcion=$cotizacion&correo=$correobu';</script>";


}else{
 // echo "<script type=\"text/javascript\">alert('Dioclc8');</script>";
  echo "<script type=\"text/javascript\">window.location = 'http://odin.nextcam.com.mx/servicios/cotenv8.php?opcion=$cotizacion&correo=$correobu';</script>";
}  
   




  
  
  
}
  
  ?>