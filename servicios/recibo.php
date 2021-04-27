<?php 
  //ini_set('display_errors', 1);
  //ini_set('display_startup_errors', 1);
  //error_reporting(E_ALL);
  require('../fpdf/fpdf.php');
  include('../conexion.php');

  setlocale(LC_MONETARY, 'en_US.UTF-8');
  date_default_timezone_set("America/Mexico_City");
  $hoy = getdate();           //contiene todos los datos de fecha y hora

  $dia = $hoy["wday"];        //obtengo número del día actual (0 a 6)
  $dias = ["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"];
  $dia = $dias[$dia];         //capturo el nombre del día

  $ndia = $hoy["mday"];       //el número del día (1 a 31)
  $mes = $hoy["mon"];         //el número del mes (1 a 12)
  $meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre",];
  $mes = $meses[$mes-1];      //capturo el nombre del mes

  $año = $hoy["year"];        //el año (4 dígitos)
  $hora = $hoy["hours"];      //la hora  (esta necesito que sea la de mi pc)
  $minuto = $hoy["minutes"];  //minutos  (estos sí son los de mi pc)

  $ceroh = "";  //cero extra por estética de la hora
  if($hora < 10){
    $ceroh = "0";
  }else{
    $ceroh = "";
  }
  $cerom = ""; //cero extra por estética de los minutos
  if($minuto < 10){
    $cerom = "0";
  }else{
    $cerom = "";
  }

    $nombret = array();
    $apaternot = array();
    $tecnico = array();
    $nombre = array();
    $apaterno = array();
    $celular= array();
    $tipodeservicio = array();
    $observaciones = array();
    $firma = array();
    $costo = array();

    $descripcion = array();
    $cantidad = array();
    $medida=array();
    $idos = array();
    $fecha = array();
    $cliente = array();
    $cond = array();
    $tentrega = array();
    $vali = array();
    $nota = array();
    $subototal = array();
    $total = array();
    $descuento = array();
    $user = array();
    $totl = array();
    $precio = array();
    $totalcoti = array();
    $anticipo = array();
    $correo = array();

    $recibo= array();

    $res1 = mysqli_query($con, "SELECT id FROM cotizacion ORDER by ID DESC");
    while($row1=mysqli_fetch_array($res1)){
      $idos[]=$row1['id'];
    };

    $res1 = mysqli_query($con, "SELECT fecha FROM cotizacion WHERE id = '$idos[0]'");
    while($row1=mysqli_fetch_array($res1)){
      $fecha[]=$row1['fecha'];
    };

    $res1 = mysqli_query($con, "SELECT correo FROM cotizacion WHERE id = '$idos[0]'");
    while($row1=mysqli_fetch_array($res1)){
      $correo[]=$row1['correo'];
    };

    $res1 = mysqli_query($con, "SELECT condpago FROM cotizacion WHERE id = '$idos[0]'");
    while($row1=mysqli_fetch_array($res1)){
      $cond[]=$row1['condpago'];
    };

    $res1 = mysqli_query($con, "SELECT tiempoentrega FROM cotizacion WHERE id = '$idos[0]'");
    while($row1=mysqli_fetch_array($res1)){
      $tentrega[]=$row1['tiempoentrega'];
    };

    $res1 = mysqli_query($con, "SELECT validez FROM cotizacion WHERE id = '$idos[0]'");
    while($row1=mysqli_fetch_array($res1)){
      $vali[]=$row1['validez'];
    };

    $res1 = mysqli_query($con, "SELECT nota FROM cotizacion WHERE id = '$idos[0]'");
    while($row1=mysqli_fetch_array($res1)){
      $nota[]=$row1['nota'];
    };

    $res1 = mysqli_query($con, "SELECT subtotal FROM cotizacion WHERE id = '$idos[0]'");
    while($row1=mysqli_fetch_array($res1)){
      $subototal[]=$row1['subtotal'];
    };

    $res1 = mysqli_query($con, "SELECT anticipo FROM cotizacion WHERE id = '$idos[0]'");
    while($row1=mysqli_fetch_array($res1)){
      $anticipo[]=$row1['anticipo'];
    };

    $res1 = mysqli_query($con, "SELECT descuento FROM cotizacion WHERE id = '$idos[0]'");
    while($row1=mysqli_fetch_array($res1)){
      $descuento[]=$row1['descuento'];
    };

    $res1 = mysqli_query($con, "SELECT total FROM cotizacion WHERE id = '$idos[0]'");
    while($row1=mysqli_fetch_array($res1)){
      $total[]=$row1['total'];
    };

    $res1 = mysqli_query($con, "SELECT cliente FROM cotizacion WHERE id = '$idos[0]'");
    while($row1=mysqli_fetch_array($res1)){
      $cliente[]=$row1['cliente'];
    };

    $res1 = mysqli_query($con, "SELECT useralta FROM cotizacion WHERE id = '$idos[0]'");
    while($row1=mysqli_fetch_array($res1)){
      $user[]=$row1['useralta'];
    };

    $res1 = mysqli_query($con, "SELECT nombre FROM usuarios where id = '$user[0]'");
    while($row1=mysqli_fetch_array($res1)){
      $nombret[]=$row1['nombre'];
    };

    $res2 = mysqli_query($con, "SELECT appaterno FROM usuarios where id = '$user[0]'");
    while($row2=mysqli_fetch_array($res2)){
      $apaternot[]=$row2['appaterno'];
    };

    $token = strtok($nombret[0], " "); 
    //cliente busqueda

    $res1 = mysqli_query($con, "SELECT nombre FROM clientes where id = '$cliente[0]'");
    while($row1=mysqli_fetch_array($res1)){
      $nombre[]=$row1['nombre'];
    };

    $res2 = mysqli_query($con, "SELECT appaterno FROM clientes where id = '$cliente[0]'");
    while($row2=mysqli_fetch_array($res2)){
      $apaterno[]=$row2['appaterno'];
    };

    $res12 = mysqli_query($con, "SELECT celular FROM clientes where id = '$cliente[0]'");
    while($row12=mysqli_fetch_array($res12)){
      $celular[]=$row12['celular'];
    };

    $r1 = mysqli_query($con, "SELECT cantidad FROM cotizaciondetalle WHERE cotizacion = '$idos[0]'");
    while($ro1=mysqli_fetch_array($r1)){
      $cantidad[]=$ro1['cantidad'];
    };
    
    $r2 = mysqli_query($con, "SELECT medida FROM cotizaciondetalle WHERE cotizacion = '$idos[0]'");
    while($ro2=mysqli_fetch_array($r2)){
      $medida[]=$ro2['medida'];
    };

    $r3 = mysqli_query($con, "SELECT descripcion FROM cotizaciondetalle WHERE cotizacion = '$idos[0]'");
    while($ro3=mysqli_fetch_array($r3)){
      $descripcion[]=$ro3['descripcion'];
    };

    $r4 = mysqli_query($con, "SELECT precio FROM cotizaciondetalle WHERE cotizacion = '$idos[0]'");
    while($ro4=mysqli_fetch_array($r4)){
      $precio[]=$ro4['precio'];
    };

    $r5 = mysqli_query($con, "SELECT total FROM cotizaciondetalle WHERE cotizacion = '$idos[0]'");
    while($ro5=mysqli_fetch_array($r5)){
      $totalcoti[]=$ro5['total'];
    };
    
    $query= "SELECT * FROM recibos WHERE id= '{$_GET['identifier']}'";
    $response= mysqli_query($con, $query);
    $recibo= mysqli_fetch_array($response);
 
