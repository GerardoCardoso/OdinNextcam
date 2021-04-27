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
if ($nusuario==1 || $nusuario==2 || $nusuario==3  || $nusuario==4 || $nusuario==5) {
  # code...
?>
    <!DOCTYPE html>
    <html>

    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Editar Cliente | NextOdin</title>
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
                Inicio</p>
            </a>
                </li>
                < <li class="nav-item">
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
if ($nusuario==1 || $nusuario==2  || $nusuario==3) {
  # code...
?>

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
                              <a href="/catalogo/usuarios.php" class="nav-link ">
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
                                  <a href="clientes.php" class="nav-link active">
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
                                      <a href="/catalogo/firmas.php" class="nav-link ">
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
                                      <a href="marcas.php" class="nav-link ">
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
                                      <a href="categorias.php" class="nav-link ">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Categoria</p>
                </a>
                                    </li>
                                  </ul>
                                  <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                      <a href="movimientos.php" class="nav-link ">
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
                                      <a href="asistencia.php" class="nav-link ">
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
if ($nusuario==1 || $nusuario==2 || $nusuario==3 || $nusuario==4 || $nusuario==5  ) {
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
                                  <a href="/servicios/oservicio.php" class="nav-link ">
                  <i class="fas fa-id-card nav-icon"></i>
                  <p>Orden de Servicio</p>
                </a>
                                </li>
                              </ul>
                              <ul class="nav nav-treeview">
                                <li class="nav-item">
                                  <a href="/servicios/orealizadas.php" class="nav-link ">
                  <i class="fas fa-archive nav-icon"></i>
                  <p>Ordenes Realizadas</p>
                </a>
                                </li>
                              </ul>
                              <ul class="nav nav-treeview">
                                <li class="nav-item">
                                  <a href="/servicios/enviodeorden.php" class="nav-link">
                  <i class="fas fa-share nav-icon"></i>
                  <p>Envio de Orden</p>
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


        ?>
                                <?php
          $nusuario = $_SESSION["nivel"];
if ($nusuario==1 || $nusuario==2 || $nusuario==3 || $nusuario==4 || $nusuario==5  ) {
  # code...
?>
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
                                      <a href="/servicios/enviodecotizacion.php" class="nav-link">
                  <i class="fas fa-paper-plane nav-icon"></i>
                  <p>Envio de Cotización</p>
                </a>
                                    </li>
                                  </ul>

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
                                          <a href="/servicios/levantamiento.php" class="nav-link ">
                  <i class="fas fa-car nav-icon"></i>
                  <p>Levantamiento</p>
                </a>
                                        </li>
                                      </ul>

                                      <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                          <a href="/servicios/ventas.php" class="nav-link ">
                  <i class="fas fa-cart-plus nav-icon"></i>
                  <p>Ventas</p>
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
                  <h1>Clientes</h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Clientes</li>
                  </ol>
                </div>
              </div>
            </div>
            <!-- /.container-fluid -->
          </section>


          
            <?php
          $nusuario = $_SESSION["nivel"];
if ($nusuario==1 || $nusuario==2 || $nusuario==3 || $nusuario==4 || $nusuario==5 ) {
  # code...
include("../conexion.php");    
$cliente=$_POST['codigo'];
  
                 
$referencia = array();  
$nombre = array(); 
$appaterno = array();
$amaterno = array();
$email = array();
$telefono = array();
$celular = array();
$nempresa = array();
$rfc = array();
$nfiscal = array();
$direccion = array();
$nexterior = array();
$colonia = array();
$estado = array();
$municipio = array();
$nestado = array();
$nmunicipio = array();
  
$sql1="SELECT titulo FROM clientes where id ='$cliente'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $referencia[]=$row1['titulo'];
    };               
  $sql1="SELECT nombre FROM clientes where id ='$cliente'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $nombre[]=$row1['nombre'];
    };  
    $sql1="SELECT appaterno FROM clientes where id ='$cliente'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $appaterno[]=$row1['appaterno'];
    };  
      $sql1="SELECT amaterno FROM clientes where id ='$cliente'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $amaterno[]=$row1['amaterno'];
    };  
  $sql1="SELECT mail FROM clientes where id ='$cliente'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $email[]=$row1['mail'];
    };  
  $sql1="SELECT telefono FROM clientes where id ='$cliente'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $telefono[]=$row1['telefono'];
    };  
  $sql1="SELECT celular FROM clientes where id ='$cliente'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $celular[]=$row1['celular'];
    };  
    $sql1="SELECT nempresa FROM clientes where id ='$cliente'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $nempresa[]=$row1['nempresa'];
    };  
    $sql1="SELECT rfc FROM clientes where id ='$cliente'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $rfc[]=$row1['rfc'];
    };  
    $sql1="SELECT nfacturacion FROM clientes where id ='$cliente'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $nfiscal[]=$row1['nfacturacion'];
    };  
  
      $sql1="SELECT direccion FROM clientes where id ='$cliente'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $direccion[]=$row1['direccion'];
    };  
  
      $sql1="SELECT numero FROM clientes where id ='$cliente'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $nexterior[]=$row1['numero'];
    };  
  
      $sql1="SELECT colonia FROM clientes where id ='$cliente'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $colonia[]=$row1['colonia'];
    }; 
  
        $sql1="SELECT estado FROM clientes where id ='$cliente'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $estado[]=$row1['estado'];
    };  
  
        $sql1="SELECT municipio FROM clientes where id ='$cliente'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $municipio[]=$row1['municipio'];
    };  
  
          $sql1="SELECT nombre FROM estados where id ='$estado[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $nestado[]=$row1['nombre'];
    };  
  
        $sql1="SELECT nombre_municipio FROM municipios where id ='$municipio[0]'";
    $res1 = mysqli_query($con,$sql1);
    while($row1=mysqli_fetch_array($res1)){
      $nmunicipio[]=$row1['nombre_municipio'];
    }; 
  
  
  
  
