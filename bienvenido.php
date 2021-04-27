<?php
session_start();
//// Verifica si la variable de sesión SESS_MEMBER_ID está presente o no
if (isset($_SESSION["clave"])  == "hzhOiLvy-i={9F[jWONj") {
  session_start();
   // Establecer tiempo de vida de la sesión en segundos
    $inactividad = 6000;
    // Comprobar si $_SESSION["timeout"] está establecida
    if(isset($_SESSION["timeout"])){
        // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
        $sessionTTL = time() - $_SESSION["timeout"];
        if($sessionTTL > $inactividad){
            session_destroy();
            header("Location: salir.php");
        }
    }
    // El siguiente key se crea cuando se inicia sesión
    $_SESSION["timeout"] = time();
}else{
  header("location: salir.php");
die();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Escritorio | NextOdin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="dist/img/favicon.png" rel="icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  
  <link rel='stylesheet' href='css/fullcalendar.min.css' />
 
    <link rel='stylesheet' href='css/bootstrap-clockpicker.css' />
    <style>
        .fc th{
            padding: 10px 0px;
            vertical-align: middle;
            background: #F2F2F2;
        }


    </style>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="bienvenido.php" class="brand-link">
      <img src="/dist/img/icon.png" alt="Logo Nextcam" class="brand-image img-circle elevation-3"
           style="opacity: 1">
      <span class="brand-text font-weight-light">NextOdin v1</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php
          $stuff = $_SESSION["usuario"];
          $nivel =  $_SESSION["nivel"];
foreach ($stuff as $value) {
     $nom[]=$value;}
     $token = strtok($nom[1], " "); 
     echo $token." ".$nom[2]."<br> ";
            
                 include("conexion.php");  
            $sql3="SELECT nombre FROM niveles WHERE id = '$nivel'";
    $res3 = mysqli_query($con,$sql3);
    while($row1=mysqli_fetch_array($res3)){
      $nnivel[]=$row1['nombre'];
    };
            
            
            
            echo "Nivel: " .$nnivel[0];
          ?>
            
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="bienvenido.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Inicio</p>
            </a>
          </li>
               <li class="nav-item">
            <a href="calendario.php" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Calendario</p>
            </a>
          </li>
                       <?php
          $nusuario = $_SESSION["nivel"];
if ($nusuario==1 || $nusuario==2 || $nusuario==3 || $nusuario==4 || $nusuario==5) {
  # code...
?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Catálogo
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
      <?php
        }else{}


        ?>
                                   <?php
          $nusuario = $_SESSION["nivel"];
if ($nusuario==1 || $nusuario==2 || $nusuario==3 ) {
  # code...
?>

            
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./catalogo/cuentas.php" class="nav-link ">
                  <i class="fas fa-key nav-icon"></i>
                  <p>Cuentas</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./catalogo/usuarios.php" class="nav-link ">
                  <i class="fas fa-user-shield nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
            </ul>
             <?php
        }else{}


        ?>
                                         <?php
          $nusuario = $_SESSION["nivel"];
if ($nusuario==1 || $nusuario==2 || $nusuario==3 || $nusuario==4 || $nusuario==5) {
  # code...
?>     
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./catalogo/clientes.php" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Clientes</p>
                </a>
              </li>
            </ul>
                   
            <?php
        }else{}


        ?>
                                                <?php
          $nusuario = $_SESSION["nivel"];
if ($nusuario==1 || $nusuario==2 || $nusuario==3 ) {
  # code...
?>     
              
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./catalogo/firmas.php" class="nav-link ">
                  <i class="fas fa-id-card nav-icon"></i>
                  <p>Firmas</p>
                </a>
              </li>
            </ul>
               <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./catalogo/productos.php" class="nav-link ">
                  <i class="fas fa-list-ol nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>
            </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./catalogo/marcas.php" class="nav-link ">
                  <i class="fas fa-columns nav-icon"></i>
                  <p>Marcas</p>
                </a>
              </li>
            </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./catalogo/unidades.php" class="nav-link ">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Unidad</p>
                </a>
              </li>
            </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./catalogo/categorias.php" class="nav-link ">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Categoria</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./catalogo/movimientos.php" class="nav-link ">
                  <i class="fas fa-expand nav-icon"></i>
                  <p>Movimientos</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./catalogo/inventario.php" class="nav-link ">
                  <i class="fas fa-archive nav-icon"></i>
                  <p>Inventarios</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./catalogo/proveedor.php" class="nav-link ">
                  <i class="fas fa-truck nav-icon"></i>
                  <p>Proveedores</p>
                </a>
              </li>
            </ul>
      <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./catalogo/asistencia.php" class="nav-link ">
                  <i class="fas fa-check nav-icon"></i>
                  <p>Asistencia</p>
                </a>
              </li>
            </ul>
          </li>
          
            <?php
        }else{}


        ?>
               <?php
          $nusuario = $_SESSION["nivel"];

if ($nusuario==1 || $nusuario==2 || $nusuario==3 || $nusuario==4 || $nusuario==5) {

  # code...
?>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Servicios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
                    <?php
        }else{}


        ?>  
                             <?php
          $nusuario = $_SESSION["nivel"];

if ($nusuario==1 || $nusuario==2 || $nusuario==3 || $nusuario==4 ) {

  # code...
?>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./servicios/oservicio.php" class="nav-link ">
                  <i class="fas fa-id-card nav-icon"></i>
                  <p>Orden de Servicio</p>
                </a>
              </li>
            </ul>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./servicios/orealizadas.php" class="nav-link ">
                  <i class="fas fa-archive nav-icon"></i>
                  <p>Ordenes Realizadas</p>
                </a>
              </li>
            </ul>
                   <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./servicios/enviodeorden.php" class="nav-link">
                  <i class="fas fa-share nav-icon"></i>
                  <p>Envio de Orden</p>
                </a>
              </li>
            </ul>
                                   <?php
        }else{}


        ?>  
                             <?php
          $nusuario = $_SESSION["nivel"];

if ($nusuario==1 || $nusuario==2 || $nusuario==3 || $nusuario==4 || $nusuario==5) {

  # code...
?>
                 <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./servicios/cotizaciones.php" class="nav-link ">
                  <i class="fas fa-list-alt nav-icon"></i>
                  <p>Cotizaciones</p>
                </a>
              </li>
            </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./servicios/cotizacionesr.php" class="nav-link ">
                  <i class="fas fa-file-alt nav-icon"></i>
                  <p>Cotizaciones Realizadas</p>
                </a>
              </li>
            </ul>
           
              
           <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./servicios/enviodecotizacion.php" class="nav-link">
                  <i class="fas fa-paper-plane nav-icon"></i>
                  <p>Envio de Cotización</p>
                </a>
              </li>
            </ul>
                 
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./servicios/recibos.php" class="nav-link">
                  <i class="fas fa-edit nav-icon"></i>
                  <p>Recibos</p>
                </a>
              </li>
            </ul>
     
               <?php
        }else{}


        ?>            <?php
          $nusuario = $_SESSION["nivel"];

if ($nusuario==1 || $nusuario==2 ) {

  # code...
?>
    
            
              
    
              
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./servicios/levantamiento.php" class="nav-link ">
                  <i class="fas fa-car nav-icon"></i>
                  <p>Levantamiento</p>
                </a>
              </li>
            </ul>
             
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./servicios/ventas.php" class="nav-link ">
                  <i class="fas fa-cart-plus nav-icon"></i>
                  <p>Ventas</p>
                </a>
              </li>
            </ul>
          </li>
          
      <!--     <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Reportes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
             
          </li>-->
              
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Reportes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
               <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./reportes/asistencia.php" class="nav-link ">
                  <i class="fas fa-list-alt nav-icon"></i>
                  <p>Asistencia</p>
                </a>
              </li>
            </ul>
          </li>
          <?php
        }else{}


        ?>
          <li class="nav-item">
            <a href="salir.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Salir
              </p>
            </a>
          </li>
       

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Escritorio</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Escritorio</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
   
        <section class="content">
<div class="container-fluid">
<!--    <div class="row">
      <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="box box-primary"><div class="box-body no-padding">
            <div id="CalendarioWeb"></div></div></div></div>
      <div class="col-md-2"></DIV>
    </div>
</div>-->
        
         <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <?php
          $nusuario = $_SESSION["nivel"];
                    
 

if ($nusuario==1 || $nusuario==2 ) {
  # code...
?>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
               
                  <h3><?php
     include("conexion.php");                     
$cont="SELECT count(*) FROM clientes";
  $count = mysqli_query($con,$cont);
  while($row=mysqli_fetch_array($count)){
$clientes=$row[0];
};
 echo $clientes;?></h3>
                
               

                <p>Clientes</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a href="/catalogo/clientes.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
               
         <h3><?php
  setlocale(LC_MONETARY, 'en_US');
     include("conexion.php");                     
$cont="SELECT sum(costo) as total FROM ordenservicio";
  $count = mysqli_query($con,$cont);
  while($row=mysqli_fetch_array($count)){
$suma=$row[0];
};
  
echo money_format('%(#10n', $suma)?></h3>

                

                <p>Ingresos</p>
              </div>
              <div class="icon">
                <i class="ion ion-cash"></i>
              </div>
              <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>#</h3>

                <p>Cuentas por cobrar</p>
              </div>
              <div class="icon">
                <i class="ion ion-calendar"></i>
              </div>
              <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                
                  <h3><?php
     include("conexion.php");                     
$cont="SELECT count(*) FROM ordenservicio";
  $count = mysqli_query($con,$cont);
  while($row=mysqli_fetch_array($count)){
$orden=$row[0];
};
 echo $orden;?></h3>

                <p>Proyectos terminados</p>
              </div>
              <div class="icon">
                <i class="ion ion-checkmark-round"></i>
              </div>
              <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

       
        <!-- /.row -->
         <?php
        }else{}


        ?>
        
        <!-- CALENDARIO -->
        </section>
        
        
        
        
        
        
       
<div style="text-align:center;padding:1em 0;"> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&size=large&timezone=America%2FMexico_City" width="100%" height="140" frameborder="0" seamless></iframe> </div>        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
    <!-- Modal2 -->
<div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tituloEvento"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="txtID" name="txtID" >
         <input type="hidden" id="txtFecha" name="txtFecha">

        <div class="form-row">
            <div class="form-group col-md-8">
                <label> Título:</label>
          <input type="text" id="txtTitulo" name="txtTitulo" class="form-control" placeholder="Título del evento">
        </div>
        <div class="form-group col-md-4">
            <label>Hora:</label>
            <div class="input-group clockpicker" data-autoclose="true">
           <input type="text" id="txtHora" name="txtHora" value="10:30" class="form-control">
        </div>
        </div>
    </div>


        <div class="form-group">
            <label>Descripción:</label>
           <textarea rows="3" id="txtDescripcion" name="txtDescripcion" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Color:</label>
            <input type="color" id="txtColor" name="txtColor" value="#ff0000" class="form-control" style="height:36px;">
        </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" id="btnAgregar" class="btn btn-success" >Agregar</button>
            <button type="button" id="btnModificar" class="btn btn-warning" >Modificar</button>
            <button type="button" id="btnElminar" class="btn btn-danger" >Borrar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020-2021 <a >Nextcam</a></strong>
    Todos los derechos reservados
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 15122020v1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
   <script src='js/jquery.min.js'></script>
    <script src='js/moment.min.js'></script>
    <script src='js/fullcalendar.min.js'></script>
    <script src='js/es.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src='js/bootstrap-clockpicker.js'></script>
<!-- jQuery -->
<!--<script src="plugins/jquery/jquery.min.js"></script>-->
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<!--<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>-->
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
  
        <script>
    $(document).ready(function(){
$('#CalendarioWeb').fullCalendar({
    header:{
        left:'today,prev,next',
        center:'title',
        right:'month,basicWeek,basicDay'

    },
    //customButtons:{
    //    Miboton:{
    //        text:"Botón 1",
    //        click:function(){
    //            alert("Acción del botón");
    //        }
    //    }
    //},
    dayClick:function(date,jsEvent,view){
        $('#btnAgregar').prop("disabled",false);
        $('#btnModificar').prop("disabled",true);
        $('#btnElminar').prop("disabled",true);
        
        limpiarFormulario();
        $('#txtFecha').val(date.format());
        $("#ModalEventos").modal();
    },

        events:'http://odin.nextcam.com.mx/eventos.php',
    eventClick:function(calEvent,jsEvent,view){
        $('#btnAgregar').prop("disabled",true);
        $('#btnModificar').prop("disabled",false);
        $('#btnElminar').prop("disabled",false);
        //h2
        $('#tituloEvento').html(calEvent.title);
        //Mostrar info en inputs
        $('#txtDescripcion').val(calEvent.descripcion);
        $('#txtID').val(calEvent.id);
        $('#txtTitulo').val(calEvent.title);
        $('#txtColor').val(calEvent.color);

        FechaHora = calEvent.start._i.split(" ");
        $('#txtFecha').val(FechaHora[0]);
        $('#txtHora').val(FechaHora[1]);
        $("#ModalEventos").modal();
    },
    editable:true,
    eventDrop:function(calEvent){
        $('#txtID').val(calEvent.id);
        $('#txtTitulo').val(calEvent.title);
        $('#txtColor').val(calEvent.color);
        $('#txtDescripcion').val(calEvent.descripcion);

        var fechaHora=calEvent.start.format().split("T");
        $('#txtFecha').val(fechaHora[0]);
        $('#txtHora').val(fechaHora[1]);
        RecolectarDatosGUI();
        EnviarInformacion('modificar',NuevoEvento,true);
    }
    
});
    });
</script>
  
 <script>
      var NuevoEvento;
      $('#btnAgregar').click(function(){
        RecolectarDatosGUI();
        EnviarInformacion('agregar',NuevoEvento);
        
      });
      $('#btnElminar').click(function(){
        RecolectarDatosGUI();
        EnviarInformacion('eliminar',NuevoEvento);
        
      });
      $('#btnModificar').click(function(){
        RecolectarDatosGUI();
        EnviarInformacion('modificar',NuevoEvento);
        
      });

      function RecolectarDatosGUI(){
        NuevoEvento={
            id:$('#txtID').val(),
            title:$('#txtTitulo').val(),
            start:$('#txtFecha').val()+" "+$('#txtHora').val(),
            color:$('#txtColor').val(),
            descripcion:$('#txtDescripcion').val(),
            textColor:"#FFFFFF",
            end:$('#txtFecha').val()+" "+$('#txtHora').val(),
        };
      }

      function EnviarInformacion(accion,objEvento,modal){
          $.ajax({
            type:'POST',
            url:'eventos.php?accion='+accion,
            data:objEvento,
            success:function(msg){
                if(msg){
                    $('#CalendarioWeb').fullCalendar('refetchEvents');
                    if(!modal){
                    $("#ModalEventos").modal('toggle');
                    }
                }
            },
            error:function(){
                alert("Hay un error..");
            }
          });
      }

$('.clockpicker').clockpicker();
function limpiarFormulario(){
        $('#txtID').val('');
        $('#txtTitulo').val('');
        $('#txtColor').val('');
        $('#txtDescripcion').val('');
}


  </script>

</body>
</html>