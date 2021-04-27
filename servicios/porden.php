<?php 
session_start();
require('../fpdf/fpdf.php');
include('../conexion.php');

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
$orden=$_GET['id'];
$modelo = array();
$falla = array();
$caracteristicas = array();
$servicio = array();
$nombret = array();
$apaternot = array();
$tecnico = array();
$nombre = array();
$apaterno = array();
$amaterno = array();
$celular= array();
$direccion = array();
$colonia = array();
$numero = array();
$municipio = array();
$nmunicipio = array();
$noserie = array();
$tipodeservicio = array();
$observaciones = array();
$firma = array();
$costo = array();
 $fecalta = $ndia." de ".$mes." del ".$año;
$uno = array();
$dos = array();
$tres = array();
$cuatro = array();
$cinco = array();
$seis = array();
$siete = array();
$ocho = array();
$nueve = array();
$diez = array();
$once = array();
$doce = array();
$trece = array();
$catorce = array();
$quince = array();
$diezyseis = array();
$diezysiete = array();
$diezyocho = array();
$diezynueve = array();
$veinte = array();




$idos = array();
$fecha = array();
$cliente = array();
     $sql1="SELECT id FROM ordenservicio ORDER by ID DESC";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $idos[]=$row1['id'];
    };
    $sql1="SELECT fechaorden FROM ordenservicio WHERE id = '$idos[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $fecha[]=$row1['fechaorden'];
    };
    $sql1="SELECT cliente FROM ordenservicio WHERE id = '$idos[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $cliente[]=$row1['cliente'];
    };

 $sql1="SELECT tecnico FROM ordenservicio WHERE id = '$idos[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $tecnico[]=$row1['tecnico'];
    };

$sql1="SELECT nombre FROM usuarios where id = '$tecnico[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $nombret[]=$row1['nombre'];
    };
    $sql2="SELECT appaterno FROM usuarios where id = '$tecnico[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $apaternot[]=$row2['appaterno'];
    };  
$token = strtok($nombret[0], " "); 
 $sql2="SELECT servicio FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $servicio[]=$row2['servicio'];
    };  

 $sql2="SELECT modelo FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $modelo[]=$row2['modelo'];
    }; 
 $sql2="SELECT caracterristicas FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $caracteristicas[]=$row2['caracterristicas'];
    }; 
 $sql2="SELECT noserie FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $noserie[]=$row2['noserie'];
    }; 
 $sql2="SELECT falla FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $falla[]=$row2['falla'];
    }; 
$sql2="SELECT tipodeservicio FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $tipodeservicio[]=$row2['tipodeservicio'];
    }; 
$sql2="SELECT observaciones FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $observaciones[]=$row2['observaciones'];
    }; 
$sql2="SELECT firma FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $firma[]=$row2['firma'];
    }; 
$sql2="SELECT costo FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $costo[]=$row2['costo'];
    }; 

//----
$sql2="SELECT dvro FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $uno[]=$row2['dvro'];
    };
$sql2="SELECT coneco FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $dos[]=$row2['coneco'];
    };
$sql2="SELECT reguladorf FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $tres[]=$row2['reguladorf'];
    };

$sql2="SELECT camarasenfo FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $cuatro[]=$row2['camarasenfo'];
    };
$sql2="SELECT voltajec FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $cinco[]=$row2['voltajec'];
    };
$sql2="SELECT panelop FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $seis[]=$row2['panelop'];
    };
$sql2="SELECT sensoresf FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $siete[]=$row2['sensoresf'];
    };
$sql2="SELECT voltajeca FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $ocho[]=$row2['voltajeca'];
    };
$sql2="SELECT conecoa FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $nueve[]=$row2['conecoa'];
    };

$sql2="SELECT bfuncionando FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $diez[]=$row2['bfuncionando'];
    };
$sql2="SELECT gpso FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $once[]=$row2['gpso'];
    };
$sql2="SELECT voltajecg FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $doce[]=$row2['voltajecg'];
    };
$sql2="SELECT conecog FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $trece[]=$row2['conecog'];
    };
$sql2="SELECT cablesase FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $catorce[]=$row2['cablesase'];
    };
