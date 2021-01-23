<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->

</head>

<body onload="init()" class="animate__animated animate__fadeIn">
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
          <!-- <div class="logo-image-big">
            <img src="assets/img/logo-big.png">
          </div> -->
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

            <li class="">
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

            <li class="active">
                <a href="./rextester.php">
                <i class="fas fa-atom"></i>
                    <p>Agrupador</p>
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
            <a class="navbar-brand" href="javascript:;">API rextester</a>
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

        <h4 class="card-title" style="text-align: center;">Agrupador con API Rextester</h4>
        <div class="row mb-5" style="justify-content: center;">
          
          <div class="col-md-3 col-lg-3 col-12 mt-3 mb-3">
            <select class="custom-select" id="tabla" name="tabla">
              <?php
                  $hostname_localhost ="68.70.164.26";
                  $database_localhost ="polizona_130";
                  $username_localhost ="polizona_130";
                  $password_localhost ="Cien+30=130";
                  
                  $conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
                  $consulta="SHOW TABLES FROM $database_localhost;";
                  $resultado=mysqli_query($conexion,$consulta);
                  if($conexion){
                      while($registro=mysqli_fetch_array($resultado)){
                          echo '<option value="'.$registro[0].'">'.$registro[0].'</option>';
                      }
                      json_encode($json);
                      mysqli_close($conexion);
                  }
                  else{
                      echo "error";
                  } 
              ?>
            </select>
          </div>

          <div class="col-md-3 col-lg-3 col-12 mt-3 mb-3">
            <select class="custom-select" id="columna1" name="columna1">
            </select>
          </div>

          <div class="col-md-3 col-lg-3 col-12 mt-3 mb-3">
            <select class="custom-select" id="columna2" name="columna2">
            </select>
          </div>

        </div>

        <form method="post" action>
          <div class="row mb-3" style="justify-content: center;">
            <div class="col-12 col-md-6 mb-3 mt-3"  style="align-items: center;">
              <h6 class="card-title" style="text-align: center;">Query 1</h4>
              <textarea class="form-control" name="query1" id="query1" rows="5"></textarea>
            </div>
            <div class="col-12 col-md-6 mb-3 mt-3"  style="align-items: center;">
              <h6 class="card-title" style="text-align: center;">Query 2</h4>
              <textarea class="form-control" name="query2" id="query2" rows="5"></textarea>
            </div>

          </div>

          <div class="row mb-3" style="text-align: center;">
            <div class="col-12">
              <button id="generar" type="button" class="btn btn-primary btn-lg btn-4">GENERAR QUERYS</button>
              <button id="generar" type="button" class="btn btn-primary btn-lg btn-4" onclick="cargarGOJS()">CARGAR DIAGRAMA</button>
              <button id="probabilidad" type="submit" class="btn btn-primary btn-lg btn-4 ml-2">GENERAR PROBABILIDADES</button>
              
            </div>
          </div>
        </form>


        <!-- GoJS -->
        <!-- <div id="sample" style="text-align: center;">
          <div id="myDiagramDiv" style="background-color: white; border: solid 1px black; width: 70%; height: 500px; display: inline-block; vertical-align: middle;"></div>
          <p></p></p><button class="btn btn-primary btn-lg btn-6" id="zoomToFit">Zoom to Fit</button>
        </div> -->

        <!-- TODO: Hacer Jquery del dom, llamar php para superquery, pintar tablas -->

        <!-- Superquerys -->
        <!-- Primer super query -->
        <div class="row mt-3" style="text-align: center;">
          
          <div class="col-md-6" style="display: inline-block; vertical-align: middle;">
            
            <div class="card">
              <div class="card-header">
                <h4 class="card-title" style="text-align: center;">Probabilidades Query 1</h4>
              </div>
              <div class="card-body">
                <div class="table">
                    <table class="table">
                      <thead class=" text-primary">
                        <tr>
                        <th>ID Empresa</th>
                        <th>Probabilidad</th>
                      </tr>
                      </thead>
                      <tbody id="tbody" name="tbody">
                      <?php
                        $hostname_localhost ="68.70.164.26";
                        $database_localhost ="polizona_130";
                        $username_localhost ="polizona_130";
                        $password_localhost ="Cien+30=130";

                        // $consulta= "select idempresa, count(*)/(select count(*) from embarque) as probabilidad from embarque where idempresa in(select distinct idempresa from embarque) group by idempresa";
                        $consulta = $_POST["query1"];
                        $conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
                        $resultado=mysqli_query($conexion,$consulta);

                        while($registro=mysqli_fetch_array($resultado)){
                            $result["ID_EMPRESA"]=$registro['idempresa'];
                            $result["Probabilidad"]=$registro['probabilidad'];
                            $json['Clasificador'][]=$result;

                            echo "<tr>";
                            echo "<td>".$registro['idempresa']." </td>";
                            echo "<td>".$registro['probabilidad']." </td>";
                            echo "</tr>";
                        }     
                        mysqli_close($conexion);
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
          
          <div class="col-md-6" style="display: inline-block; vertical-align: middle;">
            
            <div class="card">
              <div class="card-header">
                <h4 class="card-title" style="text-align: center;">Probabilidades Query 2</h4>
              </div>
              <div class="card-body">
                <div class="table">
                    <table class="table">
                      <thead class=" text-primary">
                        <tr>
                        <th>ID Empresa</th>
                        <th>ID Embarque</th>
                        <th>Probabilidad</th>
                      </tr>
                      </thead>
                      <tbody id="tbody" name="tbody">
                      <?php
                        $hostname_localhost ="68.70.164.26";
                        $database_localhost ="polizona_130";
                        $username_localhost ="polizona_130";
                        $password_localhost ="Cien+30=130";

                        // $consulta= "select idempresa, count(*)/(select count(*) from embarque) as probabilidad from embarque where idempresa in(select distinct idempresa from embarque) group by idempresa";
                        $consulta2 = $_POST["query2"];
                        $conexion2 = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
                        $resultado2=mysqli_query($conexion2,$consulta2);

                        while($registro2=mysqli_fetch_array($resultado2)){
                            $result2["ID_EMPRESA"]=$registro2['idempresa'];
                            $result2["ID_EMBARQUE"]=$registro2['idembarque'];
                            $result2["Probabilidad"]=$registro2['Probabilidad'];
                            $json['Clasificador'][]=$result2;

                            echo "<tr>";
                            echo "<td>".$registro2['idempresa']." </td>";
                            echo "<td>".$result2["ID_EMBARQUE"]." </td>";
                            echo "<td>".$result2["Probabilidad"]." </td>";
                            echo "</tr>";
                        }     
                        json_encode($json);
                        mysqli_close($conexion2);
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
        </div>

       <!-- EndContent -->
      </div>

    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gojs/2.1.33/go.js"
    integrity="sha512-e+2JWzMvFurScG1m+Z96IjHtIOOucjvsYjM3kmGDz/Q81Mlsp4sr9kJHkgafO70UMG2LAMxl96aLW7G6P0QnqA=="
    crossorigin="anonymous"></script>
  <script src="assets/js/gojs.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
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
  <script src="assets/js/func.js"></script>
</body>

</html>
