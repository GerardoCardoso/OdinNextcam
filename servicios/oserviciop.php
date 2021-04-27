<?php
// Iniciamos la sesion
session_start();
//// Verifica si la variable de sesión SESS_MEMBER_ID está presente o no
if (isset($_SESSION["clave"])  == "hzhOiLvy-i={9F[jWONj") {
   // Establecer tiempo de vida de la sesión en segundos
    $inactividad = 6000;
    // Comprobar si $_SESSION["timeout"] está establecida
    if(isset($_SESSION["timeout"])){
        // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
        $sessionTTL = time() - $_SESSION["timeout"];
        if($sessionTTL > $inactividad){
            session_destroy();
            header("Location: ../salir.php");
        }
    }
    // El siguiente key se crea cuando se inicia sesión
    $_SESSION["timeout"] = time();
}else{
  header("location: ../salir.php");
exit();
}
?>
<?php
 include("../conect2.php"); 
$objdata = new Database();
if(isset($_GET['opcion'])){
  $sth1=$objdata->prepare('SELECT * FROM clientes WHERE id = :idUser');
  $sth1->bindParam(':idUser', $_GET['opcion']);
  $sth1->execute();
$result1 = $sth1->fetchAll();
}
$sth=$objdata->prepare('SELECT * FROM clientes');
$sth->execute();

$result = $sth->fetchAll();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Orden de Servicio | NextAdmin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript">
  if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}
</script>
 <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link href="../dist/img/favicon.png" rel="icon">
</head>
<body class="hold-transition sidebar-mini">
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
    <a href="../bienvenido.php" class="brand-link">
      <img src="http://odin.nextcam.com.mx/dist/img/icon.png" alt="Logo Nextcam" class="brand-image img-circle elevation-3"
           style="opacity: 1">
      <span class="brand-text font-weight-light">NextOdin v1</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/avatar04.png" alt="Logo Nextcam" class="brand-image img-circle elevation-3"
           style="opacity: 1">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php
          $stuff = $_SESSION["usuario"];
foreach ($stuff as $value) {
     $nom[]=$value;}
     $token = strtok($nom[1], " "); 
     echo $token." ".$nom[2];
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
            <a href="../bienvenido.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Inicio              </p>
            </a>
          </li>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Catálogo
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>    <?php
          $nusuario = $_SESSION["nivel"];
if ($nusuario==1 || $nusuario==2 ) {
  # code...
?>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/catalogo/accesos.php" class="nav-link ">
                  <i class="fas fa-address-book nav-icon"></i>
                  <p>Accesos</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/catalogo/cuentas.php" class="nav-link ">
                  <i class="fas fa-key nav-icon"></i>
                  <p>Cuentas</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/catalogo/usuarios.php" class="nav-link">
                  <i class="fas fa-user-shield nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
            </ul>
             <?php
        }else{}


        ?>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/catalogo/clientes.php" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Clientes</p>
                </a>
              </li>
            </ul>
         <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/catalogo/firmas.php" class="nav-link ">
                  <i class="fas fa-id-card nav-icon"></i>
                  <p>Firmas</p>
                </a>
              </li>
            </ul>
          </li>
           <?php
          $nusuario = $_SESSION["nivel"];
if ($nusuario==1 || $nusuario==2 || $nusuario==3 || $nusuario==4) {
  # code...
?>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Servicios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="fas fa-id-card nav-icon"></i>
                  <p>Orden de Servicio</p>
                </a>
              </li>
            </ul>
     <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="orealizadas.php" class="nav-link ">
                  <i class="fas fa-archive nav-icon"></i>
                  <p>Órdenes Realizadas</p>
                </a>
              </li>
            </ul>
          </li>
            <?php
        }else{}


        ?>
          <li class="nav-item">
            <a href="../salir.php" class="nav-link">
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orden de Servicio</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Orden de Servicio</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

              
             



        
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Creción de orden</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <script>
              function buscar(){
              var opcion = document.getElementById('userN').value;
                window.location = 'http://odin.nextcam.com.mx/servicios/oservicio.php?opcion='+opcion;
              }</script>
              <form action="altaorden2.php" method="post" enctype="multipart/form-data">
                 <div class="row">
                    <div class="form-group col-md-2">
                     <p class="lead" align="center">Orden No.: <?php 
                           include("../conexion2.php");                     