$sql2="SELECT chipfuncional FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $quince[]=$row2['chipfuncional'];
    };
$sql2="SELECT energizadoro FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $diezyseis[]=$row2['energizadoro'];
    };
$sql2="SELECT hilosa FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $diezysiete[]=$row2['hilosa'];
    };
$sql2="SELECT letreroscol FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $diezyocho[]=$row2['letreroscol'];
    };
$sql2="SELECT cablebcon FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $diezynueve[]=$row2['cablebcon'];
    };
$sql2="SELECT tierra FROM ordenservicio where id = '$idos[0]'";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $veinte[]=$row2['tierra'];
    };
//----




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
    $sql12="SELECT amaterno FROM clientes where id = '$cliente[0]'";
    $res12 = mysqli_query($con,$sql12);
    while($row12=mysqli_fetch_array($res12)){
      $amaterno[]=$row12['amaterno'];
    }; 
     $sql12="SELECT celular FROM clientes where id = '$cliente[0]'";
    $res12 = mysqli_query($con,$sql12);
    while($row12=mysqli_fetch_array($res12)){
      $celular[]=$row12['celular'];
    };
    $sql12="SELECT direccion FROM clientes  where id = '$cliente[0]'";
    $res12 = mysqli_query($con,$sql12);
    while($row12=mysqli_fetch_array($res12)){
      $direccion[]=$row12['direccion'];
    };
     $sql12="SELECT numero FROM clientes  where id = '$cliente[0]'";
    $res12 = mysqli_query($con,$sql12);
    while($row12=mysqli_fetch_array($res12)){
      $numero[]=$row12['numero'];
    };
    $sql12="SELECT colonia FROM clientes  where id = '$cliente[0]'";
    $res12 = mysqli_query($con,$sql12);
    while($row12=mysqli_fetch_array($res12)){
      $colonia[]=$row12['colonia'];
    };
    $sql12="SELECT municipio FROM clientes where id = '$cliente[0]'";
    $res12 = mysqli_query($con,$sql12);
    while($row12=mysqli_fetch_array($res12)){
      $municipio[]=$row12['municipio'];
    };
    $sql7="SELECT nombre_municipio FROM municipios where id = '$municipio[0]' ";
    $res7 = mysqli_query($con,$sql7);
    while($row7=mysqli_fetch_array($res7)){
      $nmunicipio[]=$row7['nombre_municipio'];
    };
