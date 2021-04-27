<?php
session_start();
//error_reporting(1);
if(isset($_POST["boton2"])) {
  include("../conexion.php");  
date_default_timezone_set("America/Mexico_City");
$longitud=15;
$id = $_POST["idorde"];
$fechaor = $_POST["for"];          
$fecha = date("d-m-Y");
$cliente = $_POST["userN"];
$tecnico = $_POST["tecnico"];   
$servicio = $_POST["servicior"];  
$modelo = $_POST["modelo"];
$caracteristicas = $_POST["caracteristicas"];
$noserie = $_POST["noserie"];
$falla = $_POST["falla"];
$tipodeservicio = $_POST["serviciot"];
$dvro = $_POST["defaultUnchecked1"];
$coneco = $_POST["defaultUnchecked2"];
$reguladorf = $_POST["defaultUnchecked3"];  
$camarasenf = $_POST["defaultUnchecked4"];
$voltajec = $_POST["defaultUnchecked5"];
$panelop = $_POST["defaultUnchecked6"];
$sensoresf = $_POST["defaultUnchecked7"];   
$voltajeca = $_POST["defaultUnchecked8"];
$conecoa = $_POST["defaultUnchecked9"];
$bfuncionando = $_POST["defaultUnchecked10"];
$gpso = $_POST["defaultUnchecked11"];
$voltajeco = $_POST["defaultUnchecked12"];
$conecog = $_POST["defaultUnchecked13"];
$cablesase = $_POST["defaultUnchecked14"];
$chipfuncional = $_POST["defaultUnchecked15"];
$energizadoro = $_POST["defaultUnchecked16"];
$hilosa = $_POST["defaultUnchecked17"];
$letreroscol = $_POST["defaultUnchecked18"];
$cablecon = $_POST["defaultUnchecked19"];
$tierra = $_POST["defaultUnchecked20"]; 
$observaciones = $_POST["observaciones"];  
$costo = $_POST["costo"];
  $tipopago = $_POST["tpago"];
$fecreacion = date("d-m-Y H:i:s");
$correo = "sin@hotmail.com";
$stuff = $_SESSION["usuario"];
$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
$password = "";
  $idos = array();
foreach ($stuff as $value) {
     $nom[]=$value;}
     $token = $nom[0];
  
  
  
$target_path1 = "firmas/"; 
$target_path1 = $target_path1 . $fecreacion . basename( $_FILES['firma']['name']); 
$documento="firmas/".  $fecreacion . basename( $_FILES['firma']['name']);
if (file_exists($documento)) {
echo "<script>
alert('El archivo: ".$documento." ya existe en el servidor, firma no guardada');
window.location = 'oservicio.php';
</script>";
}
else {
move_uploaded_file($_FILES['firma']['tmp_name'], $target_path1);
   $sql = "INSERT INTO ordenservicio (fecha, cliente, tecnico, servicio, modelo, caracterristicas, noserie, falla, tipodeservicio, dvro, coneco, reguladorf, camarasenfo, voltajec, panelop, sensoresf, voltajeca, conecoa, bfuncionando, gpso, voltajecg, conecog, cablesase, chipfuncional, energizadoro, hilosa, letreroscol, cablebcon, tierra, observaciones, firma, costo, feccreacion, correo, fechaorden, useralta, tpago) VALUES ('$fecha', '$cliente', '$tecnico', '$servicio', '$modelo', '$caracteristicas', '$noserie', '$falla', '$tipodeservicio', '$dvro', '$coneco', '$reguladorf', '$camarasenf', '$voltajec', '$panelop', '$sensoresf', '$voltajeca', '$conecoa', '$bfuncionando', '$gpso', '$voltajeco', '$conecog', '$cablesase', '$chipfuncional', '$energizadoro', '$hilosa', '$letreroscol', '$cablecon', '$tierra', '$observaciones', '$documento', '$costo', '$fecreacion', '$correo', '$fechaor', '$token', '$tipopago')";
if (mysqli_query($con, $sql)) {
    for($i=0;$i<$longitud;$i++) {
      //obtenemos un caracter aleatorio escogido de la cadena de caracteres
      $password .= substr($str,rand(0,62),1);
   }
  
   $sql1="SELECT id FROM ordenservicio ORDER by ID DESC";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $idos[]=$row1['id'];
    };
 $sq = "INSERT INTO accesoservicio (fecha, clave, orden) VALUES ('$fecreacion', '$password', '$idos[0]')";
  if (mysqli_query($con, $sq)) {

    
  }else {
      echo '<div class="alert alert-danger" role="alert">'. $sq . "<br>" . mysqli_error($con);   
    
} 
    } else {
      echo '<div class="alert alert-danger" role="alert">'. $sql . "<br>" . mysqli_error($con);
} 
 }
  //Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
	foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
	{
	//Validamos que el archivo exista
		if($_FILES["archivo"]["name"][$key]) {
			$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			
			$directorio = 'evidencias'; //Declaramos un  variable con la ruta donde guardaremos los archivos
			
			//Validamos si la ruta de destino existe, en caso de no existir la creamos
			if(!file_exists($directorio)){
				mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
			}
			
			$dir=opendir($directorio); //Abrimos el directorio de destino
			$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
					$sql2 = "INSERT INTO evidencias(ruta, orden, fecha) VALUES ('$target_path', '$id', '$fecreacion')";
if (mysqli_query($con, $sql2)) {
 
  } else {
      echo '<div class="alert alert-danger" role="alert">'. $sql2 . "<br>" . mysqli_error($con);
}
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			if(move_uploaded_file($source, $target_path)) {

				} else {
				//echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos el directorio de destino
      
           
      //reenviar al archvio donde envia el correo
      //Código para enviar correo y whatsapp
		}
	}
 mysqli_close($con);
   echo "<script type=\"text/javascript\">alert(\"Datos guardados correctamente\");window.location = 'enviodeorden.php';</script>";
  
 }else{
   echo "<script type=\"text/javascript\">alert(\"No puedes acceder aqui\");window.location = 'oservicio.php';</script>";
}

?>