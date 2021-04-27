<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include('../conexion.php');
$idos= array();
$correobu= array();
$cliente= array();
$celular= array();
$clave= array();
$nombrec= array();
$feccreacion= array();
$fechao= array();
$fallao= array();
//$idos[0]=51;
//$correobu[0]="lae_santoyo08@hotmail.com";
   $sql1="SELECT id FROM ordenservicio ORDER by ID DESC";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
   $idos[]=$row1['id'];
   };

   $sql1="SELECT correo FROM ordenservicio WHERE id = '$idos[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $correobu[]=$row1['correo'];
    };

    $sql1="SELECT cliente FROM ordenservicio WHERE id = '$idos[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $cliente[]=$row1['cliente'];
    };
    $sql1="SELECT feccreacion FROM ordenservicio WHERE id = '$idos[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $feccreacion[]=$row1['feccreacion'];
    };
$sql1="SELECT fecha FROM ordenservicio WHERE id = '$idos[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $fechao[]=$row1['fecha'];
    };

$sql1="SELECT servicio FROM ordenservicio WHERE id = '$idos[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $fallao[]=$row1['servicio'];
    };
    $sql1= "SELECT celular FROM clientes WHERE id = '$cliente[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $celular[]=$row1['celular'];
    };

    $sql1= "SELECT nombre FROM clientes WHERE id = '$cliente[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $nombrec[]=$row1['nombre'];
    };
    $sql1= "SELECT appaterno FROM clientes WHERE id = '$cliente[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $appaterno[]=$row1['appaterno'];
    };

    $sql1= "SELECT clave FROM accesoservicio WHERE orden = '$idos[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $clave[]=$row1['clave'];
    };



 
  
//INICIO DE ENVIO POR CELULAR
if ($correobu[0]==NULL) {
//Si no hay correo pero si hay celular




 echo "<script type=\"text/javascript\">window.location = 'https://wa.me/52$celular[0]/?text=Para visualizar su órden de servicio deberá ir al siguiente link: http://odin.nextcam.com.mx/servicios/porden3.php y una vez en el sitio introducir su clave: $clave[0]';</script>";
//FIN DE ENVIO POR CELULAR
}else{
$to =  $correobu[0];
$contr=$clave[0];  
$fecreacion=$feccreacion[0];
$nombre=$nombrec[0];
$ap=$appaterno[0];
$falla=$fallao[0];
$fecha=$fechao[0];
  
$subject = "Orden de Servicio | Nextcam";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: servicios@nextcam.com.mx" . "\r\n";
$headers .= "Bcc: gerencia@nextcam.com.mx\r\n";
$headers .= "Bcc: soporte@nextcam.com.mx\r\n";
$message = '
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no">
<title>Orden de Servicio | Nextcam</title>

<xml>
<o:OfficeDocumentSettings>
<o:AllowPNG/>
<o:PixelsPerInch>96</o:PixelsPerInch>
</o:OfficeDocumentSettings>
</xml>
<style>
html,body,table,tbody,tr,td,div,p,ul,ol,li,h1,h2,h3,h4,h5,h6 {
margin: 0;
padding: 0;
}

body {
-ms-text-size-adjust: 100%;
-webkit-text-size-adjust: 100%;
}

table {
border-spacing: 0;
mso-table-lspace: 0pt;
mso-table-rspace: 0pt;
}

table td {
border-collapse: collapse;
}

h1,h2,h3,h4,h5,h6 {
font-family: Arial;
}

.ExternalClass {
width: 100%;
}

.ExternalClass,
.ExternalClass p,
.ExternalClass span,
.ExternalClass font,
.ExternalClass td,
.ExternalClass div {
line-height: 100%;
}

.ReadMsgBody {
width: 100%;
}

img {
-ms-interpolation-mode: bicubic;
}

</style>

<style>
a[x-apple-data-detectors=true]{
color: inherit !important;
text-decoration: inherit !important;
}

u + #body a {
color: inherit;
text-decoration: inherit !important;
font-size: inherit;
font-family: inherit;
font-weight: inherit;
line-height: inherit;
}

a, a:link, .no-detect-local a, .appleLinks a {
color: inherit !important;
text-decoration: inherit;
}

</style>

<style>

.width600 {
width: 600px;
max-width: 100%;
}

@media all and (max-width: 599px) {
.width600 {
width: 100% !important;
}
}

@media screen and (min-width: 600px) {
.hide-on-desktop {
display: none;
}
}

@media all and (max-width: 599px),
only screen and (max-device-width: 599px) {
.main-container {
width: 100% !important;
}

.col {
width: 100%;
}

.fluid-on-mobile { 
width: 100% !important;
height: auto !important; 
text-align:center;
}

.fluid-on-mobile img {
width: 100% !important;
}

.hide-on-mobile { 
display:none !important; 
width:0px !important;
height:0px !important; 
overflow:hidden; 
}
}

