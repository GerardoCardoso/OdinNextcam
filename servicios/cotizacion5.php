<?php 
$var =$_GET['opcion'];
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

    $sql1="SELECT fecha FROM cotizacion WHERE id = '$var'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $fecha[]=$row1['fecha'];
    };
    $sql1="SELECT condpago FROM cotizacion WHERE id = '$var'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $cond[]=$row1['condpago'];
    };
    $sql1="SELECT tiempoentrega FROM cotizacion WHERE id = '$var'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $tentrega[]=$row1['tiempoentrega'];
    };
    $sql1="SELECT validez FROM cotizacion WHERE id = '$var'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $vali[]=$row1['validez'];
    };
    $sql1="SELECT nota FROM cotizacion WHERE id = '$var'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $nota[]=$row1['nota'];
    };
   $sql1="SELECT subtotal FROM cotizacion WHERE id = '$var'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $subototal[]=$row1['subtotal'];
    };
   $sql1="SELECT anticipo FROM cotizacion WHERE id = '$var'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $anticipo[]=$row1['anticipo'];
    };
   $sql1="SELECT descuento FROM cotizacion WHERE id = '$var'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $descuento[]=$row1['descuento'];
    };
   $sql1="SELECT total FROM cotizacion WHERE id = '$var'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $total[]=$row1['total'];
    };
    $sql1="SELECT cliente FROM cotizacion WHERE id = '$var'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $cliente[]=$row1['cliente'];
    };

 $sql1="SELECT useralta FROM cotizacion WHERE id = '$var'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $user[]=$row1['useralta'];
    };

$sql1="SELECT nombre FROM usuarios where id = '$user[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $nombret[]=$row1['nombre'];
    };
    $sql2="SELECT appaterno FROM usuarios where id = '$user[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $apaternot[]=$row2['appaterno'];
    };  