if($uno[0]==0){
  $uno="X";
}else{
  $uno="/";
  
}
if($dos[0]==0){
  $dos="X";
}else{
  $dos="/";
  
}
if($tres[0]==0){
  $tres="X";
}else{
  $tres="/";
  
}
if($cuatro[0]==0){
  $cuatro="X";
}else{
  $cuatro="/";
  
}
if($cinco[0]==0){
  $cinco="X";
}else{
  $cinco="/";
  
}
//--------
if($seis[0]==0){
  $seis="X";
}else{
  $seis="/";
  
}
if($siete[0]==0){
  $siete="X";
}else{
  $siete="/";
  
}
if($ocho[0]==0){
  $ocho="X";
}else{
  $ocho="/";
  
}
if($nueve[0]==0){
  $nueve="X";
}else{
  $nueve="/";
  
}
if($diez[0]==0){
  $diez="X";
}else{
  $diez="/";
  
}
//-------
if($once[0]==0){
  $once="X";
}else{
  $once="/";
  
}
if($doce[0]==0){
  $doce="X";
}else{
  $doce="/";
  
}
if($trece[0]==0){
  $trece="X";
}else{
  $trece="/";
  
}
if($catorce[0]==0){
  $catorce="X";
}else{
  $catorce="/";
  
}
if($quince[0]==0){
  $quince="X";
}else{
  $quince="/";
  
}
//--------
if($diezyseis[0]==0){
  $diezyseis="X";
}else{
  $diezyseis="/";
  
}if($diezysiete[0]==0){
  $diezysiete="X";
}else{
  $diezysiete="/";
  
}if($diezyocho[0]==0){
  $diezyocho="X";
}else{
  $diezyocho="/";
  
}if($diezynueve[0]==0){
  $diezynueve="X";
}else{
  $diezynueve="/";
  
}if($veinte[0]==0){
  $veinte="X";
}else{
  $veinte="/";
  
}
$conteo=strlen($direccion[0]);
if($conteo>30){
  $dir = substr($direccion[0], 0,40);
  
}else{
  
  $dir=$direccion[0];
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
    $this->Cell(50,10,'Orden de Servicio',1,0,'C');
  
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
  $this->Cell(0,10,utf8_decode('Página '.$this->PageNo().' de {nb}'),0,0,'C' );

}
}
 
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
$pdf->Ln(10);
$pdf->SetAutoPageBreak(true);
$pdf->SetFont('Arial','BU',10);
$pdf->Cell(0,0,utf8_decode('DATOS GENERALES'),0,1,'L');
$pdf->Ln(5);
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,0,utf8_decode('NOMBRE DEL CLIENTE: '.strtoupper ( $nombre[0]).' '.strtoupper ( $apaterno[0]).' '.strtoupper ($amaterno[0]). ''),0,1,'L');
$pdf->Cell(0,0,utf8_decode('                   NO DE CLIENTE: '.$idos[0].''),0,1,'C');
$pdf->Cell(0,0,utf8_decode('FECHA: '.strtoupper ($fecha[0]).''),0,1,'R');
$pdf->Ln(5);
$pdf->Cell(0,0,utf8_decode('TELEFONO: '.$celular[0].''),0,1,'L');
$pdf->Cell(0,0,utf8_decode('DIRECCION: '.strtoupper ($dir).' # '.$numero[0].', '.strtoupper ($colonia[0]).', '.strtoupper ($nmunicipio[0]).''),0,1,'R');
$pdf->Ln(5);
$pdf->Cell(0,0,utf8_decode('TECNICO QUE VISITA: '.strtoupper ($token).' '.strtoupper ($apaternot[0]).'' ),0,1,'L');
$pdf->Cell(0,0,utf8_decode('                   SERVICIO REALIZADO: '.strtoupper ($servicio[0]).''),0,1,'C');
$pdf->Cell(0,0,utf8_decode('NUMERO DE ORDEN: '.strtoupper ($idos[0]).''),0,1,'R');
$pdf->Ln(10);
$pdf->SetFont('Arial','BU',10);
$pdf->Cell(0,0,utf8_decode('DESCRIPCION DEL SERVICIO'),0,1,'L');
$pdf->Ln(5);
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,0,utf8_decode('MODELO: '.strtoupper ( $modelo[0]).''),0,1,'L');
$pdf->Cell(0,0,utf8_decode('CARACTERISTICAS: '.strtoupper ( $caracteristicas[0]).''),0,1,'C');
$pdf->Cell(0,0,utf8_decode('NO. SERIE: '.strtoupper ( $noserie[0]).''),0,1,'R');
$pdf->Ln(5);
$pdf->Cell(0,0,utf8_decode('FALLA: '.strtoupper ( $falla[0]).''),0,1,'L');
$pdf->Ln(5);
$pdf->Cell(0,0,utf8_decode('TIPO DE SERVICIO: '.strtoupper ( $tipodeservicio[0]).''),0,1,'L');
$pdf->Ln(10);
$pdf->SetFont('Arial','BU',10);
$pdf->Cell(0,0,utf8_decode('CHECK LIST'),0,1,'C');
$pdf->Ln(5);
//Encabezado de la tabla
//$pdf->SetFillColor(232,232,230);
//$pdf->SetFont('Times','B ',14);
$pdf->SetFont('Arial','',12);
$pdf->Cell(49,8,'CCTV',1,0,'C');
$pdf->Cell(49,8,'ALARMA',1,0,'C');
$pdf->Cell(49,8,'GPS',1,0,'C');
$pdf->Cell(49,8,'CERCO ELECTRICO',1,1,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(41,8,'DVR OPERANDO',1,0,'L');
$pdf->Cell(8,8,''.$uno[0].'',1,0,'C');
$pdf->Cell(41,8,'PANEL OPERANDO',1,0,'L');
$pdf->Cell(8,8,''.$seis[0].'',1,0,'C');
$pdf->Cell(41,8,'GPS OPERANDO',1,0,'L');
$pdf->Cell(8,8,''.$once[0].'',1,0,'C');
$pdf->Cell(41,8,'ENERGIZADOR OPER',1,0,'L');
$pdf->Cell(8,8,''.$diezyseis[0].'',1,1,'C');
$pdf->Cell(41,8,'CONEXIONES CORRECTAS',1,0,'L');
$pdf->Cell(8,8,''.$dos[0].'',1,0,'C');
$pdf->Cell(41,8,'SENSORES FUNCIONANDO',1,0,'L');
$pdf->Cell(8,8,''.$siete[0].'',1,0,'C');
$pdf->Cell(41,8,'VOLTAJE CORRECTO',1,0,'L');
$pdf->Cell(8,8,''.$doce[0].'',1,0,'C');
$pdf->Cell(41,8,'HILOS ASEGURADOS',1,0,'L');
$pdf->Cell(8,8,''.$diezysiete[0].'',1,1,'C');
$pdf->Cell(41,8,'REGULADOR FUNCIONAL',1,0,'L');
$pdf->Cell(8,8,''.$tres[0].'',1,0,'C');
$pdf->Cell(41,8,'VOLTAJE CORRECTO',1,0,'L');
$pdf->Cell(8,8,''.$ocho[0].'',1,0,'C');
$pdf->Cell(41,8,'CONEXIONES CORRECTAS',1,0,'L');
$pdf->Cell(8,8,''.$trece[0].'',1,0,'C');
$pdf->Cell(41,8,'LETREROS COLOCADOS',1,0,'L');
$pdf->Cell(8,8,''.$diezyocho[0].'',1,1,'C');
$pdf->Cell(41,8,'CAMARAS ENFOCADAS',1,0,'L');
$pdf->Cell(8,8,''.$cuatro[0].'',1,0,'C');
$pdf->Cell(41,8,'CONEXIONES CORRECTAS',1,0,'L');
$pdf->Cell(8,8,''.$nueve[0].'',1,0,'C');
$pdf->Cell(41,8,'CABLES ASEGURADOS',1,0,'L');
$pdf->Cell(8,8,''.$catorce[0].'',1,0,'C');
$pdf->Cell(41,8,'BUJIA CONTINUA',1,0,'L');
$pdf->Cell(8,8,''.$diezynueve[0].'',1,1,'C');
$pdf->Cell(41,8,'VOLTAJE CORRECTO',1,0,'L');
$pdf->Cell(8,8,''.$cinco[0].'',1,0,'C');
$pdf->Cell(41,8,'BATERIAS FUNCIONANDO',1,0,'L');
$pdf->Cell(8,8,''.$diez[0].'',1,0,'C');
$pdf->Cell(41,8,'CHIP FUNCIONAL',1,0,'L');
$pdf->Cell(8,8,''.$quince[0].'',1,0,'C');
$pdf->Cell(41,8,'TIERRA ATERRIZADA',1,0,'L');
$pdf->Cell(8,8,''.$veinte[0].'',1,1,'C');

$pdf->Ln(8);

//$pdf->Line(20, 45, 210-20, 45); // 20mm from each edge
//$pdf->Line(50, 45, 210-50, 45); // 50mm from each edge


$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,0,utf8_decode('OBSERVACIONES: '),0,1,'L');
$pdf->Ln(3);
$pdf->SetFont('Arial','',8);
$pdf->MultiCell(0,5,utf8_decode(''.strtoupper ( $observaciones[0]).''));