$pr=array();
$su=array();

if($descripcion[0]==NULL || $descripcion[0]==""){
 $pr[0] ="";
 $su[0] ="";
}else{
  $pr[0] = money_format('%.2n ',$precio[0]);
  $su[0] = money_format('%.2n ',$totalcoti[0]);
}
if($descripcion[1]==NULL || $descripcion[1]==""){
 $pr[1] ="";
 $su[1] ="";
}else{
  $pr[1] = money_format('%.2n ',$precio[1]);
  $su[1] = money_format('%.2n ',$totalcoti[1]);
}
if($descripcion[2]==NULL || $descripcion[2]==""){
 $pr[2] ="";
 $su[2] ="";
}else{
  $pr[2] = money_format('%.2n ',$precio[2]);
  $su[2] = money_format('%.2n ',$totalcoti[2]);
}
if($descripcion[3]==NULL || $descripcion[3]==""){
 $pr[3] ="";
 $su[3] ="";
}else{
  $pr[3] = money_format('%.2n ',$precio[3]);
  $su[3] = money_format('%.2n ',$totalcoti[3]);
}
if($descripcion[4]==NULL || $descripcion[4]==""){
 $pr[4] ="";
 $su[4] ="";
}else{
  $pr[4] = money_format('%.2n ',$precio[4]);
  $su[4] = money_format('%.2n ',$totalcoti[4]);
}
if($descripcion[5]==NULL || $descripcion[5]==""){
 $pr[5] ="";
 $su[5] ="";
}else{
  $pr[5] = money_format('%.2n ',$precio[5]);
  $su[5] = money_format('%.2n ',$totalcoti[5]);
}
if($descripcion[6]==NULL || $descripcion[6]==""){
 $pr[6] ="";
 $su[6] ="";
}else{
  $pr[6] = money_format('%.2n ',$precio[6]);
  $su[6] = money_format('%.2n ',$totalcoti[6]);
}
if($descripcion[7]==NULL || $descripcion[7]==""){
 $pr[7] ="";
 $su[7] ="";
}else{
  $pr[7] = money_format('%.2n ',$precio[7]);
  $su[7] = money_format('%.2n ',$totalcoti[7]);
}
if($descripcion[8]==NULL || $descripcion[8]==""){
 $pr[8] ="";
 $su[8] ="";
}else{
  $pr[8] = money_format('%.2n ',$precio[8]);
  $su[8] = money_format('%.2n ',$totalcoti[8]);
}
if($descripcion[9]==NULL || $descripcion[9]==""){
 $pr[9] ="";
 $su[9] ="";
}else{
  $pr[9] = money_format('%.2n ',$precio[9]);
  $su[9] = money_format('%.2n ',$totalcoti[9]);
}
if($descripcion[10]==NULL || $descripcion[10]==""){
 $pr[10] ="";
 $su[10] ="";
}else{
  $pr[10] = money_format('%.2n ',$precio[10]);
  $su[10] = money_format('%.2n ',$totalcoti[10]);
}
if($descripcion[11]==NULL || $descripcion[11]==""){
 $pr[11] ="";
 $su[11] ="";
}else{
  $pr[11] = money_format('%.2n ',$precio[11]);
  $su[11] = money_format('%.2n ',$totalcoti[11]);
}
if($descripcion[12]==NULL || $descripcion[12]==""){
 $pr[12] ="";
 $su[12] ="";
}else{
  $pr[12] = money_format('%.2n ',$precio[12]);
  $su[12] = money_format('%.2n ',$totalcoti[12]);
}
if($descripcion[13]==NULL || $descripcion[13]==""){
 $pr[13] ="";
 $su[13] ="";
}else{
  $pr[13] = money_format('%.2n ',$precio[13]);
  $su[13] = money_format('%.2n ',$totalcoti[13]);
}
if($descripcion[14]==NULL || $descripcion[14]==""){
 $pr[14] ="";
 $su[14] ="";
}else{
  $pr[14] = money_format('%.2n ',$precio[14]);
  $su[14] = money_format('%.2n ',$totalcoti[14]);
}
if($descripcion[14]==NULL || $descripcion[14]==""){
 $pr[14] ="";
 $su[14] ="";
}else{
  $pr[14] = money_format('%.2n ',$precio[14]);
  $su[14] = money_format('%.2n ',$totalcoti[14]);
}
if($descripcion[15]==NULL || $descripcion[15]==""){
 $pr[15] ="";
 $su[15] ="";
}else{
  $pr[15] = money_format('%.2n ',$precio[15]);
  $su[15] = money_format('%.2n ',$totalcoti[15]);
}