</style>

<style>

.col {
width: 100% !important;
}

.width600 {
width: 600px;
}

.width185 {
width: 185px;
height: auto;
}

.hide-on-desktop {
display: none;
}

.hide-on-desktop table {
mso-hide: all;
}

.nounderline {text-decoration: none !important;}

.mso-font-fix-arial { font-family: Arial, sans-serif;}
.mso-font-fix-georgia { font-family: Georgia, sans-serif;}
.mso-font-fix-tahoma { font-family: Tahoma, sans-serif;}
.mso-font-fix-times_new_roman { font-family: "Times New Roman", sans-serif;}
.mso-font-fix-trebuchet_ms { font-family: "Trebuchet MS", sans-serif;}
.mso-font-fix-verdana { font-family: Verdana, sans-serif;}

</style>
<![endif]-->
</head>
<body id="body" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" style="font-family:Arial, sans-serif; font-size:0px;margin:0;padding:0;background-color:#f2f2f2;">

<style>
@media screen and (min-width: 600px) {
.hide-on-desktop {
display: none;
}
}

@media all and (max-width: 599px) {
.hide-on-mobile { 
display:none !important; 
width:0px !important;
height:0px !important; 
overflow:hidden; 
}
.main-container {
width: 100% !important;
}
.col {
width: 100%;
}

.fluid-on-mobile { 
width: 100% !important;
height: auto !important; 
text-align:center;
}

.fluid-on-mobile img {
width: 100% !important;
}
}
</style>
<div style="background-color:#f2f2f2;">

<table height="100%" width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
<td valign="top" align="left">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
<td width="100%">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
<td align="center" width="100%">
<!--[if gte mso 9]><table width="600" cellpadding="0" cellspacing="0"><tr><td><![endif]-->
<table class="width600 main-container" cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width:600px;">
<tr>
<td width="100%">

<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top" align="center"><!--[if gte mso 9]><table width="225" cellpadding="0" cellspacing="0"><tr><td><![endif]-->

<table cellpadding="0" cellspacing="0" border="0" style="max-width:100%;" class="img-wrap">
<tr>

<td valign="top" align="center" style="padding:20px;"><img src="https://images.chamaileon.io/5fecb39bbae06a19f699676c/5fecb39bbae06a6fdc996776/1609437846170_1609437843730_Edit%20an%20image%20from%20editor" width="185" height="142" alt="Nextcam" border="0" style="display:block;font-size:14px;max-width:100%;height:auto;" class="width185" />
</td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>
<!--[if gte mso 9]></td></tr></table><![endif]-->
</td>
</tr>
</table>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
<td align="center" width="100%">
<!--[if gte mso 9]><table width="600" cellpadding="0" cellspacing="0"><tr><td><![endif]-->
<table class="width600 main-container" cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width:600px;">
<tr>
<td width="100%">

<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top" style="padding-bottom:5px;">
<table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#ffffff" style="background-color:#ffffff;">
<tr>

<td valign="top" style="padding-top:30px;padding-right:10px;padding-bottom:30px;padding-left:10px;">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top" style="padding-top:15px;padding-right:20px;padding-left:20px;"><div style="font-family:Arial;font-size:50px;color:#24495c;line-height:53px;text-align:left;"><p style="padding: 0; margin: 0;text-align: center;"><strong>Orden de Servicio</strong></p>
</div>
</td>
</tr>
</table>

<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top" style="padding-top:5px;padding-right:20px;padding-bottom:15px;padding-left:20px;"><div style="font-family:Arial;font-size:30px;color:#4a90b2;line-height:40px;text-align:left;"><p style="padding: 0; margin: 0;text-align: center;">'.$fecha.'</p>
</div>
</td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>
</td>
</tr>
</table>
<table cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color:transparent;">
<tr>
<td align="center" width="100%">
<!--[if gte mso 9]><table width="600" cellpadding="0" cellspacing="0"><tr><td><![endif]-->
<table class="width600 main-container" cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width:600px;">
<tr>
<td width="100%">

<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top" style="padding-bottom:5px;">
<table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#bce2f9" style="background-color:#bce2f9;">
<tr>

<td valign="top" style="padding-top:30px;padding-right:30px;padding-bottom:40px;padding-left:30px;">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top" style="padding-top:15px;padding-right:10px;padding-bottom:15px;padding-left:10px;"><div style="font-family:Arial;font-size:35px;color:#24495c;line-height:35px;text-align:left;"><p style="padding: 0; margin: 0;"><b>Sr/Sra. '.$nombre.' '.$ap.'</b></p>
</div>
</td>
</tr>
</table>