$pdf->Ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(0,0,utf8_decode('AVISO DE CONFORMIDAD'),0,1,'C');
$pdf->Ln(3);
$pdf->Image($firma[0],32,228,22,22);
$pdf->SetFont('Arial','',7);
$pdf->MultiCell(0,5,utf8_decode('Mediante el presente documento, se deja en constancia que se ha recibido satisfactoriamente de NEXTCAM los servicios brindados por el instalador, servicios que corresponden al 100% de las actividades. Así como estoy de acuerdo que la garantía se invalidara en las siguientes condiciones: 1.1 El equipo fue abierto por personal ajeno a NEXTCAM  1.2 El equipo se encuentra en condiciones inadecuadas. 1.3 El equipo se utilizó para fines inapropiados 1.4 El equipo no constaba con protección contra sobretensiones. 1.5 La instalación eléctrica  se encuentra en mal estado. El equipo no cuenta con protección de datos. La garantía de configuración DDNS sólo es válida si la pérdida es causa del servidor. NEXTCAM, con domicilio en la Avenida Centenario Benito Juárez #481, Colonia Revolución, Boca del Río, Veracruz. Código postal 91296, teléfono 2293-30-04-57 , es responsable del tratamiento de sus datos personales. Los datos personales que solicitamos serán utilizados para proveerle los servicios y productos que nos ha solicitado, decidir su incorporación a nuestro grupo de clientes, ofrecerle ofertas, promociones, capacitación, apoyo, información sobre cambios de los productos y novedades tecnológicas, así como para contactarlo con fines de obtener su evaluación de calidad de nuestros servicios. Usted tiene derecho de acceder, rectificar y cancelar sus datos personales, así como de oponerse al tratamiento de los mismos o revocar el consentimiento, que para tal fin, nos haya otorgado. Así mismo, cabe mencionar que por medidas de seguridad es recomendable cambiar de contraseña los dispositivos que NEXTCAM ofrece, para brindarle mayor confianza con nuestro servicio. Estoy de acuerdo que si se presenta alguna falla diferente a la anterior reparada, queda exenta a garantía. Cabe mencionar que ningún equipo queda exento de futuras fallas, por lo que se recomienda realizar mantenimiento por lo menos cada 3 meses. '));
$pdf->Ln(15);
$pdf->Image($firma[0],32,228,22,22);
$pdf->Cell(0,0,'_____________________________________________________',0,1,'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,0,'$  '.number_format($costo[0], 2, '.', '').'',0,1,'R');
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,0,'_________________________________',0,1,'R');
$pdf->Ln(5);
$pdf->SetFont('Arial','',7);
$pdf->Cell(0,0,utf8_decode('Firma de conformidad'),0,1,'L');
$pdf->Cell(0,0,utf8_decode('Costo de Servicio'),0,1,'R');


