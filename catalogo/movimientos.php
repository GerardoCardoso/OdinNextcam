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
  <title>Movimientos | NextAdmin</title>
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
             <li class="nav-item">
            <a href="../calendario.php" class="nav-link">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Calendario</p>
            </a>
          </li>
                          <?php
          $nusuario = $_SESSION["nivel"];
if ($nusuario==1 || $nusuario==2 || $nusuario==3 || $nusuario==4) {
  # code...
?>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
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
if ($nusuario==1 || $nusuario==2 || $nusuario==3 || $nusuario==4) {
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


        ?>                    <?php
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
                <a href="productos.php" class="nav-link ">
                  <i class="fas fa-list-ol nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>
            </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="marcas.php" class="nav-link">
                  <i class="fas fa-columns nav-icon"></i>
                  <p>Marcas</p>
                </a>
              </li>
            </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="unidades.php" class="nav-link ">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Unidad</p>
                </a>
              </li>
            </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="categorias.php" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Categoria</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="movimientos.php" class="nav-link active">
                  <i class="fas fa-expand nav-icon"></i>
                  <p>Movimientos</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="inventario.php" class="nav-link ">
                  <i class="fas fa-archive nav-icon"></i>
                  <p>Inventarios</p>
                </a>
              </li>
            </ul>
               <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="proveedor.php" class="nav-link ">
                  <i class="fas fa-truck nav-icon"></i>
                  <p>Proveedores</p>
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

if ($nusuario==1 || $nusuario==2 || $nusuario==3 || $nusuario==4) {

  # code...
?>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                Servicios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="oservicio.pgp" class="nav-link ">
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
               <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="enviodeorden.php" class="nav-link">
                  <i class="fas fa-share nav-icon"></i>
                  <p>Envio de Orden</p>
                </a>
              </li>
            </ul>
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/servicios/cotizaciones.php" class="nav-link ">
                  <i class="fas fa-list-alt nav-icon"></i>
                  <p>Cotizaciones</p>
                </a>
              </li>
            </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/servicios/cotizacionesr.php" class="nav-link ">
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
                <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/servicios/recibos.php" class="nav-link">
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
            <h1>Movimientos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Movimientos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



        
    <section class="content">
 
           <div class="container-fluid">
                    <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Entrada de Mercancia</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
              <form action="entrada.php" method="post">
                <div class="form-row">
                   <div class="form-group  col-md-12">
                    <label for="ID">ID</label>
                     <?php 
                           include("../conexion.php");                     
$cont="SELECT count(*) FROM entradas";
$count = mysqli_query($con,$cont);
while($row=mysqli_fetch_array($count)){
$clientes=$row[0];
};
                       ?> 
                    <input type="text" class="form-control" id="ID" name="ID" value="<?php echo $clientes+1; ?>" disabled>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="producto">Producto</label>
                        <select class="form-control" id="producto" name="producto" required>
                   <option value="">Seleccionar opción</option>
                       <?php
 include("../conexion.php");     
          $query = $con -> query ("SELECT * FROM productos");
                       
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[nombre].' '.$valores[codigo].'</option>';
          }
          $con->close();
        ?>
                    </select>
                  </div>
                  <div class="form-group  col-md-3">
                    <label for="cantidad">Cantidad</label>
                    <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Introducir descripcion" required>
                  </div>
                    <div class="form-group  col-md-3">
                    <label for="unidad">Unidad</label>
                     <select class="form-control" id="unidad" name="unidad" required>
                   <option value="">Seleccionar opción</option>
                       <?php
 include("../conexion.php");     
          $query = $con -> query ("SELECT * FROM unidad");
                       
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
          }
          $con->close();
        ?>
                    </select>
                  </div>
                    <div class="form-group  col-md-6">
                    <label for="destino">Destino</label>
                     <select class="form-control" id="destino" name="destino" required>
                        <option value="">Seleccionar opción</option>
                         <option value="Almacen Central">Almacen Central</option>
                         <option value="Suc. Lázaro">Suc. Lázaro Cárdenas</option>
                      
                    </select>
                  </div>  
                  <div class="form-group  col-md-6">
                    <label for="odecompra">Orden de Compra</label>
                    <input type="text" class="form-control" id="odecompra" name="odecompra" placeholder="Introducir nombre de la cuenta" >
                  </div>
                   <div class="form-group  col-md-6">
                    <label for="tentrada">Tipo de Entrada</label>
                       <select class="form-control" id="tentrada" name="tentrada" required>
                   <option value="">Seleccionar opción</option>
                         <option value="Compra">Compra</option>
                         <option value="Ajuste">Ajuste</option>
                         <option value="En existencia">En existencia</option>
                      
                    </select>
                  </div>
                    <div class="form-group  col-md-6">
                    <label for="observaciones">Observaciones</label>
                    <input type="text" class="form-control" id="observaciones" name="observaciones" placeholder="Introducir nombre de la cuenta" >
                  </div>
                  
                  
                  
                </div>

                <div class="card-footer" align="center">
                  <button id="bentrada" name="bentrada" type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>
              </div>
            </div>
            <!-- /.card -->


          </div>
                      
                      <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Salida de Mercancia</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
              <form action="salida.php" method="post">
                <div class="form-row">
                  <div class="form-group  col-md-12">
                    <label for="ID">ID</label>
                     <?php 
                           include("../conexion.php");                     
                           $cont="SELECT count(*) FROM salidas";
$count = mysqli_query($con,$cont);
while($row=mysqli_fetch_array($count)){
$clientes2=$row[0];
};
                       ?> 
                    <input type="text" class="form-control" id="ID" name="ID" value="<?php echo $clientes2+1; ?>" disabled>
                  </div>
                 <div class="form-group  col-md-6">
                    <label for="producto2">Producto</label>
                        <select class="form-control" id="producto2" name="producto2" required>
                   <option value="">Seleccionar opción</option>
                       <?php
 include("../conexion.php");     
          $query = $con -> query ("SELECT * FROM productos");
                       
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[nombre].' '.$valores[codigo].'</option>';
          }
          $con->close();
        ?>
                    </select>
                  </div>
                  <div class="form-group  col-md-3">
                    <label for="cantidad2">Cantidad</label>
                    <input type="text" class="form-control" id="cantidad2" name="cantidad2" required>
                  </div>
                    <div class="form-group  col-md-3">
                    <label for="unidad2">Unidad</label>
                     <select class="form-control" id="unidad2" name="unidad2" required>
                   <option value="">Seleccionar opción</option>
                       <?php
 include("../conexion.php");     
          $query = $con -> query ("SELECT * FROM unidad");
                       
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
          }
          $con->close();
        ?>
                    </select>
                  </div>
                    <div class="form-group  col-md-6">
                    <label for="salida">Salida</label>
                     <select class="form-control" id="salida" name="salida" required>
                        <option value="">Seleccionar opción</option>
                         <option value="Almacen Central">Almacen Central</option>
                         <option value="Suc. Lázaro">Suc. Lázaro Cárdenas</option>
                      
                    </select>
                  </div>  
                  <div class="form-group  col-md-6">
                    <label for="pedimento">Pedimento</label>
                    <input type="text" class="form-control" id="pedimento" name="pedimento" >
                  </div>
                   <div class="form-group  col-md-6">
                    <label for="tsalida">Tipo de Salida</label>
                       <select class="form-control" id="tsalida" name="tsalida" required>
                   <option value="">Seleccionar opción</option>
                         <option value="Venta">Venta</option>
                         <option value="Transferencia de Salida">Transferencia de Salida</option>
                         <option value="Devolución de Compra">Devolución de Compra</option>
                         <option value="Servicio">Servicio</option>
                      
                    </select>
                  </div>
                    <div class="form-group  col-md-6">
                    <label for="observaciones">Observaciones</label>
                    <input type="text" class="form-control" id="observaciones" name="observaciones" >
                  </div>
                  
                </div>

                <div class="card-footer" align="center">
                  <button id="bsalida" name="bsalida" type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>
                        </div>
            <!-- /.card -->


          </div>
          
       
      </div>
            
                           
              <?php
    include("../conexion.php");                     