$token = strtok($nombret[0], " "); 
 //cliente busqueda




    $sql1="SELECT nombre FROM clientes where id = '$cliente[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $nombre[]=$row1['nombre'];
    };
    $sql2="SELECT appaterno FROM clientes where id = '$cliente[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $apaterno[]=$row2['appaterno'];
    };  
     $sql12="SELECT celular FROM clientes where id = '$cliente[0]'";
    $res12 = mysqli_query($con,$sql12);
    while($row12=mysqli_fetch_array($res12)){
      $celular[]=$row12['celular'];
    };

  $s1="SELECT cantidad FROM cotizaciondetalle WHERE cotizacion = '$var'";
    $r1 = mysqli_query($con,$s1);
    while($ro1=mysqli_fetch_array($r1)){
      $cantidad[]=$ro1['cantidad'];
    };
    $s2="SELECT medida FROM cotizaciondetalle WHERE cotizacion = '$var'";
    $r2 = mysqli_query($con,$s2);
    while($ro2=mysqli_fetch_array($r2)){
      $medida[]=$ro2['medida'];
    };
   $s3="SELECT descripcion FROM cotizaciondetalle WHERE cotizacion = '$var'";
    $r3 = mysqli_query($con,$s3);
    while($ro3=mysqli_fetch_array($r3)){
      $descripcion[]=$ro3['descripcion'];
    };
     $s4="SELECT precio FROM cotizaciondetalle WHERE cotizacion = '$var'";
    $r4 = mysqli_query($con,$s4);
    while($ro4=mysqli_fetch_array($r4)){
      $precio[]=$ro4['precio'];
    };
  $s5="SELECT total FROM cotizaciondetalle WHERE cotizacion = '$var'";
    $r5 = mysqli_query($con,$s5);
    while($ro5=mysqli_fetch_array($r5)){
      $totalcoti[]=$ro5['total'];
    };
 
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
    $this->Cell(50,10,utf8_decode('COTIZACION'),1,1,'C');  
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
$pdf->Ln(5);
$pdf->SetFont('Arial','BU',10);
$pdf->Cell(65.33,0,utf8_decode('ATENCION A: '.strtoupper ($nombre[0]).' '.strtoupper ($apaterno[0]).''),0,0,'L');
$pdf->Cell(65.33,0,utf8_decode('TELEFONO: ' .$celular[0].''),0,0,'C');
$pdf->Cell(65.33,0,utf8_decode('FOLIO: NXT'.$var.''),0,1,'R');
$pdf->SetFont('Arial','',10);
$pdf->Ln(5);
$pdf->Cell(65.33,0,utf8_decode('FECHA: '.$fecha[0].''),0,0,'L');
$pdf->Cell(65.33,0,utf8_decode('CONDICION DE PAGO: '.strtoupper ($cond[0]).''),0,0,'C');
$pdf->Cell(65.33,0,utf8_decode('TIEMPO DE ENTREGA: '.strtoupper ($tentrega[0]).''),0,1,'R');
$pdf->Ln(5);
$pdf->Cell(65.33,0,utf8_decode('ATENDIDO POR: '.strtoupper ($token).' '.strtoupper ($apaternot[0]).''),0,0,'L');
$pdf->Cell(65.33,0,utf8_decode('VALIDEZ: '.date("d-m-Y",strtotime($vali[0])).''),0,1,'C');
$pdf->Ln(5);
$pdf->Cell(0,0,utf8_decode('NOTA: '),0,1,'C');
$pdf->Ln(2);
$pdf->SetFont('Arial','',8);
$pdf->MultiCell(0,5,utf8_decode(strtoupper ($nota[0])),1);
$pdf->Ln(4);
//CABECERA GENERAL
$pdf->Cell(196,6,utf8_decode('COTIZACION'),1,1,'C');
//CABECERA
$pdf->Cell(19.2,6,utf8_decode('CANTIDAD'),1,0,'C');
$pdf->Cell(17.2,6,utf8_decode('MEDIDA'),1,0,'C');
$pdf->Cell(111.2,6,utf8_decode('DESCRIPCION'),1,0,'C');
$pdf->Cell(19.2,6,utf8_decode('PRECIO'),1,0,'C');
$pdf->Cell(29.2,6,utf8_decode('SUBTOTAL'),1,1,'C');
//FIN DE CABECERA
$pdf->Cell(19.2,6,utf8_decode($cantidad[0]),1,0,'C');
$pdf->Cell(17.2,6,utf8_decode($medida[0]),1,0,'C');
$pdf->Cell(111.2,6,utf8_decode($descripcion[0]),1,0,'C');
$pdf->Cell(19.2,6,utf8_decode($pr[0]),1,0,'C');
$pdf->Cell(29.2,6,utf8_decode($su[0]),1,1,'C');
$pdf->Cell(19.2,6,utf8_decode($cantidad[1]),1,0,'C');
$pdf->Cell(17.2,6,utf8_decode($medida[1]),1,0,'C');
$pdf->Cell(111.2,6,utf8_decode($descripcion[1]),1,0,'C');
$pdf->Cell(19.2,6,utf8_decode($pr[1]),1,0,'C');
$pdf->Cell(29.2,6,utf8_decode($su[1]),1,1,'C');
$pdf->Cell(19.2,6,utf8_decode($cantidad[2]),1,0,'C');
$pdf->Cell(17.2,6,utf8_decode($medida[2]),1,0,'C');
$pdf->Cell(111.2,6,utf8_decode($descripcion[2]),1,0,'C');
$pdf->Cell(19.2,6,utf8_decode($pr[2]),1,0,'C');
$pdf->Cell(29.2,6,utf8_decode($su[2]),1,1,'C');
$pdf->Cell(19.2,6,utf8_decode($cantidad[3]),1,0,'C');
$pdf->Cell(17.2,6,utf8_decode($medida[3]),1,0,'C');
$pdf->Cell(111.2,6,utf8_decode($descripcion[3]),1,0,'C');
$pdf->Cell(19.2,6,utf8_decode($pr[3]),1,0,'C');
$pdf->Cell(29.2,6,utf8_decode($su[3]),1,1,'C');
$pdf->Cell(19.2,6,utf8_decode($cantidad[4]),1,0,'C');
$pdf->Cell(17.2,6,utf8_decode($medida[4]),1,0,'C');
$pdf->Cell(111.2,6,utf8_decode($descripcion[4]),1,0,'C');
$pdf->Cell(19.2,6,utf8_decode($pr[4]),1,0,'C');
$pdf->Cell(29.2,6,utf8_decode($su[4]),1,1,'C');
$pdf->Cell(19.2,6,utf8_decode($cantidad[5]),1,0,'C');
$pdf->Cell(17.2,6,utf8_decode($medida[5]),1,0,'C');
$pdf->Cell(111.2,6,utf8_decode($descripcion[5]),1,0,'C');
$pdf->Cell(19.2,6,utf8_decode($pr[5]),1,0,'C');
$pdf->Cell(29.2,6,utf8_decode($su[5]),1,1,'C');
$pdf->Cell(19.2,6,utf8_decode($cantidad[6]),1,0,'C');
$pdf->Cell(17.2,6,utf8_decode($medida[6]),1,0,'C');
$pdf->Cell(111.2,6,utf8_decode($descripcion[6]),1,0,'C');
$pdf->Cell(19.2,6,utf8_decode($pr[6]),1,0,'C');
$pdf->Cell(29.2,6,utf8_decode($su[6]),1,1,'C');
$pdf->Cell(19.2,6,utf8_decode($cantidad[7]),1,0,'C');
$pdf->Cell(17.2,6,utf8_decode($medida[7]),1,0,'C');
$pdf->Cell(111.2,6,utf8_decode($descripcion[7]),1,0,'C');
$pdf->Cell(19.2,6,utf8_decode($pr[7]),1,0,'C');
$pdf->Cell(29.2,6,utf8_decode($su[7]),1,1,'C');
$pdf->Cell(19.2,6,utf8_decode($cantidad[8]),1,0,'C');
$pdf->Cell(17.2,6,utf8_decode($medida[8]),1,0,'C');
$pdf->Cell(111.2,6,utf8_decode($descripcion[8]),1,0,'C');
$pdf->Cell(19.2,6,utf8_decode($pr[8]),1,0,'C');
$pdf->Cell(29.2,6,utf8_decode($su[8]),1,1,'C');
$pdf->Cell(19.2,6,utf8_decode($cantidad[9]),1,0,'C');
$pdf->Cell(17.2,6,utf8_decode($medida[9]),1,0,'C');
$pdf->Cell(111.2,6,utf8_decode($descripcion[9]),1,0,'C');
$pdf->Cell(19.2,6,utf8_decode($pr[9]),1,0,'C');
$pdf->Cell(29.2,6,utf8_decode($su[9]),1,1,'C');
$pdf->Cell(19.2,6,utf8_decode($cantidad[10]),1,0,'C');
$pdf->Cell(17.2,6,utf8_decode($medida[10]),1,0,'C');
$pdf->Cell(111.2,6,utf8_decode($descripcion[10]),1,0,'C');
$pdf->Cell(19.2,6,utf8_decode($pr[10]),1,0,'C');
$pdf->Cell(29.2,6,utf8_decode($su[10]),1,1,'C');
$pdf->Cell(19.2,6,utf8_decode($cantidad[11]),1,0,'C');
$pdf->Cell(17.2,6,utf8_decode($medida[11]),1,0,'C');
$pdf->Cell(111.2,6,utf8_decode($descripcion[11]),1,0,'C');
$pdf->Cell(19.2,6,utf8_decode($pr[11]),1,0,'C');
$pdf->Cell(29.2,6,utf8_decode($su[11]),1,1,'C');
$pdf->Cell(19.2,6,utf8_decode($cantidad[12]),1,0,'C');
$pdf->Cell(17.2,6,utf8_decode($medida[12]),1,0,'C');
$pdf->Cell(111.2,6,utf8_decode($descripcion[12]),1,0,'C');
$pdf->Cell(19.2,6,utf8_decode($pr[12]),1,0,'C');
$pdf->Cell(29.2,6,utf8_decode($su[12]),1,1,'C');
$pdf->Cell(19.2,6,utf8_decode($cantidad[13]),1,0,'C');
$pdf->Cell(17.2,6,utf8_decode($medida[13]),1,0,'C');
$pdf->Cell(111.2,6,utf8_decode($descripcion[13]),1,0,'C');
$pdf->Cell(19.2,6,utf8_decode($pr[13]),1,0,'C');
$pdf->Cell(29.2,6,utf8_decode($su[13]),1,1,'C');
$pdf->Cell(19.2,6,utf8_decode($cantidad[14]),1,0,'C');
$pdf->Cell(17.2,6,utf8_decode($medida[14]),1,0,'C');
$pdf->Cell(111.2,6,utf8_decode($descripcion[14]),1,0,'C');
$pdf->Cell(19.2,6,utf8_decode($pr[14]),1,0,'C');
$pdf->Cell(29.2,6,utf8_decode($su[14]),1,1,'C');
$pdf->Cell(19.2,6,utf8_decode($cantidad[15]),1,0,'C');
$pdf->Cell(17.2,6,utf8_decode($medida[15]),1,0,'C');
$pdf->Cell(111.2,6,utf8_decode($descripcion[15]),1,0,'C');
$pdf->Cell(19.2,6,utf8_decode($pr[15]),1,0,'C');
$pdf->Cell(29.2,6,utf8_decode($su[15]),1,1,'C');
$pdf->Cell(19.2,6,utf8_decode($cantidad[16]),1,0,'C');
$pdf->Cell(17.2,6,utf8_decode($medida[16]),1,0,'C');
$pdf->Cell(111.2,6,utf8_decode($descripcion[16]),1,0,'C');
$pdf->Cell(19.2,6,utf8_decode($pr[16]),1,0,'C');
$pdf->Cell(29.2,6,utf8_decode($su[16]),1,1,'C');
//TOTALES
$pdf->Image("http://odin.nextcam.com.mx/dist/img/logoscoti.PNG",20,210,68,68);
$pdf->Cell(59.2,6,utf8_decode(''),0,0,'C');
$pdf->Cell(17.2,6,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(71.2,6,utf8_decode(''),0,0,'L');
$pdf->Cell(19.2,6,utf8_decode('SUBTOTAL'),1,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(29.2,6,utf8_decode(money_format('%.2n ',$subototal[0])),1,1,'C');
$pdf->Cell(59.2,6,utf8_decode(''),0,0,'C');
$pdf->Cell(17.2,6,utf8_decode(''),0,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(71.2,6,utf8_decode('Lic. Arturo Nextle Paredes'),0,0,'L');
$pdf->SetFont('Arial','',8);
$pdf->Cell(19.2,6,utf8_decode('DESCUENTO'),1,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(29.2,6,utf8_decode(money_format('%.2n ',$descuento[0])),1,1,'C');
$pdf->Cell(59.2,6,utf8_decode(''),0,0,'C');
$pdf->Cell(17.2,6,utf8_decode(''),0,0,'C');
$pdf->Cell(71.2,6,utf8_decode('Contacto: gerencia@nextcam.com.mx'),0,0,'L');
$pdf->SetFont('Arial','',9);
$pdf->Cell(19.2,6,utf8_decode('ANTICIPO'),1,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(29.2,6,utf8_decode(money_format('%.2n ',$anticipo[0])),1,1,'C');


$pdf->Cell(59.2,6,utf8_decode(''),0,0,'C');
$pdf->Cell(17.2,6,utf8_decode(''),0,0,'C');
$pdf->Cell(71.2,6,utf8_decode('Precios sujetos a cambios sin previo aviso'),0,0,'L');
$pdf->SetFont('Arial','',8);
$pdf->Cell(19.2,6,utf8_decode('TOTAL'),1,0,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(29.2,6,utf8_decode(money_format('%.2n ',($subototal[0]-$descuento[0])-$anticipo[0])),1,1,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(59.2,6,utf8_decode(''),0,0,'C');
$pdf->Cell(17.2,6,utf8_decode(''),0,0,'C');
$pdf->Cell(71.2,6,utf8_decode('El tiempo de entrega puede variar dependiendo del producto'),0,1,'L');
$pdf->Cell(59.2,6,utf8_decode(''),0,0,'C');
$pdf->Cell(17.2,6,utf8_decode(''),0,0,'C');
$pdf->Cell(71.2,6,utf8_decode('Para la solicitud de cualquier equipo se requiere un 50% de anticipo'),0,1,'L');
$pdf->SetFont('Arial','B',10);
$pdf->Ln(3);
$pdf->Cell(59.2,6,utf8_decode(''),0,0,'C');
$pdf->Cell(17.2,6,utf8_decode(''),0,0,'C');
$pdf->Cell(71.2,6,utf8_decode('DEPOSITOS O TRANSFERENCIAS'),0,1,'L');
$pdf->SetFont('Arial','',10);
$pdf->Cell(59.2,6,utf8_decode(''),0,0,'C');
$pdf->Cell(17.2,6,utf8_decode(''),0,0,'C');
$pdf->Cell(71.2,6,utf8_decode('BANCO: SANTANDER'),0,1,'L');
$pdf->Cell(59.2,6,utf8_decode(''),0,0,'C');
$pdf->Cell(17.2,6,utf8_decode(''),0,0,'C');
$pdf->Cell(71.2,6,utf8_decode('CUENTA: 65-50810050-8'),0,1,'L');
$pdf->Cell(59.2,6,utf8_decode(''),0,0,'C');
$pdf->Cell(17.2,6,utf8_decode(''),0,0,'C');
$pdf->Cell(71.2,6,utf8_decode('CLABE: 014905655081005081'),0,1,'L');
$pdf->Cell(59.2,6,utf8_decode(''),0,0,'C');
$pdf->Cell(17.2,6,utf8_decode(''),0,0,'C');
$pdf->Cell(71.2,6,utf8_decode('Nombre: ASUPESA SA DE CV'),0,1,'L');


$pdf->Ln(5);


  $pdf->Output('I','COTIZACION.pdf');

  











 ?>