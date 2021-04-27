<?php
// Iniciamos la sesion
session_start();

//// Verifica si la variable de sesión SESS_MEMBER_ID está presente o no
if (isset($_SESSION["clave"])  == "hzhOiLvy-i={9F[jWONj"){
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
if ($nusuario==1 || $nusuario==2 || $nusuario==3 || $nusuario==4 ){
  # code...
?>
<?php
  setlocale(LC_MONETARY, 'en_US');
  include("../conect2.php"); 
  $objdata = new Database();
  //$prepquery = new Database();
  if(isset($_GET['opcion'])){
    $sth1=$objdata->prepare('SELECT * FROM cotizacion WHERE id = :idUser');
    $sth1->bindParam(':idUser', $_GET['opcion']);
    $sth1->execute();
    $result1 = $sth1->fetchAll();
  }

  $sth=$objdata->prepare('SELECT * FROM cotizacion');
  $sth->execute();

  $result = $sth->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Recibos | NextAdmin</title>
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
  <!-- Estilo CSS Personalizado -->
  <style type="text/css">
    .form-control::placeholder {
        color: #495057;
        opacity: 1;
     }
  </style>
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
                <a href="../catalogo/productos.php" class="nav-link ">
                  <i class="fas fa-list-ol nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>
            </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../catalogo/marcas.php" class="nav-link">
                  <i class="fas fa-columns nav-icon"></i>
                  <p>Marcas</p>
                </a>
              </li>
            </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../catalogo/unidades.php" class="nav-link ">
                  <i class="fas fa-plus-square nav-icon"></i>
                  <p>Unidad</p>
                </a>
              </li>
            </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../catalogo/categorias.php" class="nav-link ">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Categoria</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../catalogo/movimientos.php" class="nav-link ">
                  <i class="fas fa-expand nav-icon"></i>
                  <p>Movimientos</p>
                </a>
              </li>
            </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../catalogo/inventario.php" class="nav-link ">
                  <i class="fas fa-archive nav-icon"></i>
                  <p>Inventarios</p>
                </a>
              </li>
            </ul>
               <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../catalogo/proveedor.php" class="nav-link ">
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
                <a href="#" class="nav-link">
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
                <a href="recibos.php" class="nav-link active">
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
            <h1>Recibos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Recibos</li>
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
                <h3 class="card-title">Creación de recibo</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <script>
              function buscar(){
              var opcion = document.getElementById('userN').value;
                window.location = 'http://odin.nextcam.com.mx/servicios/recibos.php?opcion='+opcion;
              }
              </script>
              
               <div class="card-body">
              <form action="recibog.php" method="POST">
                <?php
                  // Se incluye la conexión para todos los <input>
                  include("../conexion.php");
                ?>
                <!-- Fila 1 -->
                <div class="row mb-2 border-right">
                  <div class="col-md-4">
                    <label>Cotización</label>
                    <select class="form-control" id="userN" name="userN" onchange="return buscar();" required >
                      <?php
                      if($result1){?>
                        <option value="<?php echo $result1[0]['id'];?>">NXT
                             <?php echo $result1[0]['id']. ' '.$result1[0]['fecha']. ' '.money_format('%(#10n',$result1[0]['total']);?>
                        </option>
                      <?php }?>
                      <option value=""></option>
                      <?php
                      foreach ($result as $key => $value){?>
                        <option value="<?php echo $value['id'];?>">NXT<?php echo $value['id'].' '.$value['fecha']. ' '.money_format('%(#10n',$value['total']);?></option>
                      <?php }?>
                    </select>
                  </div>
                  <!-- Esta columna se encuentra oculta -->
                  <div class="d-none">
                    <label>No. Cliente</label>
                    <?php
                      if(isset($result1)){?>
                          <input type="hidden"  class="form-control" name="id" value="<?php echo $result1[0]['cliente'];?>" readonly />
                      <?php
                      }else{?>
                          <input type="hidden"  class="form-control" name="id" value="" readonly/>
                      <?php
                      }
                    ?>
                  </div>
                  
                  <div class="col-md-4">
                    <label>Cliente</label>
                    <?php
                      if(isset($result1)){?>
                        <input type="text"  class="form-control" name="nombre" onchange="return buscar2();" value="<?php 
                          $idcli = $result1[0]['cliente'];
                          $cont="SELECT nombre FROM clientes where id='$idcli'";
                          $count = mysqli_query($con,$cont);
                          while($row=mysqli_fetch_array($count)){
                            $clientes=$row[0];
                          };

                          $cont="SELECT appaterno FROM clientes where id='$idcli'";
                          $count = mysqli_query($con,$cont);
                          while($row=mysqli_fetch_array($count)){
                            $ap=$row[0];
                          };
                          echo $clientes. ' '.$ap;  ?>" readonly 
                        />
                    <?php
                    }else{?>
                      <input type="text"  class="form-control" name="nombre" value="" readonly/>
                    <?php
                     }
                    ?>
                  </div>
                  <div class="col-md-4">
                    <label>Plazos</label>
                    <input type="text" class="form-control" id="pagos" name="pagos" required>
                  </div>
                </div>
                
                <!-- Fila 2 -->
                <div class="row mb-2">
                  <div class="col-md-4">
                    <label>Dirección</label>
                    <?php
                    if(isset($result1)){?>
                      <input type="text"  class="form-control" name="direccion" onchange="return buscar2();" value="<?php 
                        $idcli = $result1[0]['cliente'];
                        $cont="SELECT direccion FROM clientes where id='$idcli'";
                        $count = mysqli_query($con,$cont);
                        while($row=mysqli_fetch_array($count)){
                          $dir=$row[0];
                        };                
                        $cont="SELECT numero FROM clientes where id='$idcli'";
                        $count = mysqli_query($con,$cont);
                        while($row=mysqli_fetch_array($count)){
                          $numero=$row[0];
                        };    
                        $cont="SELECT colonia FROM clientes where id='$idcli'";
                        $count = mysqli_query($con,$cont);
                        while($row=mysqli_fetch_array($count)){
                          $colonia=$row[0];
                        }; 
                                          $cont="SELECT ciudad FROM clientes where id='$idcli'";
                        $count = mysqli_query($con,$cont);
                        while($row=mysqli_fetch_array($count)){
                          $ciudad=$row[0];
                        }; 
                        echo $dir. ' '.$numero.' '.$colonia.' '.$ciudad;  ?>" readonly 
                      />
                    <?php
                    }else{?>
                      <input type="text"  class="form-control" name="direccion" value="" readonly/>
                    <?php
                     }
                    ?>
                  </div>
                  <div class="col-md-4">
                    <label>Teléfono</label>
                    <?php
                    if(isset($result1)){?>
                      <input type="text"  class="form-control" name="telefono" onchange="return buscar2();" value="<?php 
                         $idcli = $result1[0]['cliente'];
                         $cont="SELECT celular FROM clientes where id='$idcli'";
                         $count = mysqli_query($con,$cont);
                         while($row=mysqli_fetch_array($count)){
                          $cel=$row[0];
                         };    
                         echo $cel;
                      ?>" readonly />
                      <?php
                      }else{?>
                        <input type="text"  class="form-control" name="telefono" value="" readonly/>
                    <?php
                      }
                    ?>
                  </div>
                  <div class="col-md-4">
                    <label>Correo</label>
                    <?php
                    if(isset($result1)){?>
                      <input type="email"  class="form-control" name="correo" id="correo" onchange="return buscar2();" value="<?php  
                        $idcli = $result1[0]['cliente'];
                        $cont="SELECT mail FROM clientes where id='$idcli'";
                        $count = mysqli_query($con,$cont);
                        while($row=mysqli_fetch_array($count)){
                          $cor=$row[0];
                        };
                        echo $cor;
                      ?>" required />
                      <?php
                        }else{?>
                        <input type="email"  class="form-control" name="correo" value="" required />
                      <?php
                        }
                      ?>
                  </div>
                </div>
                
                <!-- Fila 3 -->                
                <div class="row mb-3">
                  <div class="col-md-4">
                    <label>Fecha</label>
                    <input type="text" class="form-control" id="fecha" name="fecha" placeholder="<?php date_default_timezone_set('UTC'); $fecha_actual=date("d/m/Y"); echo $fecha_actual;?>" readonly>
                  </div>
                  <div class="col-md-4">
                    <label>Folio</label>
                    <input type="text" class="form-control" id="folio" name="folio" value="RNXT <?php        
                        $cont="SELECT count(*) FROM recibos";
                        $count = mysqli_query($con,$cont);
                        while($row=mysqli_fetch_array($count)){
                          $clientes=$row[0];
                        };
                       echo $clientes+1;
                       ?>" placeholder="RNXT 00" readonly
                     >
                  </div>
                  <div class="col-md-4">
                    <label>Forma de Pago</label>
                    <select class="form-control" id="fpago" name="fpago" required>
                      <option value="">Seleccionar opción</option>
                       <?php
                          $query = $con -> query ("SELECT * FROM fpago");
                       
                          while($valores = mysqli_fetch_array($query)){
                            echo '<option value="'.$valores[id].'">'.$valores[descripcion].'</option>';
                          }
  
                          $con->close();
                       ?>
                    </select>
                  </div>
                </div>
                
                <div class="row">  
                  <div class="form-group col-md-12">
                    <label for="descripcion">Descripción:</label>
                    <textarea class="form-control" rows="5" id="descripcion" name="descripcion"></textarea>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="tot">Cantidad Total:</label>
                      <?php
                        if(isset($result1)){?>
                          <input type="text" class="form-control" name="tot" id="tot" value="<?php echo $result1[0]['total'];?>" readonly />
                      <?php
                        }else{?>
                          <input type="text"  class="form-control" name="tot" id="total22" value="" readonly/>
                      <?php
                        }
                      ?>
                  </div>
                  
                  <div class="form-group col-md-4">
                    <label for="abono">Abono:</label>
                    <input type="text"  class="form-control" name="abono" id="abono" onChange="multiplicar();" value="0.00"  />
                  </div>
                  <div class="form-group col-md-4">
                    <label for="total">Restante:</label>
                    <input type="text" class="form-control"  id="total"  name="total"  readonly/>
                  </div>
                    
                  <script type="text/javascript">
                    function multiplicar(){
                      total = document.getElementById("tot").value;
                      abono = document.getElementById("abono").value;
                      r = total-abono;
                      document.getElementById("total").value = r.toFixed(2);
                    }
                  </script>      
                 </div>
                <div class="row">
                  <div class="form-group col-md-4">
                    <label for="total">
                      Firma
                    </label>
                    
                  </div>
                </div>
                
                 <div class="card-footer" align="center">
                  <button id="boton2" name="boton2" type="submit" class="btn btn-primary">Generar recibo</button>
                 </div>
              </form>
                 
              </div>
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
</body>
</html>
 <?php
        }else{
   header("location: http://odin.nextcam.com.mx/404.php");
}


        ?>