$cont="SELECT count(*) FROM entradas";
$count = mysqli_query($con,$cont);
while($row=mysqli_fetch_array($count)){
$firmas=$row[0];
};
$producto2 = array();
$cantidad2 = array();
$nproducto2 = array();
$destino2 = array();
$tdentrada2 = array();
$fecha2 = array();
$hora = array();

for ($i=0; $i < $firmas ; $i++) { 

$sql1="SELECT producto FROM entradas";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $producto2[]=$row1['producto'];
    };
    $sql2="SELECT cantidad FROM entradas";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $cantidad2[]=$row2['cantidad'];
    };  
  $sql12="SELECT destino FROM entradas";
    $res12 = mysqli_query($con,$sql12);
    while($row12=mysqli_fetch_array($res12)){
      $destino2[]=$row12['destino'];
    };  
    $sql3="SELECT tdeentrada FROM entradas";
    $res3 = mysqli_query($con,$sql3);
    while($row3=mysqli_fetch_array($res3)){
      $tdentrada2[]=$row3['tdeentrada'];
    };
  $sql3="SELECT fecha FROM entradas";
    $res3 = mysqli_query($con,$sql3);
    while($row3=mysqli_fetch_array($res3)){
      $fecha2[]=$row3['fecha'];
    };
    $sql3="SELECT hora FROM entradas";
    $res3 = mysqli_query($con,$sql3);
    while($row3=mysqli_fetch_array($res3)){
      $hora[]=$row3['hora'];
    };
  
   $sql7="SELECT nombre FROM productos where id = '$producto2[$i]' ";
    $res7 = mysqli_query($con,$sql7);
    while($row7=mysqli_fetch_array($res7)){
      $nproducto2[]=$row7['nombre'];
    };

}  
$con->close();
  setlocale(LC_MONETARY, 'en_US');
 ?>
          <div class="row">
                 <div class="col-md-6">
            <!-- general form elements -->
          <div class="row">
          <div class="col-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Tabla de entradas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                      <th>Producto</th>
                      <th>Cantidad</th>
                      <th>Destino</th>
                      <th>Tipo</th>
                      <th>Fecha</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php  for ($i=0; $i <$firmas; $i++) { 
                          echo '<tr>';
                          echo '<th scope="row">'.($i+1).'</th>';
                          echo '<td>'.$nproducto2[$i].'</td>';
                          echo '<td>'.$cantidad2[$i].'</td>';
                          echo '<td>'.$destino2[$i].'</td>';
                          echo '<td>'.$tdentrada2[$i].'</td>';
                          echo '<td>'.$fecha2[$i].'</td>';
                          echo '</tr>';
                          } ?>
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
            <!-- /.card -->


          </div>
              <div class="col-md-6">
            <!-- general form elements -->
                                           
              <?php
    include("../conexion.php");                     