class PDF extends FPDF
{
// Cabecera de página
function Header()
{

//Logo
    $this->Image('http://odin.nextcam.com.mx/dist/img/logo.png',10,8,50,0,'','www.nextcam.com.mx');
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha

    $this->Cell(70);
    // Título
    $this->Cell(50,10,utf8_decode('RECIBO'),1,1,'C');
    $this->Cell(70);
    $this->SetFont('Arial','B',10);
    $this->Cell(50,10,utf8_decode('Suc. Lázaro Cárdenas'),1,0,'C');
    // Salto de línea
    $this->Ln(20);
}
 
// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    //$this->AliasNbPages();
    //$this->Write(5,$this->PageNo().'/{nb}');
  $this->AddLink();
  $this->Cell(5,10,'www.nextcam.com.mx',0,0,'L');
   $this->SetFont('Arial','I',8);
 // $this->Cell(0,10,utf8_decode('Página '.$this->PageNo().' de {nb}'),0,0,'C' );

}
}
 
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->SetAutoPageBreak(true);
$pdf->SetFont('Arial','',10);
$pdf->Cell(10);
$pdf->Cell(0,0,utf8_decode('CALZ. LAZARO CARDENAS #197, REVOLUCION, 94295 VERACRUZ, VER.'),0,1,'C');
$pdf->Ln(5);
$pdf->Cell(0,0,utf8_decode('CEL.2293300457  TEL.2295892809'),0,1,'C');
$pdf->Ln(5);
$pdf->Cell(0,0,utf8_decode('CÁMARAS DE SEGURIDAD - ALARMAS - CERCOS ELÉCTRICOS'),0,1,'C');
$pdf->Ln(5);
$pdf->Cell(0,0,utf8_decode(' INTERCOMUNICACIÓN RESIDENCIAL - REDES'),0,1,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','BU',10);
$pdf->Cell(65.33,0,utf8_decode('CLIENTE: '.strtoupper ($nombre[0]).' '.strtoupper ($apaterno[0]).''),0,0,'L');
$pdf->Cell(65.33,0,utf8_decode('TELEFONO: ' .$celular[0].''),0,0,'C');
$pdf->Cell(65.33,0,utf8_decode('FOLIO: RNXT'.$idos[0].''),0,1,'R');
$pdf->SetFont('Arial','',10);
$pdf->Ln(5);
$pdf->Cell(130.66,0,utf8_decode('DIRECCION: '.$fecha[0].''),0,0,'L');
$pdf->Cell(65.33,0,utf8_decode('FECHA: '.strtoupper ($cond[0]).''),0,1,'C');

$pdf->Ln(5);
$pdf->Cell(65.33,0,utf8_decode('CORREO: '.strtoupper ($token).' '.strtoupper ($apaternot[0]).''),0,0,'L');
$pdf->Cell(65.33,0,utf8_decode('PLAZO: '.date("d-m-Y",strtotime($vali[0])).''),0,1,'C');
$pdf->Ln(10);
$pdf->Cell(0,0,utf8_decode('DESCRIPCION: '),0,1,'C');
$pdf->Ln(5);
//$pdf->MultiCell(0,20,utf8_decode(strtoupper($recibo['descripcion'])),1);
$pdf->MultiCell(0,8,utf8_decode(strtoupper("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id iaculis mi, eu laoreet nunc. Donec mi nunc, volutpat vel dui eget, cursus auctor ipsum. Donec a neque diam. Maecenas accumsan lacus ac nisi placerat volutpat. Morbi vitae lobortis lorem. Sed sit amet suscipit metus. Phasellus ornare ligula vel lacinia malesuada. Fusce quis risus et velit pulvinar sagittis in sed lectus. In aliquet lobortis ante. Sed quis velit est. Fusce sit amet hendrerit lacus, at cursus magna. ")),1);
$pdf->Ln(10);
$pdf->Cell(0,0,utf8_decode('DATOS DE PAGO: '),0,1,'C');
//CABECERA GENERAL
$pdf->Ln(5);
$pdf->SetFont('Arial','BU',10);
$pdf->Cell(49,0,utf8_decode('TOTAL DE PROYECTO: '),0,0,'L');
$pdf->Cell(49,0,utf8_decode($recibo['total']),0,0,'C');
$pdf->Cell(49,0,utf8_decode('FORMA DE PAGO:'),0,0,'C');

// Obtener la forma de pago (descripcion)
$response= mysqli_query($con, "SELECT descripcion FROM fpago WHERE id= '{$recibo['fdepago']}'");
$formaPago= mysqli_fetch_array($response);

$pdf->Cell(49,0,utf8_decode($formaPago['descripcion']),0,1,'R');
$pdf->Ln(5);
$pdf->SetFont('Arial','',10);
$pdf->Cell(49,0,utf8_decode('ABONO: '),0,0,'L');
$pdf->Cell(49,0,utf8_decode($recibo['abono']),0,0,'C');
$pdf->Cell(49,0,utf8_decode('RESTANTE:'),0,0,'C');
$pdf->Cell(49,0,utf8_decode($recibo['restante']),0,1,'R');
$pdf->Ln(5);
$pdf->SetFont('Arial','',10);
$pdf->Cell(49,0,utf8_decode('CANTIDAD: '),0,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(49,0,utf8_decode(strtoupper($recibo['totaldes'])),0,1,'L');

$pdf->Ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,0,utf8_decode('AVISO DE CONFORMIDAD'),0,1,'C');
$pdf->Ln(3);
$pdf->SetFont('Arial','',7);
$pdf->MultiCell(0,5,utf8_decode('Mediante el presente documento, se deja en constancia que se ha recibido satisfactoriamente de NEXTCAM los servicios brindados por el instalador, servicios que corresponden al 100% de las actividades. Así como estoy de acuerdo que  la garantía se invalidara en las siguientes condiciones: 1.1 El equipo fue abierto por personal ajeno a NEXTCAM  1.2 El equipo se encuentra en condiciones inadecuadas. 1.3 El equipo se utilizó para fines inapropiados 1.4 El equipo no constaba con protección contra sobretensiones. 1.5 La instalación eléctrica  se encuentra en mal estado. El equipo no cuenta con protección de datos. La garantía de configuración DDNS sólo es válida si la pérdida es causa del servidor. NEXTCAM, con domicilio en la Avenida Centenario Benito Juárez #481, Colonia Revolución, Boca del Río, Veracruz. Código postal 91296, teléfono 2293-30-04-57 , es responsable del tratamiento de sus datos personales. Los datos personales que solicitamos serán utilizados para proveerle los servicios y productos que nos ha solicitado, decidir su incorporación a nuestro grupo de clientes, ofrecerle ofertas, promociones, capacitación, apoyo, información sobre cambios de los productos y novedades tecnológicas, así como para contactarlo con fines de obtener su evaluación de calidad de nuestros servicios. Usted tiene derecho de acceder, rectificar y cancelar sus datos personales, así como de oponerse al tratamiento de los mismos o revocar el consentimiento, que para tal fin, nos haya otorgado. Así mismo, cabe mencionar que por medidas de seguridad es recomendable cambiar de contraseña los dispositivos que NEXTCAM ofrece, para brindarle mayor confianza con nuestro servicio. Estoy de acuerdo que si se presenta alguna falla diferente a la anterior reparada, queda exenta a garantía. Cabe mencionar que ningún equipo queda exento de futuras fallas, por lo que se recomienda realizar mantenimiento por lo menos cada 3 meses. '));
$pdf->Ln(15);

$pdf->Cell(65.33,0,'',0,0,'L');
$pdf->Cell(65.33,0,'________________________________________________',0,0,'C');
$pdf->Cell(65.33,0,utf8_decode(''),0,1,'R');
$pdf->Ln(5);
$pdf->Cell(65.33,0,'',0,0,'L');
$pdf->Cell(65.33,0,'Recibe Arturo Nextle',0,0,'C');
$pdf->Cell(65.33,0,utf8_decode(''),0,1,'R');










//TOTALES
$pdf->Image("http://odin.nextcam.com.mx/dist/img/footer.PNG",9,258,196,10);


$pdf->Ln(5);

  

//$message  = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office"><head><meta charset="UTF-8"><meta content="width=device-width, initial-scale=1" name="viewport"><meta name="x-apple-disable-message-reformatting"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta content="telephone=no" name="format-detection"><title>Cotizaci&oacute;n Nextcam</title> <!--[if (mso 16)]><style type="text/css">     a {text-decoration: none;}     </style><![endif]--> <!--[if gte mso 9]><style>sup { font-size: 100% !important; }</style><![endif]--> <!--[if gte mso 9]><xml> <o:OfficeDocumentSettings> <o:AllowPNG></o:AllowPNG> <o:PixelsPerInch>96</o:PixelsPerInch> </o:OfficeDocumentSettings> </xml><![endif]--> <!--[if !mso]><!-- --><link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet"> <!--<![endif]--><style type="text/css">.rollover:hover .rollover-first {	max-height:0px!important;	display:none!important;}.rollover:hover .rollover-second {	max-height:none!important;	display:block!important;}#outlook a {	padding:0;}.es-button {	mso-style-priority:100!important;	text-decoration:none!important;}a[x-apple-data-detectors] {	color:inherit!important;	text-decoration:none!important;	font-size:inherit!important;	font-family:inherit!important;	font-weight:inherit!important;	line-height:inherit!important;}.es-desk-hidden {	display:none;	float:left;	overflow:hidden;	width:0;	max-height:0;	line-height:0;	mso-hide:all;}.es-button-border:hover {	border-style:solid solid solid solid!important;	background:#0b317e!important;	border-color:#42d159 #42d159 #42d159 #42d159!important;}@media only screen and (max-width:600px) {.st-br { padding-left:10px!important; padding-right:10px!important } p, ul li, ol li, a { line-height:150%!important } h1 { font-size:30px!important; text-align:center; line-height:120%!important } h2 { font-size:26px!important; text-align:center; line-height:120%!important } h3 { font-size:20px!important; text-align:center; line-height:120%!important } h1 a { text-align:center } .es-header-body h1 a, .es-content-body h1 a, .es-footer-body h1 a { font-size:30px!important } h2 a { text-align:center } .es-header-body h2 a, .es-content-body h2 a, .es-footer-body h2 a { font-size:26px!important } h3 a { text-align:center } .es-header-body h3 a, .es-content-body h3 a, .es-footer-body h3 a { font-size:20px!important } .es-menu td a { font-size:14px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:16px!important } .es-content-body p, .es-content-body ul li, .es-content-body ol li, .es-content-body a { font-size:16px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:14px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } .es-adaptive table, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0!important } .es-m-p0r { padding-right:0!important } .es-m-p0l { padding-left:0!important } .es-m-p0t { padding-top:0!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden { width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } tr.es-desk-hidden { display:table-row!important } table.es-desk-hidden { display:table!important } td.es-desk-menu-hidden { display:table-cell!important } .es-menu td { width:1%!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } .es-m-p5 { padding:5px!important } .es-m-p5t { padding-top:5px!important } .es-m-p5b { padding-bottom:5px!important } .es-m-p5r { padding-right:5px!important } .es-m-p5l { padding-left:5px!important } .es-m-p10 { padding:10px!important } .es-m-p10t { padding-top:10px!important } .es-m-p10b { padding-bottom:10px!important } .es-m-p10r { padding-right:10px!important } .es-m-p10l { padding-left:10px!important } .es-m-p15 { padding:15px!important } .es-m-p15t { padding-top:15px!important } .es-m-p15b { padding-bottom:15px!important } .es-m-p15r { padding-right:15px!important } .es-m-p15l { padding-left:15px!important } .es-m-p20 { padding:20px!important } .es-m-p20t { padding-top:20px!important } .es-m-p20r { padding-right:20px!important } .es-m-p20l { padding-left:20px!important } .es-m-p25 { padding:25px!important } .es-m-p25t { padding-top:25px!important } .es-m-p25b { padding-bottom:25px!important } .es-m-p25r { padding-right:25px!important } .es-m-p25l { padding-left:25px!important } .es-m-p30 { padding:30px!important } .es-m-p30t { padding-top:30px!important } .es-m-p30b { padding-bottom:30px!important } .es-m-p30r { padding-right:30px!important } .es-m-p30l { padding-left:30px!important } .es-m-p35 { padding:35px!important } .es-m-p35t { padding-top:35px!important } .es-m-p35b { padding-bottom:35px!important } .es-m-p35r { padding-right:35px!important } .es-m-p35l { padding-left:35px!important } .es-m-p40 { padding:40px!important } .es-m-p40t { padding-top:40px!important } .es-m-p40b { padding-bottom:40px!important } .es-m-p40r { padding-right:40px!important } .es-m-p40l { padding-left:40px!important } a.es-button, button.es-button { font-size:16px!important; display:block!important; border-left-width:0px!important; border-right-width:0px!important } }</style></head>';
   

   
//$message .= '<body style="width:100%;font-family:roboto, "helvetica neue", helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0"><div class="es-wrapper-color" style="background-color:#FFFFFF"> <!--[if gte mso 9]><v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t"> <v:fill type="tile" color="#ffffff"></v:fill> </v:background><![endif]--><table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#FFFFFF"><tr><td valign="top" style="padding:0;Margin:0"><table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%"><tr><td align="center" bgcolor="#ffffff" style="padding:0;Margin:0;background-color:#FFFFFF"><table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"><tr><td align="left" style="Margin:0;padding-top:10px;padding-bottom:15px;padding-left:30px;padding-right:30px"><table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"><tr><td align="center" valign="top" style="padding:0;Margin:0;width:540px"><table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"><tr><td align="center" style="padding:0;Margin:0;font-size:0px"><img src="http://odin.nextcam.com.mx/servicios/15601613493199378.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="195" height="179"></td>
//</tr></table></td></tr></table></td></tr></table></td>
//</tr></table><table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%"><tr><td align="center" bgcolor="#ffffff" style="padding:0;Margin:0;background-color:#FFFFFF"><table bgcolor="transparent" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"><tr><td align="left" style="Margin:0;padding-bottom:10px;padding-top:20px;padding-left:20px;padding-right:20px"><table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"><tr><td align="center" valign="top" style="padding:0;Margin:0;width:560px"><table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"><tr><td align="left" style="padding:0;Margin:0;padding-bottom:10px"><h1 style="Margin:0;line-height:36px;mso-line-height-rule:exactly;font-family:roboto, "helvetica neue", helvetica, arial, sans-serif;font-size:30px;font-style:normal;font-weight:bold;color:#212121">A Quien Corresponda</h1>
//</td></tr><tr><td align="left" style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:roboto, "helvetica neue", helvetica, arial, sans-serif;line-height:24px;color:#131313;font-size:16px">Por medio de la presente, le hago llegar de manera adjunta la cotizaci&oacute;n solicitada<br><br>Cualquier duda o comentario estamos en la mejor disposici&oacute;n.&nbsp;</p></td></tr></table></td></tr></table></td>
//</tr><tr><td class="es-m-p15t es-m-p0b es-m-p0r es-m-p0l" align="left" style="padding:0;Margin:0;padding-top:15px"><table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"><tr><td align="center" valign="top" style="padding:0;Margin:0;width:600px"><table cellpadding="0" cellspacing="0" width="100%" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"><tr><td align="center" style="padding:0;Margin:0;font-size:0px"><img class="adapt-img" src="http://odin.nextcam.com.mx/servicios/60131615415800862.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="600" height="190"></td></tr></table></td></tr></table></td></tr></table></td>
//</tr></table><table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%"><tr><td align="center" bgcolor="#ffffff" style="padding:0;Margin:0;background-color:#FFFFFF"><table bgcolor="#ffffff" class="es-content-body" align="center" cellpadding="0" cellspacing="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"><tr><td class="es-m-p40t es-m-p40b es-m-p20r es-m-p20l" align="left" style="padding:0;Margin:0;padding-top:40px;padding-bottom:40px"><table cellpadding="0" cellspacing="0" width="100%" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"><tr><td align="center" valign="top" style="padding:0;Margin:0;width:600px"><table cellpadding="0" cellspacing="0" width="100%" bgcolor="#f0f3fe" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;background-color:#F0F3FE;border-radius:20px" role="presentation"><tr><td align="center" style="padding:0;Margin:0;font-size:0"><table cellpadding="0" cellspacing="0" class="es-table-not-adapt es-social" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"><tr><td align="center" valign="top" style="padding:0;Margin:0;padding-right:10px"><a target="_blank" href="https://www.facebook.com/NextcamVer/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#2CB543;font-size:16px"><img src="http://odin.nextcam.com.mx/servicios/facebook-circle-colored.png" alt="Fb" title="Facebook" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td>
//<td align="center" valign="top" style="padding:0;Margin:0;padding-right:10px"><a target="_blank" href="https://www.youtube.com/channel/UCK-ifVOOE9m3hwGSH2p6NTg" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#2CB543;font-size:16px"><img src="http://odin.nextcam.com.mx/servicios/youtube-circle-colored.png" alt="Yt" title="Youtube" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td>
//<td align="center" valign="top" style="padding:0;Margin:0;padding-right:10px"><a target="_blank" href="https://instagram.com/nextcamver/" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#2CB543;font-size:16px"><img src="http://odin.nextcam.com.mx/servicios/instagram-circle-colored.png" alt="Ig" title="Instagram" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td><td align="center" valign="top" style="padding:0;Margin:0"><a target="_blank" href="https://nextcam.com.mx" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#2CB543;font-size:16px"><img src="http://odin.nextcam.com.mx/servicios/globe-circle-colored.png" alt="World" title="World" width="32" height="32" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a></td>
//</tr></table></td></tr><tr><td align="center" style="padding:20px;Margin:0;font-size:0"><table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"><tr><td style="padding:0;Margin:0;border-bottom:1px solid #CCCCCC;background:none;height:1px;width:100%;margin:0px"></td></tr></table></td>
//</tr><tr><td style="padding:0;Margin:0"><table cellpadding="0" cellspacing="0" width="100%" class="es-menu" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px"><tr class="links"><td align="center" valign="top" width="50%" id="esd-menu-id-0" style="Margin:0;padding-left:5px;padding-right:5px;padding-top:0px;padding-bottom:0px;border:0"><a target="_blank" href="" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;display:block;color:#333333;font-size:16px">Calz. L&aacute;zaro C&aacute;rdenas #197, Revoluci&oacute;n, 94295, Veracruz, Ver.</a></td>
//<td align="center" valign="top" width="50%" id="esd-menu-id-1" style="Margin:0;padding-left:5px;padding-right:5px;padding-top:0px;padding-bottom:0px;border:0"><a target="_blank" href="" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;display:block;color:#333333;font-size:16px">Centenario Benito Ju&aacute;rez #481, Revoluci&oacute;n, 94296, Veracruz, Ver.</a></td></tr></table></td></tr></table></td></tr></table></td></tr></table></td></tr></table></td></tr></table></div></body></html>
// ';




//$doc = $pdf->Output('', 'S');
//$mail->CharSet = 'UTF-8';
// haciendo referencia a la clase phpmailer
//require '../phpmailer/class.phpmailer.php';
 
//$mail = new PHPMailer();
//$mail->isSMTP();
//$mail->SMTPDebug = 2;
//$mail->Host = 'smtp.hostinger.mx';
//$mail->Port = 587;
//$mail->SMTPAuth = true;
//$mail->Username = 'ventas@nextcam.com.mx';
//$mail->Password = 'VFGgyF2tJN';
//$mail->From = 'ventas@nextcam.com.mx';
//$mail->FromName = 'Ventas Nextcam';
//$mail->Subject = 'Cotizacion Nextcam '.date('d.m.y');
//$mail->Body = utf8_decode('Le hago llegar de manera adjunta la cotización solicitada.');
//$mail->AddAddress($correo[0]);
//$mail->addCC('gerencia@nextcam.com.mx');
//$mail->Body = $message;
//$mail->AltBody = $message;
// definiendo el adjunto 
//$mail->AddStringAttachment($doc, 'Cotizacion'.$idos[0].'.pdf', 'base64', 'application/pdf');
//$mail->AddAttachment('fcoti.png');

// enviando
//if($mail->Send()){
  
  $pdf->Output('I','COTIZACION.pdf');
//}else{
// echo "<script type=\"text/javascript\">alert(\"Hubo un error al enviar el correo al destino marcado\");window.location = 'cotizacionesr.php';</script>";
//}
 ?>