$cont="SELECT count(*) FROM ordenservicio";
$count = mysqli_query($con,$cont);
while($row=mysqli_fetch_array($count)){
$clientes=$row[0];
};
                       echo $clientes+1;
                       
                      
                       ?> </p>
                         <input type="text"  class="form-control" name="idorde" id="idorde" value="<?php echo $clientes+1;?>" hidden />
                  </div>
             <div class="form-group col-md-3">
                     <p class="lead" align="center">Fecha Actual: <?php date_default_timezone_set('UTC'); $fecha_actual=date("d/m/Y"); echo $fecha_actual;?> </p>
                  </div>
                  <div class="form-group col-md-3">
                     <label for="niusuario">Fecha Orden</label>
                       <input type="date" class="form-control" id="for" name="for" value="<?php echo date("Y-m-d"); ?>" min="2019-01-01" max="2021-12-31">
                  </div>
                   
                  
                  <div class="form-group col-md-4">
                    <label for="niusuario">Cliente</label>
                    <select class="form-control" id="userN" name="userN" onchange="return buscar();" required>
                      
                      
               <?php
                    
                    if($result1){?>
                    <option value="<?php echo $result1[0]['id'];?>">
                         <?php echo $result1[0]['nombre']. ' '.$result1[0]['appaterno'];?>
                    </option>    
                    <?php
                    }?>
                       <option value=""></option>
       <?php
                      foreach ($result as $key => $value){?>
                        
                      <option value="<?php echo $value['id'];?>"><?php echo $value['nombre'].' '.$value['appaterno'];?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="id">No. Cliente</label>
                    
                    
                    
                        <?php
                
                if(isset($result1)){?>
                    <input type="text"  class="form-control" name="id" value="<?php echo $result1[0]['id']?>" disabled />
                <?php
                    
                }else{?>
                    <input type="text"  class="form-control" name="id" value="" disabled/>
                <?php
                    
                }
                
                ?>
                
                  </div>
                  <div class="form-group col-md-4">
                      <label for="telefono">Teléfono</label>
                        <?php
                
                if(isset($result1)){?>
                    <input type="text"  class="form-control" name="telefono" value="<?php echo $result1[0]['celular']?>" disabled />
                <?php
                    
                }else{?>
                    <input type="text"  class="form-control" name="telefono" value="" disabled/>
                <?php
                    
                }
                
                ?>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="direccion">Dirección</label>
                        <?php
                
                if(isset($result1)){?>
                    <input type="text"  class="form-control" name="direccion" value="<?php echo $result1[0]['direccion'].' # '. $result1[0]['numero'].', '.$result1[0]['colonia'].', '. $result1[0]['ciudad'] ?>" disabled />
                <?php
                    
                }else{?>
                    <input type="text"  class="form-control" name="direccion" value="" disabled/>
                <?php
                    
                }
                
                ?>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="tecnico">Técnico</label>
                     <select class="form-control" id="tecnico" name="tecnico" required>
                   <option value="<?php echo $nom[0];?>"><?php echo $token." ".$nom[2];?></option>
                       <?php
 include("../conexion.php");     
          $query = $con -> query ("SELECT * FROM usuarios");
                       
          while ($valores = mysqli_fetch_array($query)) {
              $tokenq = strtok($valores[nombre], " ");
// En esta sección estamos llenando el select con datos extraidos de una base de datos.
            echo '<option value="'.$valores[id].'">'.$tokenq.' '.$valores[appaterno].'</option>';
          }
          $con->close();
        ?>
                    </select>
                    
                    
                    
                  </div>
                   
                   <?php
          $stuff = $_SESSION["usuario"];
foreach ($stuff as $value) {
     $nom[]=$value;}
     $token = strtok($nom[1], " "); 
          ?>
                   
                   
                   
                     <div class="form-group col-md-4">
                    <label for="servicior">Servicio Realizado</label>
                    <select class="form-control" id="servicior" name="servicior" required>
                    <option value="">Seleccione:</option>
                      <option value="Mantenimiento">Mantenimiento</option>
                      <option value="Garantia">Garantía</option>
                      <option value="Falla">Falla</option>
                      <option value="Instalacion">Instalación</option>
    
                    </select>
                  </div>
                    <div class="form-group col-md-4">
                     <label for="niusuario">Correo</label>
                       <input type="text" class="form-control" id="correo" name="correo" >
                  </div>
                  
<div class="form-group col-md-12">
                  <h3>Descripción del Servicio</h3>
                  </div>
<div class="form-group col-md-4">
                      <label for="modelo">Modelo</label>
                    <input type="text" class="form-control" id="modelo" name="modelo" >
                  </div>
                  <div class="form-group col-md-4">
                      <label for="caracteristicas">Caracteristicas</label>
                    <input type="text" class="form-control" id="caracteristicas" name="caracteristicas" >
                  </div>
                  <div class="form-group col-md-4">
                      <label for="noserie">No. de Serie</label>
                    <input type="text" class="form-control" id="noserie" name="noserie" >
                  </div>
<div class="form-group col-md-6">
                      <label for="falla">Falla</label>
                    <input type="text" class="form-control" id="falla" name="falla" >
                  </div>
                  <div class="form-group col-md-6">
                      <label for="serviciot">Tipo de Servicio</label>
                    <input type="text" class="form-control" id="serviciot" name="serviciot" >
                  </div>

<div class="custom-control custom-checkbox col-md-3">
  <div></div>
  <label>CCTV</label><BR>
  <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="defaultUnchecked1" id="defaultUnchecked1" value="1">
          <label class="custom-control-label" for="defaultUnchecked1">DVR OPERANDO</label>
        </div>
  <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="defaultUnchecked2" id="defaultUnchecked2" value="1">
          <label class="custom-control-label" for="defaultUnchecked2">CONEXIONES CORRECTAS</label>
        </div>
  <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="defaultUnchecked3" id="defaultUnchecked3" value="1">
          <label class="custom-control-label" for="defaultUnchecked3">REGULADOR FUNCIONAL</label>
        </div>
   <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="defaultUnchecked4" id="defaultUnchecked4" value="1">
          <label class="custom-control-label" for="defaultUnchecked4">CAMARAS ENFOCADAS</label>
        </div>
   <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input"  name="defaultUnchecked5" id="defaultUnchecked5" value="1">
          <label class="custom-control-label" for="defaultUnchecked5">VOLTAJE CORRECTO</label>
        </div>

</div>

<div class="custom-control custom-checkbox col-md-3">
  <label>ALARMA</label><BR>
  <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="defaultUnchecked6" id="defaultUnchecked6" value="1">
          <label class="custom-control-label" for="defaultUnchecked6">PANEL OPERANDO</label>
        </div>
  <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="defaultUnchecked7" id="defaultUnchecked7" value="1">
          <label class="custom-control-label" for="defaultUnchecked7">SENSORES FUNCIONANDO</label>
        </div>
  <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="defaultUnchecked8" id="defaultUnchecked8" value="1">
          <label class="custom-control-label" for="defaultUnchecked8">VOLTAJE CORRECTO</label>
        </div>
  <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="defaultUnchecked9" id="defaultUnchecked9" value="1">
          <label class="custom-control-label" for="defaultUnchecked9">CONEXIONES CORRECTAS</label>
        </div>
  <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="defaultUnchecked10" id="defaultUnchecked10" value="1">
          <label class="custom-control-label" for="defaultUnchecked10">BATERIAS FUNCIONANDO</label>
        </div>
    
</div>

<div class="custom-control custom-checkbox col-md-3">
  <label>GPS</label><BR>
  <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="defaultUnchecked11" id="defaultUnchecked11" value="1">
          <label class="custom-control-label" for="defaultUnchecked11">GPS OPERANDO</label>
        </div>
  <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="defaultUnchecked12" id="defaultUnchecked12" value="1">
          <label class="custom-control-label" for="defaultUnchecked12">VOLTAJE CORRECTO</label>
        </div>
  <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="defaultUnchecked13" id="defaultUnchecked13" value="1">
          <label class="custom-control-label" for="defaultUnchecked13">CONEXIONES CORRECTAS</label>
        </div>
  <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="defaultUnchecked14" id="defaultUnchecked14" value="1">
          <label class="custom-control-label" for="defaultUnchecked14">CABLES ASEGURADOS</label>
        </div>
  <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="defaultUnchecked15" id="defaultUnchecked15" value="1"> 
          <label class="custom-control-label" for="defaultUnchecked15">CHIP FUNCIONAL</label>
        </div>
</div>
<div class="custom-control custom-checkbox col-md-3">
  <label>CERCO ELETRICO</label><BR>
    <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="defaultUnchecked16" id="defaultUnchecked16" value="1">
          <label class="custom-control-label" for="defaultUnchecked16">ENERGIZADOR OPERANDO</label>
        </div>
    <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="defaultUnchecked17" id="defaultUnchecked17" value="1">
          <label class="custom-control-label" for="defaultUnchecked17">HILOS ASEGURADOS</label>
        </div>
    <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="defaultUnchecked18" id="defaultUnchecked18" value="1">
          <label class="custom-control-label" for="defaultUnchecked18">LETREROS COLOCADOS</label>
        </div>
    <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="defaultUnchecked19" id="defaultUnchecked19" value="1">
          <label class="custom-control-label" for="defaultUnchecked19">CABLE BUJIA CONTINUO</label>
        </div>
    <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="defaultUnchecked20" id="defaultUnchecked20" value="1">
          <label class="custom-control-label" for="defaultUnchecked20">TIERRA ATERRIZADA</label>
        </div>
  
   
</div>
<div class="form-group col-md-12">
                     <label for="exampleFormControlTextarea1">Observaciones</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" id="observaciones" name="observaciones" rows="3"></textarea>
                  </div>
                 
<div class="form-group col-md-6">
                      <label for="telefono">Costo del Servicio</label>
                    <input type="number" class="form-control" id="costo" name="costo" >
                  </div>
             
                   <div class="form-group col-md-6">
                      <label for="telefono">Firma</label>
                     <a class="btn btn-primary btn-xs" href="../signature/docs/" target="_blank" type="button"><i class="nav-icon fas fa-plus-circle"></i></a>
                       <input type="file" class="form-control-file" id="firma" name="firma" accept="image/png" required />
                  </div>

    <div class="form-group col-md-12">
                      <label for="telefono">Evidencia</label>
                       <input type="file" class="form-control-file" id="archivo[]" name="archivo[]" accept="image/*" multiple="">  
                  </div>
   
                </div>

                <div class="card-footer">
                  <button id="boton2" name="boton2" type="submit" class="btn btn-primary">Crear orden</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


          </div>
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
         
   
  
 
  <div class="modal fade" id="#firma" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
  </div>
  <!-- /.content-wrapper -->
   <footer class="main-footer">
    <strong>Copyright &copy; 2020-2021 <a >Nextcam</a></strong>
    Todos los derechos reservados
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 11-2020v1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
       
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