?>
             <section class="content">
                  <div class="container-fluid">



                    <div class="row">
                      <!-- left column -->
                      <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-warning">
                          <div class="card-header">
                            <h3 class="card-title">Editar Cliente</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <!-- form start -->
                          <div class="card-body">
                            <form action="editarcliente.php" method="post">
                              <div class="form-row">
                                <input type="hidden" name="codigo" value="<?php echo $cliente; ?>" />
                                <div class="form-group col-md-3">
                                  <label for="nombre">Referencia</label>
                                  <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $referencia[0]; ?>" required>
                                </div>
                                <div class="form-group col-md-3">
                                  <label for="nombre">Nombre</label>
                                  <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre[0]; ?>" required>
                                </div>
                                <div class="form-group col-md-3">
                                  <label for="apaterno">Apellido Paterno</label>
                                  <input type="text" class="form-control" id="apaterno" name="apaterno" value="<?php echo $appaterno[0]; ?>" required>
                                </div>
                                <div class="form-group col-md-3">
                                  <label for="amaterno">Apellido Materno</label>
                                  <input type="text" class="form-control" id="amaterno" name="amaterno" value="<?php echo $amaterno[0]; ?>">
                                </div>
     
                                <div class="form-group col-md-4">
                                  <label for="email">Email</label>
                                  <input type="email" class="form-control" id="email" name="email" value="<?php echo $email[0]; ?>" required>
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="telefono">Teléfono</label>
                                  <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono[0]; ?>" pattern="[0-9]{10}">
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="celular">Celular</label>
                                  <input type="tel" class="form-control" id="celular" name="celular" value="<?php echo $celular[0]; ?>" pattern="[0-9]{10}" required>
                                </div>

                                <div class="form-group col-md-4">
                                  <label for="nempresa">Nombre de Empresa</label>
                                  <input type="text" class="form-control" id="nempresa" name="nempresa" value="<?php echo $nempresa[0]; ?>" >
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="nfiscal">Nombre Fiscal</label>
                                  <input type="text" class="form-control" id="nfiscal" name="nfiscal" value="<?php echo $nfiscal[0]; ?>" >
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="rfc">RFC</label>
                                  <input type="text" class="form-control" id="rfc" name="rfc" value="<?php echo $rfc[0]; ?>" >
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="direccion">Direccion</label>
                                  <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $direccion[0]; ?>" required>
                                </div>
                                <div class="form-group col-md-2">
                                  <label for="nexterior">Número Exterior</label>
                                  <input type="text" class="form-control" id="nexterior" name="nexterior" value="<?php echo $nexterior[0]; ?>" required>
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="colonia">Colonia</label>
                                  <input type="text" class="form-control" id="colonia" name="colonia" value="<?php echo $colonia[0]; ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="estado">Estado</label>
                                  <select class="form-control" id="estado" name="estado" required>
                    <option value="<?php echo $estado[0]; ?>"><?php echo $nestado[0]; ?></option>
        <?php
 include("../conexion.php");     
          $query = $con -> query ("SELECT * FROM estados");
          while ($valores = mysqli_fetch_array($query)) {
// En esta sección estamos llenando el select con datos extraidos de una base de datos.
            echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
          }
          $con->close();
        ?>
                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                  <label for="municipio">Municipio</label>
                                  <select class="form-control" id="municipio" name="municipio" required>
                    <option value="<?php echo $municipio[0]; ?>"><?php echo $nmunicipio[0]; ?></option>
        <?php
 include("../conexion.php");     
          $query = $con -> query ("SELECT * FROM municipios");
          while ($valores = mysqli_fetch_array($query)) {
// En esta sección estamos llenando el select con datos extraidos de una base de datos.
            echo '<option value="'.$valores[id].'">'.$valores[nombre_municipio].'</option>';
          }
          $con->close();
        ?>
                    </select>
                                </div>


                              </div>
                              <!-- /.card-body -->

                              <div class="card-footer" align="center">
                                <button id="boton2" name="boton2" type="submit" class="btn btn-warning">Actualizar</button>
                                <button id="btnregresar" name="btnregresar" type="button" class="btn btn-danger">Cancelar</button>
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
          <script>
          btnregresar.addEventListener("click",function() {
  window.history.back();
}
,false);</script>
              <?php
        }else{}
        ?>


                

        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
          <strong>Copyright &copy; 2020-2021 <a >Nextcam</a></strong> Todos los derechos reservados
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
      
    </body>

    </html>
    <?php
        }else{
   header("location: http://odin.nextcam.com.mx/404.php");
}


        ?>