$cont="SELECT count(*) FROM salidas";
$count = mysqli_query($con,$cont);
while($row=mysqli_fetch_array($count)){
$salidas=$row[0];
};
$producto = array();
$cantidad = array();
$nproducto = array();
$destino = array();
$tdentrada = array();
$fecha = array();
$hora = array();

for ($i=0; $i < $salidas ; $i++) { 

$sql1="SELECT producto FROM salidas";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $producto[]=$row1['producto'];
    };
    $sql2="SELECT cantidad FROM salidas";
    $res2 = mysqli_query($con,$sql2);
    while($row2=mysqli_fetch_array($res2)){
      $cantidad[]=$row2['cantidad'];
    };  
  $sql12="SELECT salida FROM salidas";
    $res12 = mysqli_query($con,$sql12);
    while($row12=mysqli_fetch_array($res12)){
      $destino[]=$row12['salida'];
    };  
    $sql3="SELECT tdesalida FROM salidas";
    $res3 = mysqli_query($con,$sql3);
    while($row3=mysqli_fetch_array($res3)){
      $tdentrada[]=$row3['tdesalida'];
    };
  $sql3="SELECT fecha FROM salidas";
    $res3 = mysqli_query($con,$sql3);
    while($row3=mysqli_fetch_array($res3)){
      $fecha[]=$row3['fecha'];
    };
   $sql7="SELECT nombre FROM productos where id = '$producto[$i]' ";
    $res7 = mysqli_query($con,$sql7);
    while($row7=mysqli_fetch_array($res7)){
      $nproducto[]=$row7['nombre'];
    };

}  
$con->close();
  setlocale(LC_MONETARY, 'en_US');
 ?>
        <div class="row">
          <div class="col-12">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Tabla de salidas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example3" class="table table-bordered table-striped">
                  <thead>
                 <tr>
                    <th>ID</th>
                      <th>Producto</th>
                      <th>Cantidad</th>
                      <th>Destino</th>
                      <th>Tipo</th>
                      <th>Fecha</th>
                  </tr>
                  </thead>
                  <tbody>
                 <?php  for ($i=0; $i <$salidas; $i++) { 
                          echo '<tr>';
                          echo '<th scope="row">'.($i+1).'</th>';
                          echo '<td>'.$nproducto[$i].'</td>';
                          echo '<td>'.$cantidad[$i].'</td>';
                          echo '<td>'.$destino[$i].'</td>';
                          echo '<td>'.$tdentrada[$i].'</td>';
                          echo '<td>'.$fecha[$i].'</td>';
                          echo '</tr>';
                          } ?>
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>


          </div>
             </div>
      </div>
    </section>
   
  
 
  
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
  <script>
  $(function () {
    $("#example3").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example4').DataTable({
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