$pdf->AddPage('portrait','letter');
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',10);
$pdf->Ln(10);
$pdf->SetAutoPageBreak(true);
$pdf->SetFont('Arial','B',10);
$pdf->Image($firma[0],180,218,22,22);
$pdf->Cell(0,0,utf8_decode('POLITICA DE GARANTIA'),0,1,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','',8);
$pdf->MultiCell(0,5,utf8_decode('Los productos comercializados por NEXTCAM que cuenta con domicilio en Centenario Benito Juárez No. 481 col. Revolución, Cuentan con una garantía contra defectos de fabricación variable de 6 a 12 meses de acuerdo con el producto, línea y marca.'));
$pdf->Ln(5);
$pdf->Cell(0,0,utf8_decode('Todos los períodos de días establecidos en este documento son días naturales a menos que se indique lo contrario.'),0,1,'L');
$pdf->Ln(10);
$pdf->Cell(0,0,utf8_decode('La garantía de los productos únicamente aplica para defectos de fabricación y se invalidara en caso de:'),0,1,'L');
$pdf->Ln(10);
$pdf->Cell(0,0,utf8_decode('     1. Algún componente que muestre señales de quemaduras o exceso de voltaje.'),0,1,'L');
$pdf->Ln(5);
$pdf->Cell(0,0,utf8_decode('     2. Negligencia, mal manejo.'),0,1,'L');
$pdf->Ln(5);
$pdf->Cell(0,0,utf8_decode('     4. Mutilación de cualquier cable o conector del producto.'),0,1,'L');
$pdf->Ln(5);
$pdf->Cell(0,0,utf8_decode('     5. Muestras de humedad o agua dentro del producto o alguno de sus componentes.'),0,1,'L');
$pdf->Ln(10);
$pdf->Cell(0,0,utf8_decode('En caso de Cercos Eléctricos'),0,1,'L');
$pdf->Ln(10);
$pdf->Cell(0,0,utf8_decode('     1. La garantía es de 3 meses, ya que es una barrera física expuesta a daños climatológicos y ocacionados por intento de intrusión.'),0,1,'L');
$pdf->Ln(5);
$pdf->Cell(0,0,utf8_decode('     2. Los accesorios electrónicos tienen 12 meses de garantía por defectos de fabricación.'),0,1,'L');
$pdf->Ln(10);
$pdf->MultiCell(0,5,utf8_decode('En caso de aplicar garantía NEXTCAM podrá optar por reparar el producto, hacer el cambio completo del mismo por uno idéntico o de similares características.'));
$pdf->Ln(5);
$pdf->MultiCell(0,5,utf8_decode('Los productos no electrónicos como cables, carcasas, conectores, pulpos, bobinas, etc; y fuentes de poder tipo laptop o eliminador, no cuentan con garantía.'));
$pdf->Ln(5);
$pdf->MultiCell(0,5,utf8_decode('En caso de no aplicar garantía, el CLIENTE puede optar por la repación del equipo. El costo de la reparación y mano de obra será inforamdo por escrito al distribuidor y este deberá realizar el pago de la misma previa a la reparación'));
$pdf->Ln(5);
$pdf->MultiCell(0,5,utf8_decode('Todas las reparaciones hechas por el departamento de garantías o centro de servicio cuentan con un limite de 60 días de garantía sobre la repación que se realizó.'));
$pdf->Ln(5);
$pdf->MultiCell(0,5,utf8_decode('Sujeto a los términos y condiciones de la garantía limitada en vigor en el momento de la compra, NEXTCAM reparará o reemplazará todos los productos que no cumplan con los términos previstos de cada marca, dentro del período de garantía del producto. NEXTCAM se reserva el derecho de reemplazar cualquier producto bajo garantá con un nuevo, reformado, o re manufacturado con garantía completa de equipos originales.'));
$pdf->Ln(5);
$pdf->Cell(0,0,utf8_decode('Si el producto defectuoso es de un KIT, el reemplazo se hará unicamente por la pieza o parte defectuosa.'),0,1,'L');
$pdf->Ln(5);
$pdf->Cell(0,0,utf8_decode('Los periodos de garantía varían dependiendo de la marca del producto y el tipo de equipo.'),0,1,'L');
$pdf->Ln(10);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,0,utf8_decode('Reparaciones sin Garantía.'),0,1,'L');
$pdf->Ln(10);
$pdf->SetFont('Arial','',8);
$pdf->Cell(0,0,utf8_decode('Estas reparaciones cuentan con un periodo de garantía extendida de 90 días naturales desde la fecha de envío de todos los productos.'),0,1,'L');
$pdf->Ln(5);
$pdf->MultiCell(0,5,utf8_decode('El comprador debe pagar todas las reparaciones y los costos de envío para el equipo que no tiene garantía. NEXTCAM proporcionará un presupuesto de reparación que incluye los cargos por las piezas, mano de obra y el envío.'));
$pdf->Ln(5);

