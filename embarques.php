<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Ingenieria del conocimiento
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet"> -->
  <script src="https://kit.fontawesome.com/b0ca353536.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  
</head>

<?php
  $hostname_localhost ="68.70.164.26";
  $database_localhost ="polizona_mercado";
  $username_localhost ="polizona_estudiante";
  $password_localhost ="UPIICSAes#1";
  $json=array();
  $jsonTwo=array();

    $opcion = $_GET["opciones"];
    $conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
    $consulta="select idembarque, idalmacen, unidades, costoembarque from embarque where idempresa='130';";
    $resultado=mysqli_query($conexion,$consulta);
    $suma=0;                            
?>

<body class="animate__animated animate__fadeIn">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://github.com/DavichoDev" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="https://res.cloudinary.com/davicho/image/upload/v1611216180/header_afu4z3.jpg">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="https://github.com/DavichoDev" class="simple-text logo-normal">
          David Carmona
        </a>
      </div>

      <div class="sidebar-wrapper">
      <ul class="nav">
            <li class="">
                <a href="./index.php">
                <i class="fab fa-dashcube"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="active">
                <a href="./embarques.php">
                <i class="fas fa-ship"></i>
                    <p>Embarques</p>
                </a>
            </li>

            <li class="">
                <a href="./agrupacion.php">
                <i class="fas fa-object-group"></i>
                    <p>Clasificador</p>
                </a>
            </li>

            <li class="">
                <a href="./rextester.php">
                <i class="fas fa-atom"></i>
                    <p>API Rextester</p>
                </a>
            </li>
            
        </ul>
      </div>

    </div>

    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Embarques</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="content">
          
        <!-- Tabla -->
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" style="text-align: center;">Embarques 130</h4>
                </div>
                <div class="card-body">
                  <div class="table">
                    <table class="table">
                      <thead class=" text-primary">
                        <tr>
                        <th>ID Embarque</th>
                        <th>ID Almacen</th>
                        <th>Unidades</th>
                        <th>CTO Embarque</th>
                      </tr>
                    </thead>
                      <tbody>
                      <?PHP
                        while($registro=mysqli_fetch_array($resultado)){
                          $result["ID_Embarque"]=$registro['idembarque'];
                          $result["ID_Almacen"]=$registro['idalmacen'];
                          $result["Unidades"]=$registro['unidades'];
                          $result["CostoEmbarque"]=$registro['costoembarque'];
                          $json['Clasificador'][]=$result;
                          $jsonTwo=$result;
                      
                          echo "<tr>";
                            echo "<td>".$registro['idembarque']." </td>";
                            echo "<td>".$registro['idalmacen']." </td>";
                            echo "<td>".$registro['unidades']." </td>";
                            echo "<td>".$registro['costoembarque']." </td>";
                          echo "</tr>";
                        }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
         </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title" style="text-align: center;">JSON</h4>
              </div>
              <div class="card-body">
                <?php 
                  
                  echo "<p>".json_encode($json, JSON_NUMERIC_CHECK)."</p>";
                  mysqli_close($conexion);
                ?>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>



</body>
</html>