<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top" style="padding-top:15px;padding-right:10px;padding-bottom:10px;padding-left:10px;"><div style="font-family:Arial;font-size:16px;color:#24495c;line-height:24px;text-align:left;"><p style="padding: 0; margin: 0;">Le hacemos llegar su contrase&ntilde;a que comprende a su orden de servicio del  '.$fecreacion.' el cual fue atendido su problema de: '.$falla.' por uno de nuestros equipos, gracias por confiar en nosotros</p>
</div>
</td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>
<!--[if gte mso 9]></td></tr></table><![endif]-->
</td>
</tr>
</table>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
<td align="center" width="100%">
<!--[if gte mso 9]><table width="600" cellpadding="0" cellspacing="0"><tr><td><![endif]-->
<table class="width600 main-container" cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width:600px;">
<tr>
<td width="100%">

<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top" style="padding-bottom:5px;">
<table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#ffffff" style="background-color:#ffffff;">
<tr>

<td valign="top" style="padding-top:30px;padding-right:20px;padding-bottom:35px;padding-left:20px;">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top" style="padding-top:15px;padding-right:10px;padding-bottom:15px;padding-left:10px;"><div style="font-family:Arial;font-size:35px;color:#f77f28;line-height:35px;text-align:left;"><p style="padding: 0; margin: 0;text-align: center;"><strong>Contrase&ntilde;a</strong></p>
</div>
</td>
</tr>
</table>

<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top" style="padding-top:10px;padding-right:5px;padding-bottom:10px;padding-left:5px;">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top" style="padding-top:15px;padding-right:10px;padding-bottom:10px;padding-left:10px;"><div style="font-family:Arial;font-size:16px;color:#24495c;line-height:24px;text-align:left;"><p style="padding: 0; margin: 0;text-align: center;"><span style="font-size:36px;">'.$contr.'</span></p>
</div>
</td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>

<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top" style="padding-top:10px;padding-right:10px;padding-bottom:15px;padding-left:10px;">
<table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="transparent" style="border:5px solid #bce2f9;background-color:transparent;">
<tr>

<td valign="top">
<table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#f77f28" style="border:5px solid #ffaa39;background-color:#f77f28;">
<tr>

<td valign="top" style="padding-top:20px;padding-right:10px;padding-bottom:30px;padding-left:10px;">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top" style="padding:10px;"><div style="font-family:Arial;font-size:16px;color:#ffffff;line-height:24px;text-align:left;"><p style="padding: 0; margin: 0;">Para visualizar su orden se clic en la siguiente im&aacute;gen y utlice la contrase&ntilde;a anteriormente descrita.</p>
</div>
</td>
</tr>
</table>

<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top" align="center" style="padding:10px;">
<!--[if !mso]><!-- -->
<a href="" target="_blank" style="display:inline-block; text-decoration:none;" class="fluid-on-mobile">
<span>

<table cellpadding="0" cellspacing="0" border="0" bgcolor="#bce2f9" style="border-radius:25px;border-collapse:separate !important;background-color:#bce2f9;" class="fluid-on-mobile">
<tr>

<td align="center" style="padding-top:12px;padding-right:20px;padding-bottom:12px;padding-left:20px;" width="110">
<span style="color:#24495c !important;font-family:Arial;font-size:15px;mso-line-height:exactly;line-height:19px;mso-text-raise:2px;">
<a href="http://odin.nextcam.com.mx/servicios/porden3.php"><font style="color:#24495c;" class="button">
<span>IR A ORDEN</span>
</font></a>
</span>
</td>
</tr>
</table>

</span>
</a>
<!--<![endif]-->
<div style="display:none; mso-hide: none;">

<table cellpadding="0" cellspacing="0" border="0" bgcolor="#bce2f9" style="border-radius:25px;border-collapse:separate !important;background-color:#bce2f9;" class="fluid-on-mobile">
<tr>

<td align="center" style="padding-top:12px;padding-right:20px;padding-bottom:12px;padding-left:20px;" width="110">
<a href="" target="_blank" style="color:#24495c !important;font-family:Arial;font-size:15px;mso-line-height:exactly;line-height:19px;mso-text-raise:2px;text-decoration:none;text-align:center;">

<span style="color:#24495c !important;font-family:Arial;font-size:15px;mso-line-height:exactly;line-height:19px;mso-text-raise:2px;">
<font style="color:#24495c;" class="button">
<span>IR A ORDEN</span>
</font>
</span>
</a>
</td>
</tr>
</table>

</div>
</td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>
<!--[if gte mso 9]></td></tr></table><![endif]-->
</td>
</tr>
</table>
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
<td align="center" width="100%">
<!--[if gte mso 9]><table width="600" cellpadding="0" cellspacing="0"><tr><td><![endif]-->
<table class="width600 main-container" cellpadding="0" cellspacing="0" border="0" width="100%" style="max-width:600px;">
<tr>
<td width="100%">

