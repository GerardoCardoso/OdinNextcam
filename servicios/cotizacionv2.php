<?php 
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
require('../fpdf/fpdf.php');
include("../conexion.php");
session_start();
setlocale(LC_MONETARY, 'en_US.UTF-8');
date_default_timezone_set('America/Mexico_City');

$idos=$_POST['codigo'];

$btniva = array();
$btndescuento = array();
$btnanticipo = array();




$sql1="SELECT btniva FROM cotizacion where id='$idos'";
$res1 = mysqli_query($con,$sql1);
while($row1=mysqli_fetch_array($res1)){
$btniva[]=$row1['btniva'];
};

$sql1="SELECT btndescuento FROM cotizacion where id='$idos'";
$res1 = mysqli_query($con,$sql1);
while($row1=mysqli_fetch_array($res1)){
$btndescuento[]=$row1['btndescuento'];
};

$sql1="SELECT btnanticipo FROM cotizacion where id='$idos'";
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
      echo "<script type=\"text/javascript\">window.location = 'http://odin.nextcam.com.mx/servicios/cotizacion.php?opcion='+$idos;</script>";
      
    }
    else{  echo "<script type=\"text/javascript\">window.location = 'http://odin.nextcam.com.mx/servicios/cotizacion2.php?opcion='+$idos;</script>";} 
  }
  else{ if($btnanticipo[0]==1){
    echo "<script type=\"text/javascript\">window.location = 'http://odin.nextcam.com.mx/servicios/cotizacion3.php?opcion='+$idos;</script>";
  }else{echo "<script type=\"text/javascript\">window.location = 'http://odin.nextcam.com.mx/servicios/cotizacion4.php?opcion='+$idos;</script>";}  
}
}
//FIN DE IVA UNICAMENTE
//-----------------------------------------------
//SI FUE CLICEADO EL BOTON DESCUENTO UNICAMENTE
elseif($btndescuento[0]==1){
  //SI FUE CLICEADO EL BOTON DESCUENTO Y ANTICIPO UNICAMENTE
   if($btnanticipo[0]==1){
       echo "<script type=\"text/javascript\">window.location = 'http://odin.nextcam.com.mx/servicios/cotizacion5.php?opcion='+$idos;</script>";
    }
    else{echo "<script type=\"text/javascript\">window.location = 'http://odin.nextcam.com.mx/servicios/cotizacion6.php?opcion='+$idos;</script>";} 
  
  
}
   
//FIN DE DESCUENTO UNICAMENTE
//-----------------------------------------------

//SI FUE CLICEADO EL BOTON ANTICIPO UNICAMENTE
elseif($btnanticipo[0]==1){

       echo "<script type=\"text/javascript\">window.location = 'http://odin.nextcam.com.mx/servicios/cotizacion7.php?opcion='+$idos;</script>";


}else{
          echo "<script type=\"text/javascript\">window.location = 'http://odin.nextcam.com.mx/servicios/cotizacion8.php?opcion='+$idos;</script>";}  
   












 ?>