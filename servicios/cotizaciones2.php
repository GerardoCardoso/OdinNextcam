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
 $nusuario = $_SESSION["nivel"];
if ($nusuario==1 || $nusuario==2  ) {
  # code...
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
  <title>Cotizaciones | NextAdmin</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript">
  if (window.history.replaceState) { // verificamos disponibilidad
    window.history.replaceState(null, null, window.location.href);
}
</script>
    <link href="http://odin.nextcam.com.mx/dist/img/favicon.png" rel="icon">
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

    <!-- SEARCH FORM 
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>-->

    
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
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php
          $stuff = $_SESSION["usuario"];
          $nivel =  $_SESSION["nivel"];
foreach ($stuff as $value) {
     $nom[]=$value;}
     $token = strtok($nom[1], " "); 
     echo $token." ".$nom[2]."<br> ";
            
                 include("../conexion.php");  
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
            <a href="../bienvenido.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Inicio              </p>
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
if ($nusuario==1 || $nusuario==2 ) {
  # code...
?>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../catalogo/accesos.php" class="nav-link ">
                  <i class="fas fa-address-book nav-icon"></i>
                  <p>Accesos</p>
                </a>
              </li>
            </ul>
            
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../catalogo/cuentas.php" class="nav-link ">
                  <i class="fas fa-key nav-icon"></i>
                  <p>Cuentas</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../catalogo/usuarios.php" class="nav-link ">
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
                <a href="../catalogo/clientes.php" class="nav-link ">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Clientes</p>
                </a>
              </li>
            </ul>
                              <?php
        }else{}


        ?>                      <?php
          $nusuario = $_SESSION["nivel"];
if ($nusuario==1 || $nusuario==2 || $nusuario==3 ) {
  # code...
?>     
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../catalogo/firmas.php" class="nav-link ">
                  <i class="fas fa-id-card nav-icon"></i>
                  <p>Firmas</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../catalogo/productos.php" class="nav-link ">
                  <i class="fas fa-list-ol nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>
            </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../catalogo/asistencia.php" class="nav-link ">
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
if ($nusuario==1 || $nusuario==2 || $nusuario==3 || $nusuario==4|| $nusuario==5 ) {
  # code...
?>
           <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link menu-open ">
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
if ($nusuario==1 || $nusuario==2 || $nusuario==3 || $nusuario==4) {
  # code...
?>
      
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/servicios/oservicio.php" class="nav-link ">
                  <i class="fas fa-id-card nav-icon"></i>
                  <p>Órden de Servicio</p>
                </a>
              </li>
            </ul>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/servicios/orealizadas.php" class="nav-link ">
                  <i class="fas fa-archive nav-icon"></i>
                  <p>Órdenes Realizadas</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="enviodeorden.php" class="nav-link ">
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
if ($nusuario==1 || $nusuario==2 || $nusuario==3 || $nusuario==4|| $nusuario==5 ) {
  # code...
?>
      
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="cotizaciones.php" class="nav-link active">
                  <i class="fas fa-list-alt nav-icon"></i>
                  <p>Cotizaciones</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="cotizacionesr.php" class="nav-link ">
                  <i class="fas fa-file-alt nav-icon"></i>
                  <p>Cotizaciones Realizadas</p>
                </a>
              </li>
            </ul>
               <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="enviodecotizacion.php" class="nav-link">
                  <i class="fas fa-paper-plane nav-icon"></i>
                  <p>Envio de Cotización</p>
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
          
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Reportes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
             
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
            <h1>Cotizaciones</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Cotizaciones</li>
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
                <h3 class="card-title">Creción de cotizacion</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                          <script>
              function buscar(){
              var opcion = document.getElementById('userN').value;
                window.location = 'http://odin.nextcam.com.mx/servicios/cotizaciones.php?opcion='+opcion;
              }</script>
              <form action="altacotizacion.php" method="post" enctype="multipart/form-data">
                <div class="form-row">
                           <div class="form-group col-md-4">
                    <label for="niusuario">Cliente</label>
                    <select class="form-control" id="userN" name="userN" onchange="return buscar();" required >
                      
                      
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
             <?php
$fecha_actual = date("Y-m-d");
                  
                  ?>
               <div class="form-group col-md-4">
                    <label for="servicior">Condiciones de Pago</label>
                    <select class="form-control" id="servicior" name="servicior" required >
                    <option value="">Seleccione:</option>
                      <option value="Contado">Contado</option>
                      <option value="Anticipo">Anticipo</option>
                      <option value="Plazos">Plazos</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="vacoti">Validez de cotización</label>
                    <input type="date" class="form-control" id="vacoti" name="vacoti" placeholder="Introducir fecha de validez" min="<?php echo date("Y-m-d",strtotime($fecha_actual."- 2 days")); ?>"  max="<?php echo date("Y-m-d",strtotime($fecha_actual."+ 15 days")); ?>"  value="<?php echo date("Y-m-d",strtotime($fecha_actual."+ 2 days")); ?>" required >
                  </div>
                  <div class="form-group  col-md-4">
                    <label for="tentrega">Tiempo de entrega</label>
                    <input type="text" class="form-control" id="tentrega" name="tentrega" placeholder="" required >
                  </div>
                   <div class="form-group  col-md-4">
                    <label for="nota">Nota</label>
                    <input type="text" class="form-control" id="nota" name="nota" placeholder="Introducir alguna nota"  required >
                  </div>
                  
                  <div class="form-group  col-md-4">
                    <label for="envio">Enviar</label>
                    <input type="text" class="form-control" id="envio" name="envio" placeholder="Introducir algun correo" >
                  </div>
                 
                  <div class="form-group  col-md-12" align="center">
                    <label for="envio">Agregar</label>
                    <div class="btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-outline-primary active">
    <input type="checkbox" checked autocomplete="off"  id="biva" name="biva"> IVA
  </label>

  <label class="btn btn-outline-primary active">
    <input type="checkbox" checked autocomplete="off" id="bdescuento" name="bdescuento" onchange="comprobardescuento();"> DESCUENTO
  </label>

                    
  <label class="btn btn-outline-primary active">
    <input type="checkbox" checked autocomplete="off"  id="banticipio" name="banticipio" onchange="comprobaranticipo();"> ANTICIPO
  </label>
</div>
                  </div>
                </div>
                
           <script>

function comprobardescuento()
{   
    if (document.getElementById("bdescuento").checked)
      document.getElementById('descuento').readOnly = false;
        
    else
      document.getElementById('descuento').readOnly = true;
        
}
function comprobaranticipo()
{   
    if (document.getElementById("banticipio").checked)
      document.getElementById('anticipo').readOnly = false;
        
    else
      document.getElementById('anticipo').readOnly = true;
        
}
                
             
                </script>
                
              <section class="content">


      
      
     <table class="table">
  <thead>
    <tr>
    <th>CANTIDAD</th>
    <th>MEDIDA</th>
    <th>DESCRIPCION</th>
    <th>PRECIO</th>
    <th>SUBTOTAL</th>
  </tr>
    <tbody>
  <tr>
    <td style="width:15px;"><input type="number" class="form-control multi"  id="multiplicando" min="0" max="100000"  name="field_name[]" onChange="multiplicar();" value="" required/></td>
    <td style="width:20px;"><input type="text" class="form-control" name="field_name2[]" value=""/></td>
    <td><input type="text" class="form-control" name="field_name3[]" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control multi"  id="multiplicador" min="0" max="100000"  name="field_name4[]" step="any"onChange="multiplicar();" value="" required/></td>
    <td style="width:150px;"><input type="number" class="form-control monto" name="field_name5[]" id="resultado" disabled/></td>

  </tr>
      <tr>
    <td style="width:15px;"><input type="number" class="form-control" id="multiplicando2" min="0" max="100000" name="field_name[]" onChange="multiplicar();" value=""/></td>
    <td style="width:20px;"><input type="text" class="form-control" name="field_name2[]" value=""/></td>
    <td><input type="text" class="form-control" name="field_name3[]" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control"  id="multiplicador2" min="0" max="100000" name="field_name4[]" step="any" onChange="multiplicar();" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control monto" name="field_name5[]" id="resultado2"  disabled/></td>

  </tr>
      <tr>
    <td style="width:15px;"><input type="number" class="form-control" id="multiplicando3" min="0" max="100000" name="field_name[]" onChange="multiplicar();" value=""/></td>
    <td style="width:20px;"><input type="text" class="form-control" name="field_name2[]" value=""/></td>
    <td><input type="text" class="form-control" name="field_name3[]" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" id="multiplicador3" min="0" max="100000" name="field_name4[]" step="any" onChange="multiplicar();" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" name="field_name5[]" id="resultado3" value="" disabled/></td>

  </tr>
      <tr>
    <td style="width:15px;"><input type="number" class="form-control" id="multiplicando4" min="0" max="100000" name="field_name[]" onChange="multiplicar();" value=""/></td>
    <td style="width:20px;"><input type="text" class="form-control" name="field_name2[]" value=""/></td>
    <td><input type="text" class="form-control" name="field_name3[]" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" id="multiplicador4" min="0" max="100000" name="field_name4[]" step="any" onChange="multiplicar();" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" name="field_name5[]" id="resultado4" value="" disabled/></td>

  </tr>
      <tr>
    <td style="width:15px;"><input type="number" class="form-control" id="multiplicando5" min="0" max="100000" name="field_name[]" onChange="multiplicar();" value=""/></td>
    <td style="width:20px;"><input type="text" class="form-control" name="field_name2[]" value=""/></td>
    <td><input type="text" class="form-control" name="field_name3[]" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" id="multiplicador5" min="0" max="100000" name="field_name4[]" step="any" onChange="multiplicar();" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" name="field_name5[]" id="resultado5" value="" disabled/></td>

  </tr>
      <tr>
    <td style="width:15px;"><input type="number" class="form-control" id="multiplicando6" min="0" max="100000" name="field_name[]" onChange="multiplicar();" value=""/></td>
    <td style="width:20px;"><input type="text" class="form-control" name="field_name2[]" value=""/></td>
    <td><input type="text" class="form-control" name="field_name3[]" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" id="multiplicador6" min="0" max="100000" name="field_name4[]" step="any" onChange="multiplicar();" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" name="field_name5[]" id="resultado6" value="" disabled/></td>

  </tr>
      <tr>
    <td style="width:15px;"><input type="number" class="form-control" id="multiplicando7" min="0" max="100000" name="field_name[]" onChange="multiplicar();" value=""/></td>
    <td style="width:20px;"><input type="text" class="form-control" name="field_name2[]" value=""/></td>
    <td><input type="text" class="form-control" name="field_name3[]" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" id="multiplicador7" min="0" max="100000" name="field_name4[]" step="any" onChange="multiplicar();" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" name="field_name5[]" id="resultado7" value="" disabled/></td>

  </tr>
      <tr>
    <td style="width:15px;"><input type="number" class="form-control" id="multiplicando8" min="0" max="100000" name="field_name[]" onChange="multiplicar();" value=""/></td>
    <td style="width:20px;"><input type="text" class="form-control" name="field_name2[]" value=""/></td>
    <td><input type="text" class="form-control" name="field_name3[]" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" id="multiplicador8" min="0" max="100000" name="field_name4[]" step="any" onChange="multiplicar();" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control"  name="field_name5[]" id="resultado8" value="" disabled/></td>

  </tr>
      <tr>
    <td style="width:15px;"><input type="number" class="form-control" id="multiplicando9" min="0" max="100000" name="field_name[]" onChange="multiplicar();" value=""/></td>
    <td style="width:20px;"><input type="text" class="form-control" name="field_name2[]" value=""/></td>
    <td><input type="text" class="form-control" name="field_name3[]" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" id="multiplicador9" min="0" max="100000" name="field_name4[]" step="any" onChange="multiplicar();" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" name="field_name5[]" id="resultado9" value="" disabled/></td>

  </tr>
      <tr>
    <td style="width:15px;"><input type="number" class="form-control" id="multiplicando10" min="0" max="100000" name="field_name[]" onChange="multiplicar();" value=""/></td>
    <td style="width:20px;"><input type="text" class="form-control" name="field_name2[]" value=""/></td>
    <td><input type="text" class="form-control" name="field_name3[]" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" id="multiplicador10" min="0" max="100000" name="field_name4[]" step="any" onChange="multiplicar();" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" name="field_name5[]" id="resultado10" value="" disabled/></td>

  </tr>
            <tr>
    <td style="width:15px;"><input type="number" class="form-control" id="multiplicando11" min="0" max="100000" name="field_name[]" onChange="multiplicar();" value=""/></td>
    <td style="width:20px;"><input type="text" class="form-control" name="field_name2[]" value=""/></td>
    <td><input type="text" class="form-control" name="field_name3[]" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" id="multiplicador11" min="0" max="100000" name="field_name4[]" step="any" onChange="multiplicar();" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" name="field_name5[]" id="resultado11" value="" disabled/></td>

  </tr>
            <tr>
    <td style="width:15px;"><input type="number" class="form-control" id="multiplicando12" min="0" max="100000" name="field_name[]" onChange="multiplicar();" value=""/></td>
    <td style="width:20px;"><input type="text" class="form-control" name="field_name2[]" value=""/></td>
    <td><input type="text" class="form-control" name="field_name3[]" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" id="multiplicador12" min="0" max="100000" name="field_name4[]" step="any" onChange="multiplicar();" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" name="field_name5[]" id="resultado12" value="" disabled/></td>

  </tr>
            <tr>
    <td style="width:15px;"><input type="number" class="form-control" id="multiplicando13" min="0" max="100000" name="field_name[]" onChange="multiplicar();" value=""/></td>
    <td style="width:20px;"><input type="text" class="form-control" name="field_name2[]" value=""/></td>
    <td><input type="text" class="form-control" name="field_name3[]" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" id="multiplicador13" min="0" max="100000" name="field_name4[]" step="any" onChange="multiplicar();" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" name="field_name5[]" id="resultado13" value="" disabled/></td>

  </tr>
            <tr>
    <td style="width:15px;"><input type="number" class="form-control" id="multiplicando14" min="0" max="100000" name="field_name[]" onChange="multiplicar();" value=""/></td>
    <td style="width:20px;"><input type="text" class="form-control" name="field_name2[]" value=""/></td>
    <td><input type="text" class="form-control" name="field_name3[]" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" id="multiplicador14" min="0" max="100000" name="field_name4[]" step="any" onChange="multiplicar();" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" name="field_name5[]" id="resultado14" value="" disabled/></td>

  </tr>
            <tr>
    <td style="width:15px;"><input type="number" class="form-control" id="multiplicando15" min="0" max="100000" name="field_name[]" onChange="multiplicar();" value=""/></td>
    <td style="width:20px;"><input type="text" class="form-control" name="field_name2[]" value=""/></td>
    <td><input type="text" class="form-control" name="field_name3[]" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" id="multiplicador15" min="0" max="100000" name="field_name4[]" step="any" onChange="multiplicar();" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" name="field_name5[]" id="resultado15" value="" disabled/></td>

  </tr>
            <tr>
    <td style="width:15px;"><input type="number" class="form-control" id="multiplicando16" min="0" max="100000" name="field_name[]" onChange="multiplicar();" value=""/></td>
    <td style="width:20px;"><input type="text" class="form-control" name="field_name2[]" value=""/></td>
    <td><input type="text" class="form-control" name="field_name3[]" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" id="multiplicador16" min="0" max="100000" name="field_name4[]" step="any" onChange="multiplicar();" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" name="field_name5[]" id="resultado16" value="" disabled/></td>

  </tr>
            <tr>
    <td style="width:15px;"><input type="number" class="form-control" id="multiplicando17" min="0" max="100000" name="field_name[]" onChange="multiplicar();" value=""/></td>
    <td style="width:20px;"><input type="text" class="form-control" name="field_name2[]" value=""/></td>
    <td><input type="text" class="form-control" name="field_name3[]" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" id="multiplicador17" min="0" max="100000" name="field_name4[]" step="any" onChange="multiplicar();" value=""/></td>
    <td style="width:150px;"><input type="number" class="form-control" name="field_name5[]" id="resultado17" value="" disabled/></td>

  </tr>
           <tr>
    <td style="width:15px;"></td>
    <td style="width:20px;"></td>
    <td></td>
    <td style="width:150px;">Subtotal</td>
    <td style="width:150px;"><input type="number" class="form-control" id="subotal" name="subotal" readonly/></td>

  </tr>
       <tr>
    <td style="width:15px;"></td>
    <td style="width:20px;"></td>
    <td></td>
    <td style="width:150px;">Descuento</td>
    <td style="width:150px;"><input type="text" class="form-control" id="descuento" name="descuento" onChange="multiplicar();" value="0"/></td>

  </tr>
           <tr>
    <td style="width:15px;"></td>
    <td style="width:20px;"></td>
    <td></td>
    <td style="width:150px;">Anticipo</td>
    <td style="width:150px;"><input type="text" class="form-control" id="anticipo" name="anticipo" onChange="multiplicar();" value="0"/></td>

  </tr>
                 <tr>
    <td style="width:15px;"></td>
    <td style="width:20px;"></td>
    <td></td>
    <td style="width:150px;">IVA</td>
    <td style="width:150px;"><input type="text" class="form-control" id="ivat" name="ivat" value="0" readonly/></td>

  </tr>
      
           <tr>
    <td style="width:15px;"></td>
    <td style="width:20px;"></td>
    <td></td>
    <td style="width:150px;">Total</td>
    <td style="width:150px;"><input type="text" class="form-control"  id="total"  name="total"  readonly/></td>

  </tr>
        </tbody>

</table>
      <script>
function multiplicar(){
	m1 = document.getElementById("multiplicando").value;
	m2 = document.getElementById("multiplicador").value;
	r = m1*m2;
	document.getElementById("resultado").value = r.toFixed(2);
  //---------------------------------
  m3 = document.getElementById("multiplicando2").value;
	m4 = document.getElementById("multiplicador2").value;
	r2 = m3*m4;
	document.getElementById("resultado2").value = r2.toFixed(2);
    //---------------------------------
  m5 = document.getElementById("multiplicando3").value;
	m6 = document.getElementById("multiplicador3").value;
	r3 = m5*m6;
	document.getElementById("resultado3").value = r3.toFixed(2);
    //---------------------------------
  m7 = document.getElementById("multiplicando4").value;
	m8 = document.getElementById("multiplicador4").value;
	r4 = m7*m8;
	document.getElementById("resultado4").value = r4.toFixed(2);
    //---------------------------------
  m9 = document.getElementById("multiplicando5").value;
	m10 = document.getElementById("multiplicador5").value;
	r5 = m9*m10;
	document.getElementById("resultado5").value = r5.toFixed(2);
    //---------------------------------
  m11 = document.getElementById("multiplicando6").value;
	m12 = document.getElementById("multiplicador6").value;
	r6 = m11*m12;
	document.getElementById("resultado6").value = r6.toFixed(2);
    //---------------------------------
  m13 = document.getElementById("multiplicando7").value;
	m14 = document.getElementById("multiplicador7").value;
	r7 = m13*m14;
	document.getElementById("resultado7").value = r7.toFixed(2);
    //---------------------------------
  m15 = document.getElementById("multiplicando8").value;
	m16 = document.getElementById("multiplicador8").value;
	r8 = m15*m16;
	document.getElementById("resultado8").value = r8.toFixed(2);
          //---------------------------------
  m17 = document.getElementById("multiplicando9").value;
	m18 = document.getElementById("multiplicador9").value;
	r9 = m17*m18;
	document.getElementById("resultado9").value = r9.toFixed(2);
    //---------------------------------
  m19 = document.getElementById("multiplicando10").value;
	m20 = document.getElementById("multiplicador10").value;
	r10 = m19*m20;
	document.getElementById("resultado10").value = r10.toFixed(2);
     //---------------------------------
  m21 = document.getElementById("multiplicando11").value;
	m22 = document.getElementById("multiplicador11").value;
	r11 = m21*m22;
	document.getElementById("resultado11").value = r11.toFixed(2);
      //---------------------------------
  m23 = document.getElementById("multiplicando12").value;
	m24 = document.getElementById("multiplicador12").value;
	r12 = m23*m24;
	document.getElementById("resultado12").value = r12.toFixed(2);
      //---------------------------------
  m25 = document.getElementById("multiplicando13").value;
	m26 = document.getElementById("multiplicador13").value;
	r13 = m25*m26;
	document.getElementById("resultado13").value = r13.toFixed(2);
      //---------------------------------
  m27 = document.getElementById("multiplicando14").value;
	m28 = document.getElementById("multiplicador14").value;
	r14 = m27*m28;
	document.getElementById("resultado14").value = r14.toFixed(2);
      //---------------------------------
  m29 = document.getElementById("multiplicando15").value;
	m30 = document.getElementById("multiplicador15").value;
	r15 = m29*m30;
	document.getElementById("resultado15").value = r15.toFixed(2);
  //---------------------------------
  m31 = document.getElementById("multiplicando16").value;
	m32 = document.getElementById("multiplicador16").value;
	r16 = m31*m32;
	document.getElementById("resultado16").value = r16.toFixed(2);
  //---------------------------------
  m33 = document.getElementById("multiplicando17").value;
	m34 = document.getElementById("multiplicador17").value;
	r17 = m33*m34;
	document.getElementById("resultado17").value = r17.toFixed(2);      
  
  //----------------------
     su1 = r+r2+r3+r4+r5+r6+r7+r8+r9+r10+r11+r12+r13+r14+r15+r16+r17;
	document.getElementById("subotal").value = su1.toFixed(2);
  
  //----Operacion 
  des = document.getElementById("descuento").value;
  ant = document.getElementById("anticipo").value;
   iva=(su1*1.16)-su1;
  document.getElementById("ivat").value = iva.toFixed(2);
  total=su1-des-ant;
  	document.getElementById("total").value = total.toFixed(2);
  
 
}
        

        
</script>
      
      
      
   

                
    </section>
  
                
                
           <script type="text/javascript">
$(document).ready(function() {
    $("form").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });
});
</script>     
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                <div class="card-footer" align="center">
                  <button id="boton2" name="boton2" type="submit" class="btn btn-primary">Guardar</button>
                
    
                 </div>
              </form>
            </div>
            <!-- /.card -->


          </div>
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>


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
  <aside