<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
<td valign="top">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top" style="padding-top:20px;padding-right:40px;padding-bottom:10px;padding-left:40px;">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top"><table cellpadding="0" cellspacing="0" border="0" width="100%" class="mcol">
<tr>
<td valign="top" style="padding:0;mso-cellspacing:0in;">
<!--[if gte mso 9]><table cellpadding="0" cellspacing="0" border="0" width="100%"><tr><![endif]-->
<!--[if gte mso 9]><td valign="top" style="padding:0;width:173.33333333333331px;"><![endif]-->
<table cellpadding="0" cellspacing="0" border="0" width="33.33333333333333%" class="col" align="left">
<tr>
<td valign="top" width="100%" style="padding:0;">

<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top" style="padding:10px;"><div style="font-family:Arial;font-size:13px;color:#4a90b2;line-height:19px;text-align:left;"><p style="padding: 0; margin: 0;text-align: center;">www.nextcam.com.mx</p>
</div>
</td>
</tr>
</table>

<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top" style="padding:10px;"><div style="font-family:Arial;font-size:13px;color:#4a90b2;line-height:19px;text-align:left;"><p style="padding: 0; margin: 0;text-align: center;">Calz. L&aacute;zaro C&aacute;rdenas 197, Revoluci&oacute;n, 94295 Veracruz, Ver.</p>
</div>
</td>
</tr>
</table>

</td>
</tr>
</table>
<!--[if gte mso 9]></td><![endif]--><!--[if gte mso 9]><td valign="top" style="padding:0;width:173.33333333333331px;"><![endif]-->
<table cellpadding="0" cellspacing="0" border="0" width="33.33333333333333%" class="col" align="left">
<tr>
<td valign="top" width="100%" style="padding:0;">
<table cellpadding="0" cellspacing="0" border="0" width="100%"><tr><td width="100%" align="center"><table cellpadding="0" cellspacing="0" border="0"><tr><td><!--[if true]><table cellpadding="0" cellspacing="0" border="0" width="100%"><tr><td valign="top" style="padding:0;" width="32"><![endif]--><table align="left" cellpadding="0" cellspacing="0" border="0" style="width:100%;"><tr><td align="center"><a href="https://www.facebook.com/NextcamVer/" target="_blank"><img width="32" border="0" height="32" src="https://plugins.chamaileon.io/real-time-editor/latest/static/img/Facebook/fb-4-colorful.png" alt="facebook" /></a></td></tr></table><!--[if true]></td><td valign="top" style="padding:0;" width="40"><![endif]--><table align="left" width="40" height="40" border="0"><tr><td></td></tr></table><!--[if true]></td><td valign="top"
style="padding:0;" width="32"><![endif]--><table align="left" cellpadding="0" cellspacing="0" border="0" style="width:100%;"><tr><td align="center"><a href="https://www.instagram.com/nextcamver/" target="_blank"><img width="32" border="0" height="32" src="https://plugins.chamaileon.io/real-time-editor/latest/static/img/Instagram/ig-4-colorful.png" alt="instagram" /></a></td></tr></table><!--[if true]></td></tr></table><![endif]--></td></tr></table></td></tr></table>
</td>
</tr>
</table>
<!--[if gte mso 9]></td><![endif]--><!--[if gte mso 9]><td valign="top" style="padding:0;width:173.33333333333331px;"><![endif]-->
<table cellpadding="0" cellspacing="0" border="0" width="33.33333333333333%" class="col" align="left">
<tr>
<td valign="top" width="100%" style="padding:0;">

<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top">
<table cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>

<td valign="top" style="padding:10px;"><div style="font-family:Arial;font-size:13px;color:#4a90b2;line-height:19px;text-align:left;"><p style="padding: 0; margin: 0;text-align: center;">Todos los derechos reservados a Nextcam</p>
</div>
</td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>
<!--[if gte mso 9]></td><![endif]-->
<!--[if gte mso 9]></tr></table><![endif]-->
</td>
</tr>
</table>
</td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>
<!--[if gte mso 9]></td></tr></table><![endif]-->
</td>
</tr>
</table>

</td>
</tr>
</table>
</td>
</tr>
</table>
</div>
</body>
</html>
';
 

  if(mail($to, $subject, $message, $headers)){
     echo "<script type=\"text/javascript\">alert(\"Correo enviado exitosamente\");window.location = 'orealizadas.php';</script>"; 
  }else{
     echo "<script type=\"text/javascript\">alert(\"Error\");</script>"; 
  }
  
  
 
  }  

?>