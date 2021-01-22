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
</head>

<?PHP
    // Cambiar datos para entrar a la base de datos
    $hostname_localhost ="68.70.164.26";
    $database_localhost ="polizona_mercado";
    $username_localhost ="polizona_estudiante";
      $password_localhost ="UPIICSAes#1";
    $json=array();
    $jsonTwo=array();
  
      $opcion = 130;
  
      $conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
          
      $consulta="select idembarque, idalmacen, unidades, costoembarque from embarque where idempresa='130';";
      $resultado=mysqli_query($conexion,$consulta);
      
      //Id Industria
      $consultaID="select idindustria from empresa where idempresa='".$opcion."';";
      $resultadoID=mysqli_query($conexion,$consultaID);
  
      //Mercado
      $consultaMercado="select mercado from empresa where idempresa='".$opcion."';";
      $resultadoMercado=mysqli_query($conexion,$consultaMercado);
  
      // Nombre
      $consultaEnc="select nbindustria from industria where idindustria =(".substr($consultaID, 0, -1).");";
          $resultadoEnc=mysqli_query($conexion,$consultaEnc);
  
      //Encadenamiento
      $consultaCadena="select idcompradora, idvendedora, coeficiente from encadenamiento where idcompradora=(".substr($consultaID, 0, -1).");";
      $resultadoCadena=mysqli_query($conexion,$consultaCadena);
  
      //Competidores
      $consultaCompe="select idempresa, nbempresa, idindustria, mercado from empresa where idindustria=(".substr($consultaID, 0, -1).") and mercado=(".substr($consultaMercado, 0, -1).");";
      $resultadoCompe=mysqli_query($conexion,$consultaCompe);
      
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

            <li class="active">
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
            <a class="navbar-brand" href="javascript:;">Clasificador</a>
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
      <?PHP
        
        for ($i=0; $i < count($json["Clasificador"]); $i++) { 
          if ($json["Clasificador"][$i]['ID_Almacen'] == 1) {
            $sumaCostoUno += $json["Clasificador"][$i]['CostoEmbarque'];
            $sumaUnidadUno += $json["Clasificador"][$i]['Unidades'];
          }
        }
        for ($i=0; $i < count($json["Clasificador"]); $i++) { 
          if ($json["Clasificador"][$i]['ID_Almacen'] == 2) {
            $sumaCostoDos += $json["Clasificador"][$i]['CostoEmbarque'];
            $sumaUnidadDos += $json["Clasificador"][$i]['Unidades'];
          }
        }

        $promedioInsumo1 = $sumaCostoUno/$sumaUnidadUno;
        $promedioInsumo2 = $sumaCostoDos/$sumaUnidadDos;
      ?>

      <h4 class="card-title" style="text-align: center;">Datos de la industria</h4>

      <?php
        // Nombre
        while($registroEnc=mysqli_fetch_array($resultadoEnc)){
          $resultEnc["ID_Industria"]=$registroEnc['idindustria'];
          $resultEnc["Nombre_Industria"]=$registroEnc['nbindustria'];
        }	
        
        // ID
        while($registroID=mysqli_fetch_array($resultadoID)){
          $resultID["ID_Industria"]=$registroID['idindustria'];
        }
  
        // Mercado
        while($registroMercado=mysqli_fetch_array($resultadoMercado)){
          $resultMercado["Mercado"]=$registroMercado['mercado'];
        }
      ?>

      <!-- Datos de la industria -->
      <div class="row" style="justify-content: center;">
          
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-body ">
              <div class="row">
                <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                  <i class="fas fa-industry"></i>
                  </div>
                </div>
                <div class="col-7 col-md-8">
                  <div class="numbers">
                    <p class="card-category">ID Industria</p>
                    <?php
                      echo "<p class='card-title'>".$resultID["ID_Industria"]."<p>";
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ">
              <hr>
              <div class="stats">
                <i class="fas fa-boxes"></i>
                ID
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-body ">
              <div class="row">
                <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                  <i class="fas fa-file-signature"></i>
                  </div>
                </div>
                <div class="col-7 col-md-8">
                  <div class="numbers">
                    <p class="card-category">Nombre Industria</p>
                    <?php
                      echo "<p class='card-title'>".$resultEnc["Nombre_Industria"]."<p>";
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ">
              <hr>
              <div class="stats">
                <i class="fas fa-boxes"></i>
                ID
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-body ">
              <div class="row">
                <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                  <i class="fab fa-sellsy"></i>
                  </div>
                </div>
                <div class="col-7 col-md-8">
                  <div class="numbers">
                    <p class="card-category">Mercado</p>
                    <?php
                      echo "<p class='card-title'>".$resultMercado["Mercado"]."<p>";
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ">
              <hr>
              <div class="stats">
                <i class="fas fa-boxes"></i>
                Tipo de mercado
              </div>
            </div>
          </div>
        </div>

      </div>
      

      <h4 class="card-title" style="text-align: center;">Almacen 1</h4>
      <div class="row" style="justify-content: center;">
          
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fas fa-boxes" style="color: orange;"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Insumo 1</p>
                      <?php
                        echo "<p class='card-title'> $".round($promedioInsumo1, 2)."<p>";
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fas fa-boxes"></i>
                  COSTO PROMEDIO
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fas fa-boxes" style="color: orange;"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Unidades</p>
                      <?php
                        echo "<p class='card-title'> $".$sumaUnidadUno."<p>";
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fas fa-boxes"></i>
                  UNIDADES
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fas fa-boxes" style="color: orange;"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Costo</p>
                      <?php
                        echo "<p class='card-title'> $".$sumaCostoUno."<p>";
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fas fa-boxes"></i>
                  $
                </div>
              </div>
            </div>
          </div>

      </div>

      <h4 class="card-title" style="text-align: center;">Almacen 2</h4>
      <div class="row" style="justify-content: center;">
          
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-body ">
              <div class="row">
                <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                    <i class="fas fa-boxes" style="color: orange;"></i>
                  </div>
                </div>
                <div class="col-7 col-md-8">
                  <div class="numbers">
                    <p class="card-category">Insumo 1</p>
                    <?php
                      echo "<p class='card-title'> $".round($promedioInsumo2, 2)."<p>";
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ">
              <hr>
              <div class="stats">
                <i class="fas fa-boxes"></i>
                COSTO PROMEDIO
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-body ">
              <div class="row">
                <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                    <i class="fas fa-boxes" style="color: orange;"></i>
                  </div>
                </div>
                <div class="col-7 col-md-8">
                  <div class="numbers">
                    <p class="card-category">Unidades</p>
                    <?php
                      echo "<p class='card-title'> $".$sumaUnidadDos."<p>";
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ">
              <hr>
              <div class="stats">
                <i class="fas fa-boxes"></i>
                UNIDADES
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-body ">
              <div class="row">
                <div class="col-5 col-md-4">
                  <div class="icon-big text-center icon-warning">
                    <i class="fas fa-boxes" style="color: orange;"></i>
                  </div>
                </div>
                <div class="col-7 col-md-8">
                  <div class="numbers">
                    <p class="card-category">Costo</p>
                    <?php
                      echo "<p class='card-title'> $".$sumaCostoDos."<p>";
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer ">
              <hr>
              <div class="stats">
                <i class="fas fa-boxes"></i>
                $
              </div>
            </div>
          </div>
        </div>

      </div>

      <h4 class="card-title" style="text-align: center;">Posibles compradores</h4>

      <div class="row">
        <div class="col-md-12">
          
          <div class="card">
            <div class="card-header">
              <h4 class="card-title" style="text-align: center;">Compradores</h4>
            </div>
            <div class="card-body">
              <div class="table">
                  <table class="table">
                    <thead class=" text-primary">
                      <tr>
                      <th>ID Comprador</th>
                      <th>ID Vendedor</th>
                      <th>Coeficiente</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?PHP
                      while($registroCadena=mysqli_fetch_array($resultadoCadena)){
                        $resultCadena["ID_Compradora"]=$registroCadena['idcompradora'];
                        $resultCadena["ID_Vendedora"]=$registroCadena['idvendedora'];
                        $resultCadena["Coeficiente"]=$registroCadena['coeficiente'];
                        $resCadenaArr['Arreglo'][]=$resultCadena;
                
                        echo "<tr>";
                        echo "<td>".$registroCadena['idcompradora']." </td>";
                        echo "<td>".$registroCadena['idvendedora']." </td>";
                        echo "<td>".$registroCadena['coeficiente']." </td>";
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

      <h4 class="card-title" style="text-align: center;">Posibles competidores</h4>
      <div class="row">
        <div class="col-md-12">
          
          <div class="card">
            <div class="card-header">
              <h4 class="card-title" style="text-align: center;">Compradores</h4>
            </div>
            <div class="card-body">
              <div class="table">
                  <table class="table">
                    <thead class=" text-primary">
                      <tr>
                      <th>ID Empresa</th>
                      <th>Nombre Empresa</th>
                      <th>ID Industria</th>
                      <th>Mercado</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?PHP
                      while($registroCompetidores=mysqli_fetch_array($resultadoCompe)){
                        $resultCompetidores["ID_Empresa"]=$registroCompetidores['idempresa'];
                        $resultCompetidores["NB_Empresa"]=$registroCompetidores['nbempresa'];
                        $resultCompetidores["ID_Industria"]=$registroCompetidores['idindustria'];
                        $resultCompetidores["Mercado"]=$registroCompetidores['mercado'];
                        $resCadenaArr['Arreglo'][]=$resultCompetidores;

                        echo "<tr>";
                        echo "<td>".$registroCompetidores['idempresa']." </td>";
                        echo "<td>".$registroCompetidores['nbempresa']." </td>";
                        echo "<td>".$registroCompetidores['idindustria']." </td>";
                        echo "<td>".$registroCompetidores['mercado']." </td>";
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
      </div>

    <!-- Querys -->

    <?php

      $hostname_localhost ="68.70.164.26";
      $database_localhost ="polizona_47";
      $username_localhost ="polizona_47";
      $password_localhost ="47MiMundoEs";
      $json=array();
      $jsonTwo=array();
      $conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
      //Competidores Almacen1
      $consultaCompetidores="select idempresa as competidores, (sum(costoembarque)/sum(unidades)) as costoUnitario , ((sum(costoembarque)/sum(unidades))*0.2) as costos from embarque where (idempresa='5' or idempresa='11'  or idempresa='17' or idempresa='23' or idempresa='29' or idempresa='35' or idempresa='41' or idempresa='130') and idalmacen='1' group by idempresa order by (sum(costoembarque)/sum(unidades)) asc ";
      $resultadoCompetidores=mysqli_query($conexion,$consultaCompetidores);
      //Competidores Almacen2
      $consultaCompetidores2="select idempresa as competidores, (sum(costoembarque)/sum(unidades)) as costoUnitario , ((sum(costoembarque)/sum(unidades))*2) as costos from embarque where (idempresa='5' or idempresa='11'  or idempresa='17' or idempresa='23' or idempresa='29' or idempresa='35' or idempresa='41' or idempresa='130') and idalmacen='2' group by idempresa order by (sum(costoembarque)/sum(unidades)) asc";
      $resultadoCompetidores2=mysqli_query($conexion,$consultaCompetidores2);
      //Proveedores Almacen1
      $consultaProveedores="select idempresa as proveedores_in1, (sum(costoembarque)/sum(unidades)) as costoUnitario , ((sum(costoembarque)/sum(unidades))*0.2) as costos from embarque where (idempresa='1' or idempresa='7'  or idempresa='13' or idempresa='19' or idempresa='25' or idempresa='31' or idempresa='37' or idempresa='43'or idempresa='49') and idalmacen='1' group by idempresa order by (sum(costoembarque)/sum(unidades)) asc";
      $resultadoProveedores=mysqli_query($conexion,$consultaProveedores);
      //Proveedores Almacen2
      $consultaProveedores2="select idempresa as proveedores_in6, (sum(costoembarque)/sum(unidades)) as costoUnitario , ((sum(costoembarque)/sum(unidades))*2) as costos from embarque where (idempresa='6' or idempresa='12'  or idempresa='18' or idempresa='24' or idempresa='30' or idempresa='36' or idempresa='42' or idempresa='48') and idalmacen='2' group by idempresa order by (sum(costoembarque)/sum(unidades)) asc";
      $resultadoProveedores2=mysqli_query($conexion,$consultaProveedores2);
      // Clientes
      $consultaC1="select idcompradora, idvendedora, coeficiente from encadenamiento where idvendedora='5';";
      $resultadoC1=mysqli_query($conexion,$consultaC1);
      // Clientes Insumo 1
      $consultaC10="  select idempresa as clientes_in3, (sum(costoembarque)/sum(unidades)) as costoUnitario , ((sum(costoembarque)/sum(unidades))*0.4) as costos from embarque where (idempresa='3' or idempresa='9'  or idempresa='15' or idempresa='21' or idempresa='27' or idempresa='33' or idempresa='39' or idempresa='45'or idempresa='51') and idalmacen='1' group by idempresa order by (sum(costoembarque)/sum(unidades)) asc;";
      $resultadoC10=mysqli_query($conexion,$consultaC10);
      // Clientes Insumo 2
      $consultaC20="select idempresa as clientes_in4, (sum(costoembarque)/sum(unidades)) as costoUnitario , ((sum(costoembarque)/sum(unidades))*0.8) as costos from embarque where (idempresa='4' or idempresa='10'  or idempresa='16' or idempresa='22' or idempresa='28' or idempresa='34' or idempresa='40' or idempresa='46') and idalmacen='2' group by idempresa order by (sum(costoembarque)/sum(unidades)) asc";
      $resultadoC20=mysqli_query($conexion,$consultaC20);

    ?>
      <!-- Tablas Proveedores -->

      <h4 class="card-title" style="text-align: center;">Proveedores insumo A</h4>
      <div class="row">
          <div class="col-md-12">
          
          <div class="card">
            <div class="card-header">
              <h4 class="card-title" style="text-align: center;">Proveedores A</h4>
            </div>
            <div class="card-body">
              <div class="table">
                  <table class="table">
                    <thead class=" text-primary">
                      <tr>
                      <th>ID Compradora</th>
                      <th>Costo unitario</th>
                      <th>Costos</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?PHP
                      while($registroProveedores=mysqli_fetch_array($resultadoProveedores)){
                        $resultProveedores["proveedores_in1"]=$registroProveedores['proveedores_in1'];
                        $resultProveedores["costoUnitario"]=$registroProveedores['costoUnitario'];
                        $resultProveedores["costos"]=$registroProveedores['costos'];
                        $json['Clasificador'][]=$resultProveedores;
                        $jsonTwo=$resultProveedores;
                
                      
                
                        echo "<tr>";
                        echo "<td>".$registroProveedores['proveedores_in1']." </td>";
                        echo "<td>".$registroProveedores['costoUnitario']." </td>";
                        echo "<td>".$registroProveedores['costos']." </td>";
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

      <h4 class="card-title" style="text-align: center;">Proveedores insumo B</h4>
      <div class="row">
          <div class="col-md-12">
          
          <div class="card">
            <div class="card-header">
              <h4 class="card-title" style="text-align: center;">Proveedores B</h4>
            </div>
            <div class="card-body">
              <div class="table">
                  <table class="table">
                    <thead class=" text-primary">
                      <tr>
                      <th>ID Compradora</th>
                      <th>Costo unitario</th>
                      <th>Costos</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?PHP
                      while($registroProveedores2=mysqli_fetch_array($resultadoProveedores2)){
                        $resultProveedores2["proveedores_in1"]=$registroProveedores2['proveedores_in6'];
                        $resultProveedores2["costoUnitario"]=$registroProveedores2['costoUnitario'];
                        $resultProveedores2["costos"]=$registroProveedores['costos'];
                        $json['Clasificador'][]=$resultProveedores2;
                        $jsonTwo=$resultProveedores2;

                        echo "<tr>";
                        echo "<td>".$registroProveedores2['proveedores_in6']." </td>";
                        echo "<td>".$registroProveedores2['costoUnitario']." </td>";
                        echo "<td>".$registroProveedores2['costos']." </td>";
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

      <!-- Tablas Competidores -->
      <h4 class="card-title" style="text-align: center;">Competidores insumo A</h4>
      <div class="row">
        <div class="col-md-12">
          
          <div class="card">
            <div class="card-header">
              <h4 class="card-title" style="text-align: center;">Competidores A</h4>
            </div>
            <div class="card-body">
              <div class="table">
                  <table class="table">
                    <thead class=" text-primary">
                      <tr>
                      <th>Competidor</th>
                      <th>Costo unitario</th>
                      <th>Costos</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?PHP
                      while($registroCompetidores=mysqli_fetch_array($resultadoCompetidores)){
                        $resultCompetidores["competidores"]=$registroCompetidores['competidores'];
                        $resultCompetidores["costoUnitario"]=$registroCompetidores['costoUnitario'];
                        $resultCompetidores["costos"]=$registroCompetidores['costos'];
                        $json['Clasificador'][]=$resultCompetidores;
                        $jsonTwo=$resultCompetidores;

                      

                        echo "<tr>";
                        echo "<td>".$registroCompetidores['competidores']." </td>";
                        echo "<td>".$registroCompetidores['costoUnitario']." </td>";
                        echo "<td>".$registroCompetidores['costos']." </td>";
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

      <h4 class="card-title" style="text-align: center;">Competidores insumo B</h4>
      <div class="row">
        <div class="col-md-12">
          
          <div class="card">
            <div class="card-header">
              <h4 class="card-title" style="text-align: center;">Competidores B</h4>
            </div>
            <div class="card-body">
              <div class="table">
                  <table class="table">
                    <thead class=" text-primary">
                      <tr>
                      <th>Competidor</th>
                      <th>Costo unitario</th>
                      <th>Costos</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?PHP
                      while($registroCompetidores2=mysqli_fetch_array($resultadoCompetidores2)){
                        $resultCompetidores2["competidores"]=$registroCompetidores2['competidores'];
                        $resultCompetidores2["costoUnitario"]=$registroCompetidores['costoUnitario'];
                        $resultCompetidores2["costos"]=$registroCompetidores2['costos'];
                        $json['Clasificador'][]=$resultCompetidores2;
                        $jsonTwo=$resultCompetidores2;

                      

                        echo "<tr>";
                        echo "<td>".$registroCompetidores2['competidores']." </td>";
                        echo "<td>".$registroCompetidores2['costoUnitario']." </td>";
                        echo "<td>".$registroCompetidores2['costos']." </td>";
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

      <!-- Tablas Clientes -->
      <h4 class="card-title" style="text-align: center;">Clientes insumo A</h4>
      <div class="row">
        <div class="col-md-12">
          
          <div class="card">
            <div class="card-header">
              <h4 class="card-title" style="text-align: center;">Clientes A</h4>
            </div>
            <div class="card-body">
              <div class="table">
                  <table class="table">
                    <thead class=" text-primary">
                      <tr>
                      <th>Clientes</th>
                      <th>Costo unitario</th>
                      <th>Costos</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?PHP
                      while($registroC10=mysqli_fetch_array($resultadoC10)){
                        $resultC10["clientes_in3"]=$registroC10['clientes_in3'];
                        $resultC10["costoUnitario"]=$registroC10['costoUnitario'];
                        $resultC10["costos"]=$registroC10['costos'];
                        $json['Clasificador'][]=$resultC10;
                        $jsonTwo=$resultC10;

                      

                        echo "<tr>";
                        echo "<td>".$registroC10['clientes_in3']." </td>";
                        echo "<td>".$registroC10['costoUnitario']." </td>";
                        echo "<td>".$registroC10['costos']." </td>";
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

      <h4 class="card-title" style="text-align: center;">Clientes insumo B</h4>
      <div class="row">
        <div class="col-md-12">
          
          <div class="card">
            <div class="card-header">
              <h4 class="card-title" style="text-align: center;">Clientes B</h4>
            </div>
            <div class="card-body">
              <div class="table">
                  <table class="table">
                    <thead class=" text-primary">
                      <tr>
                      <th>Clientes</th>
                      <th>Costo unitario</th>
                      <th>Costos</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?PHP
                      while($registroC20=mysqli_fetch_array($resultadoC20)){
                        $resultC20["clientes_in3"]=$registroC20['clientes_in4'];
                        $resultC20["costoUnitario"]=$registroC20['costoUnitario'];
                        $resultC20["costos"]=$registroC20['costos'];
                        $json['Clasificador'][]=$resultC20;
                        $jsonTwo=$resultC10;

                      

                        echo "<tr>";
                        echo "<td>".$registroC20['clientes_in4']." </td>";
                        echo "<td>".$registroC20['costoUnitario']." </td>";
                        echo "<td>".$registroC20['costos']." </td>";
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


    <!-- EndMain -->
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