$cont="SELECT count(*) FROM evidencias where orden= ' $idos[0]'";
$count = mysqli_query($con,$cont);
while($row=mysqli_fetch_array($count)){
$evidencias=$row[0];
};


if($evidencias>0&& $evidencias<=1){
  $ruta = array();
  for ($i=0; $i < $evidencias; $i++) { 
  $sql1="SELECT ruta FROM evidencias where orden= ' $idos[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $ruta[]=$row1['ruta'];
    };
    $con->close();
  }
    $pdf->AddPage('portrait','letter');
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',10);
$pdf->Ln(10);
$pdf->SetAutoPageBreak(true);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,0,utf8_decode('EVIDENCIA'),0,1,'C');
 $pdf->Ln(10);
      $pdf->Cell(65.3,65.3, $pdf->Image($ruta[0], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[1], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[2], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
// $pdf->Cell(65.3,65.3, $pdf->Image($ruta[3], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 //$pdf->Cell(65.3,65.3, $pdf->Image($ruta[4], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 //  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[5], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
  // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[6], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[7], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[8], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
  $pdf->Ln(10);


    $pdf->Output('I','ORDEN DE SERVICIO.pdf');

  

}if($evidencias>0&& $evidencias<=2){
  $ruta = array();
  for ($i=0; $i < $evidencias; $i++) { 
  $sql1="SELECT ruta FROM evidencias where orden= ' $idos[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $ruta[]=$row1['ruta'];
    };
    $con->close();
  }
    $pdf->AddPage('portrait','letter');
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',10);
$pdf->Ln(10);
$pdf->SetAutoPageBreak(true);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,0,utf8_decode('EVIDENCIA'),0,1,'C');
 $pdf->Ln(10);
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[0], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[1], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[2], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
// $pdf->Cell(65.3,65.3, $pdf->Image($ruta[3], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 //$pdf->Cell(65.3,65.3, $pdf->Image($ruta[4], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 //  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[5], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
  // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[6], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[7], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[8], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
  $pdf->Ln(10);


    $pdf->Output('I','ORDEN DE SERVICIO.pdf');

  



}
if($evidencias>0&& $evidencias<=3){
  $ruta = array();
  for ($i=0; $i < $evidencias; $i++) { 
  $sql1="SELECT ruta FROM evidencias where orden= ' $idos[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $ruta[]=$row1['ruta'];
    };
    $con->close();
  }
    $pdf->AddPage('portrait','letter');
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',10);
$pdf->Ln(10);
$pdf->SetAutoPageBreak(true);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,0,utf8_decode('EVIDENCIA'),0,1,'C');
 $pdf->Ln(10);
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[0], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[1], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[2], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
// $pdf->Cell(65.3,65.3, $pdf->Image($ruta[3], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 //$pdf->Cell(65.3,65.3, $pdf->Image($ruta[4], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 //  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[5], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
  // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[6], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[7], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[8], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
  $pdf->Ln(10);


    $pdf->Output('I','ORDEN DE SERVICIO.pdf');

  



}if($evidencias>0&& $evidencias<=4){
  $ruta = array();
  for ($i=0; $i < $evidencias; $i++) { 
  $sql1="SELECT ruta FROM evidencias where orden= ' $idos[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $ruta[]=$row1['ruta'];
    };
    $con->close();
  }
    $pdf->AddPage('portrait','letter');
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',10);
$pdf->Ln(10);
$pdf->SetAutoPageBreak(true);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,0,utf8_decode('EVIDENCIA'),0,1,'C');
 $pdf->Ln(10);
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[0], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[1], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 $pdf->Cell(65.3,65.3, $pdf->Image($ruta[2], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
 $pdf->Cell(65.3,65.3, $pdf->Image($ruta[3], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 //$pdf->Cell(65.3,65.3, $pdf->Image($ruta[4], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 //  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[5], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
  // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[6], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[7], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[8], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
  $pdf->Ln(10);


    $pdf->Output('I','ORDEN DE SERVICIO.pdf');

  



}
if($evidencias>0&& $evidencias<=5){
  $ruta = array();
  for ($i=0; $i < $evidencias; $i++) { 
  $sql1="SELECT ruta FROM evidencias where orden= ' $idos[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $ruta[]=$row1['ruta'];
    };
    $con->close();
  }
    $pdf->AddPage('portrait','letter');
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',10);
$pdf->Ln(10);
$pdf->SetAutoPageBreak(true);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,0,utf8_decode('EVIDENCIA'),0,1,'C');
 $pdf->Ln(10);
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[0], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[1], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[2], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
 $pdf->Cell(65.3,65.3, $pdf->Image($ruta[3], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 $pdf->Cell(65.3,65.3, $pdf->Image($ruta[4], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 //  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[5], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
  // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[6], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[7], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[8], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
  $pdf->Ln(10);


    $pdf->Output('I','ORDEN DE SERVICIO.pdf');

  



}if($evidencias>0&& $evidencias<=6){
  $ruta = array();
  for ($i=0; $i < $evidencias; $i++) { 
  $sql1="SELECT ruta FROM evidencias where orden= ' $idos[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $ruta[]=$row1['ruta'];
    };
    $con->close();
  }
    $pdf->AddPage('portrait','letter');
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',10);
$pdf->Ln(10);
$pdf->SetAutoPageBreak(true);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,0,utf8_decode('EVIDENCIA'),0,1,'C');
 $pdf->Ln(10);
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[0], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[1], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[2], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
 $pdf->Cell(65.3,65.3, $pdf->Image($ruta[3], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 $pdf->Cell(65.3,65.3, $pdf->Image($ruta[4], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[5], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
  // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[6], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[7], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[8], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
  $pdf->Ln(10);


    $pdf->Output('I','ORDEN DE SERVICIO.pdf');

  



}
if($evidencias>0&& $evidencias<=7){
  $ruta = array();
  for ($i=0; $i < $evidencias; $i++) { 
  $sql1="SELECT ruta FROM evidencias where orden= ' $idos[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $ruta[]=$row1['ruta'];
    };
    $con->close();
  }
    $pdf->AddPage('portrait','letter');
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',10);
$pdf->Ln(10);
$pdf->SetAutoPageBreak(true);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,0,utf8_decode('EVIDENCIA'),0,1,'C');
 $pdf->Ln(10);
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[0], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[1], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[2], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
 $pdf->Cell(65.3,65.3, $pdf->Image($ruta[3], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
$pdf->Cell(65.3,65.3, $pdf->Image($ruta[4], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
   $pdf->Cell(65.3,65.3, $pdf->Image($ruta[5], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[6], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[7], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[8], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
  $pdf->Ln(10);


    $pdf->Output('I','ORDEN DE SERVICIO.pdf');

  



}
if($evidencias>0&& $evidencias<=8){
  $ruta = array();
  for ($i=0; $i < $evidencias; $i++) { 
  $sql1="SELECT ruta FROM evidencias where orden= ' $idos[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $ruta[]=$row1['ruta'];
    };
    $con->close();
  }
    $pdf->AddPage('portrait','letter');
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',10);
$pdf->Ln(10);
$pdf->SetAutoPageBreak(true);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,0,utf8_decode('EVIDENCIA'),0,1,'C');
 $pdf->Ln(10);
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[0], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[1], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[2], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
 $pdf->Cell(65.3,65.3, $pdf->Image($ruta[3], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 $pdf->Cell(65.3,65.3, $pdf->Image($ruta[4], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
   $pdf->Cell(65.3,65.3, $pdf->Image($ruta[5], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
   $pdf->Cell(65.3,65.3, $pdf->Image($ruta[6], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[7], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  // $pdf->Cell(65.3,65.3, $pdf->Image($ruta[8], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
  $pdf->Ln(10);


    $pdf->Output('I','ORDEN DE SERVICIO.pdf');

  



}
if($evidencias>0&& $evidencias<=9){
  $ruta = array();
  for ($i=0; $i < $evidencias; $i++) { 
  $sql1="SELECT ruta FROM evidencias where orden= '$idos[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $ruta[]=$row1['ruta'];
    };
    $con->close();
  }
    $pdf->AddPage('portrait','letter');
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',10);
$pdf->Ln(10);
$pdf->SetAutoPageBreak(true);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,0,utf8_decode('EVIDENCIA'),0,1,'C');
 $pdf->Ln(10);
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[0], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[1], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[2], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
$pdf->Cell(65.3,65.3, $pdf->Image($ruta[3], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 $pdf->Cell(65.3,65.3, $pdf->Image($ruta[4], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[5], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
  $pdf->Cell(65.3,65.3, $pdf->Image($ruta[6], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
 $pdf->Cell(65.3,65.3, $pdf->Image($ruta[7], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,0,'C');
   $pdf->Cell(65.3,65.3, $pdf->Image($ruta[8], $pdf->GetX(), $pdf->GetY(),65.3,65.3),1,1,'C');
  $pdf->Ln(10);


    $pdf->Output('I','ORDEN DE SERVICIO.pdf');

  



}
else{
  $pdf->Output('I','ORDEN DE SERVICIO.pdf');

  
}










 ?>