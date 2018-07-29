<?php

$conn = new mysqli('localhost', 'root', '', 'otomasi');
if ($conn->connect_error) {
  die("Connection error: " . $conn->connect_error);
}
$result = $conn->query("SELECT suhu, kelembaban FROM sensor ORDER BY id DESC LIMIT 1");
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
  $x = $row['suhu'] . '<br>';
  $y =  $row['kelembaban'] . '<br>';


// Z nilai singleton
$output1=isset($_POST['output1'])?$_POST['output1']:0;
$output2=isset($_POST['output2'])?$_POST['output2']:1;


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Sistem Monitoring dan Kendali Penyiraman Hidroponik
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src=" ">
          </div>
        </a>
        <a href="" class="simple-text logo-normal">
          Hidroponik
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="./dashboard.html">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
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
            <a class="navbar-brand" href="#pablo">Monitoring Hidroponik</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
          
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-lg">
  
  <canvas id="bigDashboardChart"></canvas>
  
  
</div> -->
      <div class="content">
        <div id="show" class="row">
          <script type="text/javascript" src="jquery.js"></script>
                      <script type="text/javascript">
                      $(document).ready(function() {
                          setInterval(function () {
                            $('#show').load('data.php')
                            
                          }, 1);
                        });
                      </script>
          
        </div>

<?php

// if(isset($_POST['proses'])){
{
?>

         <?php
            

            // Dingin
            if ($x>= 21) {
                $ux_dingin = 0;
              } else if ($x >= 18 && $x <= 21) {
                $ux_dingin = (21 - $x) / (21 - 18);
              } else if ($x <= 18) {
                $ux_dingin = 1;
            }

            // Agak Dingin
            if ($x <= 18 || $x >= 24) {
                $ux_agakdingin = 0;
              } else if ($x >= 18 && $x <= 21) {
                $ux_agakdingin = ($x - 18) / (21 - 18);
              } else if ($x >= 21 && $x <= 24) {
                $ux_agakdingin = (24 - $x) / (24 - 21);
            }

            // Normal
            if ($x <= 21 || $x >= 27) {
                $ux_normal = 0;
              } else if ($x >= 21 && $x <= 24) {
                $ux_normal = ($x - 21) / (24 - 21);
              } else if ($x >= 24 && $x <= 27) {
                $ux_normal = (27 - $x) / (27 - 24);
            }

            // Agak Panas
            if ($x <= 24 || $x >= 30) {
                $ux_agakpanas = 0;
              } else if ($x >= 24 && $x <= 27) {
                $ux_agakpanas = ($x - 24) / (27 - 24);
              } else if ($x >= 27 && $x <= 30) {
                $ux_agakpanas = (30 - $x) / (30 - 27);
            } 

            // Panas
            if ($x>= 30) {
                $ux_panas = 1;
              } else if ($x >= 27 && $x <= 30) {
                $ux_panas = ($x - 27) / (30 - 27);
              } else if ($x <= 27) {
                $ux_panas = 0;
            }

              ?> 

              <?php
            //KERING  
            if ($y>= 25) {
                $uy_kering= 0;
              } else if ($y >= 15 && $y <= 25) {
                $uy_kering = (25 - $y) / (25 - 15);
              } else if ($y <= 15) {
                $uy_kering = 1;
            } 

            //Agak Kering
            if ($y <= 20 || $y >= 40) {
                $uy_agakkering = 0;
              } else if ($y >= 20 && $y <= 30) {
                $uy_agakkering = ($y - 20) / (30 - 20);
              } else if ($y >= 30 && $y <= 40) {
                $uy_agakkering = (40 - $y) / (40 - 30);
            } 
            // Sedang
            if ($y <= 35 || $y >= 65) {
                $uy_sedang = 0;
              } else if ($y >= 35 && $y <= 50) {
                $uy_sedang = ($y - 35) / (50 - 35);
              } else if ($y >= 50 && $y <= 65) {
                $uy_sedang = (65 - $y) / (65 - 50);
            }   

            // Agak Basah
            if ($y <= 60 || $y >= 80) {
                $uy_agakbasah = 0;
              } else if ($y >= 60 && $y <= 70) {
                $uy_agakbasah = ($y - 60) / (70 - 60);
              } else if ($y >= 70 && $y <= 80) {
                $uy_agakbasah = (80 - $y) / (80 - 70);
            } 

            // Basah
            if ($y>= 85) {
                $uy_basah = 1;
              } else if ($y >= 75 && $y <= 85) {
                $uy_basah = ($y - 75) / (85 - 75);
              } else if ($y <= 75) {
                $uy_basah = 0;
            } 

              ?>

              


    <div class="row">

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header">
                <h4 class="card-title"><center> Fuzzifikasi Variabel Suhu</center>
              </h4>
                <div class="card-body ">
                <div class="row">
                  <!-- <div class="col-5 col-md-4"> -->
                    
              <div class="card-body">
                <div class="table">
                  <table class="table">
                    <thead class=" text-primary">
                      <th class="text-center">
                        u Keanggotaan
                      </th>
                      <th class="text-center">
                        Nilai U
                      </th>
                      
                    </thead>
                    <tbody>
                      <tr class="text-center">
                        <td>
                          &micro;[Suhu Dingin]
                        </td>
                        <td>
                          <?=$ux_dingin?>
                        </td>
                      </tr>
                      <tr class="text-center">
                        <td>
                          &micro;[Suhu Agak Dingin]
                        </td>
                        <td>
                          <?=$ux_agakdingin?>
                        </td>
                      </tr>
                      <tr class="text-center">
                        <td>
                          &micro;[Suhu Normal]
                        </td>
                        <td>
                          <?=$ux_normal?>
                        </td>
                      </tr>
                      <tr class="text-center">
                        <td>
                          &micro;[Suhu Agak Panas]
                        </td>
                        <td>
                          <?=$ux_agakpanas?>
                        </td>
                      </tr>
                      <tr class="text-center">
                        <td>
                          &micro;[Suhu Panas]
                        </td>
                        <td>
                          <?=$ux_panas?>
                        </td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>

              
            </div>
          </div>
                  
          </div>
      </div>
    </div>

          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header">
                <h4 class="card-title"><center> Fuzzifikasi Variabel Kelembaban
                 </center>
              </h4>
             <div class="card-body ">
                <div class="row">
                  <!-- <div class="col-5 col-md-4"> -->
                    
              <div class="card-body">
                <div class="table">
                  <table class="table">
                    <thead class=" text-primary">
                      <th class="text-center">
                        u Keanggotaan
                      </th>
                      <th class="text-center">
                        Nilai U
                      </th>
                      
                    </thead>
                    <tbody>
                      <tr class="text-center">
                        <td>
                          &micro;[Kering]
                        </td>
                        <td>
                          <?=$uy_kering?>
                        </td>
                      </tr>
                      
                      <tr class="text-center">
                        <td>
                          &micro;[Kelembaban Agak Kering]
                        </td>
                        <td>
                          <?=$uy_agakkering?>
                        
                        </td>
                      </tr>
                      <tr class="text-center">
                        <td>
                          &micro;[Kelembaban Sedang]
                        </td>
                        <td>
                          <?=$uy_sedang?>
                        </td>
                      </tr>
                      <tr class="text-center">
                        <td>
                          &micro;[Kelembaban Agak Basah]
                        </td>
                        <td>
                          <?=$uy_agakbasah?>
                        </td>
                      </tr>
                      <tr class="text-center">
                        <td>
                         &micro;[Kelembaban Basah]
                        </td>
                        <td>
                          <?=$uy_basah?>
                        </td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div> 
            </div>
        </div>

      
                  
                </div>
              </div>
              
            </div>

          </div>


<!-- Implikasi -->
              <?php
              // IMPLIKASI
                $a_pred1=min($ux_dingin,$uy_kering);
                $a_pred2=min($ux_dingin,$uy_agakkering);
                $a_pred3=min($ux_dingin,$uy_sedang);
                $a_pred4=min($ux_dingin,$uy_agakbasah);
                $a_pred5=min($ux_dingin,$uy_basah);
                $a_pred6=min($ux_agakdingin,$uy_kering);
                $a_pred7=min($ux_agakdingin,$uy_agakkering);
                $a_pred8=min($ux_agakdingin,$uy_sedang);
                $a_pred9=min($ux_agakdingin,$uy_agakbasah);
                $a_pred10=min($ux_agakdingin,$uy_basah);
                $a_pred11=min($ux_normal,$uy_kering);
                $a_pred12=min($ux_normal,$uy_agakkering);
                $a_pred13=min($ux_normal,$uy_sedang);
                $a_pred14=min($ux_normal,$uy_agakbasah);
                $a_pred15=min($ux_normal,$uy_basah);
                $a_pred16=min($ux_agakpanas,$uy_kering);
                $a_pred17=min($ux_agakpanas,$uy_agakkering);
                $a_pred18=min($ux_agakpanas,$uy_sedang);
                $a_pred19=min($ux_agakpanas,$uy_agakbasah);
                $a_pred20=min($ux_agakpanas,$uy_basah);
                $a_pred21=min($ux_panas,$uy_kering);
                $a_pred22=min($ux_panas,$uy_agakkering);
                $a_pred23=min($ux_panas,$uy_sedang);
                $a_pred24=min($ux_panas,$uy_agakbasah);
                $a_pred25=min($ux_panas,$uy_basah);

               $z1=$output1;
               $z2=$output1;
               $z3=$output1;
               $z4=$output1;
               $z5=$output1;
               $z6=$output2;
               $z7=$output2;
               $z8=$output1;
               $z9=$output1;
               $z10=$output1;
               $z11=$output2;
               $z12=$output2;
               $z13=$output1;
               $z14=$output1;
               $z15=$output1;
               $z16=$output2;
               $z17=$output2;
               $z18=$output2;
               $z19=$output2;
               $z20=$output1;
               $z21=$output2;
               $z22=$output2;
               $z23=$output2;
               $z24=$output2;
               $z25=$output2;

        $n=$a_pred1*$z1+$a_pred2*$z2+$a_pred3*$z3+$a_pred4*$z4+$a_pred5*$z5+$a_pred6*$z6+$a_pred7*$z7+$a_pred8*$z8+$a_pred9*$z9+$a_pred10*$z10+$a_pred11*$z11+$a_pred12*$z12+$a_pred13*$z13+$a_pred14*$z14+$a_pred15*$z15+$a_pred16*$z16+$a_pred17*$z17+$a_pred18*$z18+$a_pred19*$z19+$a_pred20*$z20+$a_pred21*$z21+$a_pred22*$z22+$a_pred23*$z23+$a_pred24*$z24+$a_pred25*$z25;
        $d=$a_pred1+$a_pred2+$a_pred3+$a_pred4+$a_pred5+$a_pred6+$a_pred7+$a_pred8+$a_pred9+$a_pred10+$a_pred11+$a_pred12+$a_pred13+$a_pred14+$a_pred15+$a_pred16+$a_pred17+$a_pred18+$a_pred19+$a_pred20+$a_pred21+$a_pred22+$a_pred23+$a_pred24+$a_pred25;
        $z=$n/$d;
        ?>
            
    <div class="row">
      <div class="col-lg-12 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header">
                <h4 class="card-title"><center> Implikasi
                 </center>
              </h4>
             <div class="card-body ">
                <div class="row">
                  <!-- <div class="col-5 col-md-4"> -->
                    
              <div class="card-body">
                <div class="table">
                  <table class="table">
                    <thead class=" text-primary">
                      <th class="text-center">
                        No.
                      </th>
                      <th class="text-center">
                        Rules
                      </th>
                      <th class="text-center">
                        &alpha;-predikat
                      </th>
                      <th class="text-center">
                        z
                      </th>
                      
                    </thead>
                    <tbody>
                      <tr class="text-center">
                        <td>
                          1.
                        </td>
                        <td>
                          IF Suhu Dingin AND Kelembaban Kering THEN Pompa = OFF
                        </td>
                        <td>
                          <?=$a_pred1?>
                        </td>
                        <td>
                          <?=$output1?>
                        </td>
                      </tr>

                      <tr class="text-center">
                        <td>
                          2.
                        </td>
                        <td>
                          IF Suhu Dingin AND Kelembaban Agak Kering THEN Pompa = OFF
                        </td>
                        <td>
                          <?=$a_pred2?>
                        </td>
                        <td>
                          <?=$output1?>
                        </td>
                      </tr>

                      <tr class="text-center">
                        <td>
                          3.
                        </td>
                        <td>
                          IF Suhu Dingin AND Kelembaban Sedang THEN Pompa = OFF
                        </td>
                        <td>
                          <?=$a_pred3?>
                        </td>
                        <td>
                          <?=$output1?>
                        </td>
                      </tr>

                      <tr class="text-center">
                        <td>
                          4.
                        </td>
                        <td>
                          IF Suhu Dingin AND Kelembaban Agak Basah THEN Pompa = OFF
                        </td>
                        <td>
                          <?=$a_pred4?>
                        </td>
                        <td>
                          <?=$output1?>
                        </td>
                      </tr>

                      <tr class="text-center">
                        <td>
                          5.
                        </td>
                        <td>
                          IF Suhu Dingin AND Kelembaban Basah THEN Pompa = OFF
                        </td>
                        <td>
                          <?=$a_pred5?>
                        </td>
                        <td>
                          <?=$output1?>
                        </td>
                      </tr>

                      <tr class="text-center">
                        <td>
                          6.
                        </td>
                        <td>
                          IF Suhu Agak Dingin AND Kelembaban Kering THEN Pompa = ON
                        </td>
                        <td>
                          <?=$a_pred6?>
                        </td>
                        <td>
                          <?=$output2?>
                        </td>
                      </tr>

                      <tr class="text-center">
                        <td>
                          7.
                        </td>
                        <td>
                          IF Suhu Agak Dingin AND Kelembaban Agak Kering THEN Pompa = ON
                        </td>
                        <td>
                          <?=$a_pred7?>
                        </td>
                        <td>
                          <?=$output2?>
                        </td>
                      </tr>

                      <tr class="text-center">
                        <td>
                          8.
                        </td>
                        <td>
                          IF Suhu Agak Dingin AND Kelembaban Sedang THEN Pompa = OFF
                        </td>
                        <td>
                          <?=$a_pred8?>
                        </td>
                        <td>
                          <?=$output1?>
                        </td>
                      </tr>

                      <tr class="text-center">
                        <td>
                          9.
                        </td>
                        <td>
                          IF Suhu Agak Dingin AND Kelembaban Agak Basah THEN Pompa = OFF
                        </td>
                        <td>
                          <?=$a_pred9?>
                        </td>
                        <td>
                          <?=$output1?>
                        </td>
                      </tr>

                      <tr class="text-center">
                        <td>
                          10.
                        </td>
                        <td>
                         IF Suhu Agak Dingin AND Kelembaban Basah THEN Pompa = OFF
                        </td>
                        <td>
                          <?=$a_pred10?>
                        </td>
                        <td>
                          <?=$output1?>
                        </td>
                      </tr>

                      <tr class="text-center">
                        <td>
                          11.
                        </td>
                        <td>
                         IF Suhu Normal AND Kelembaban Kering THEN Pompa = ON
                        </td>
                        <td>
                          <?=$a_pred11?>
                        </td>
                        <td>
                          <?=$output2?>
                        </td>
                      </tr>

                      <tr class="text-center">
                        <td>
                          12.
                        </td>
                        <td>
                          IF Suhu Normal AND Kelembaban Agak Kering THEN Pompa = ON
                        </td>
                        <td>
                          <?=$a_pred12?>
                        </td>
                        <td>
                          <?=$output2?>
                        </td>
                      </tr>

                      <tr class="text-center">
                        <td>
                          13.
                        </td>
                        <td>
                          IF Suhu Normal AND Kelembaban Sedang THEN Pompa = OFF
                        </td>
                        <td>
                          <?=$a_pred13?>
                        </td>
                        <td>
                          <?=$output1?>
                        </td>
                      </tr>

                      

                      <tr class="text-center">
                        <td>
                          14.
                        </td>
                        <td>
                          IF Suhu Normal AND Kelembaban Agak Basah THEN Pompa = OFF
                        </td>
                        <td>
                          <?=$a_pred14?>
                        </td>
                        <td>
                          <?=$output1?>
                        </td>
                      </tr>

                      <tr class="text-center">
                        <td>
                          15.
                        </td>
                        <td>
                          IF Suhu Normal AND Kelembaban Basah THEN Pompa = OFF
                        </td>
                        <td>
                          <?=$a_pred15?>
                        </td>
                        <td>
                          <?=$output1?>
                        </td>
                      </tr>

                      <tr class="text-center">
                        <td>
                          16.
                        </td>
                        <td>
                          IF Suhu Agak Panas AND Kelembaban Kering THEN Pompa = ON
                        </td>
                        <td>
                          <?=$a_pred16?>
                        </td>
                        <td>
                          <?=$output2?>
                        </td>
                      </tr>
                      <tr class="text-center">
                        <td>
                          17.
                        </td>
                        <td>
                         IF Suhu Agak Panas AND Kelembaban Agak Kering THEN Pompa = ON
                        </td>
                        <td>
                          <?=$a_pred17?>
                        </td>
                        <td>
                          <?=$output2?>
                        </td>
                      </tr>
                      <tr class="text-center">
                        <td>
                          18.
                        </td>
                        <td>
                          IF Suhu Agak Panas AND Kelembaban Sedang THEN Pompa = ON
                        </td>
                        <td>
                          <?=$a_pred18?>
                        </td>
                        <td>
                          <?=$output2?>
                        </td>
                      </tr>

                      <tr class="text-center">
                        <td>
                          19.
                        </td>
                        <td>
                          IF Suhu Agak Panas AND Kelembaban Agak Basah THEN Pompa = ON
                        </td>
                        <td>
                          <?=$a_pred19?>
                        </td>
                        <td>
                          <?=$output2?>
                        </td>
                      </tr>

                      <tr class="text-center">
                        <td>
                          20.
                        </td>
                        <td>
                          IF Suhu Agak Panas AND Kelembaban Basah THEN Pompa = OFF
                        </td>
                        <td>
                          <?=$a_pred20?>
                        </td>
                        <td>
                          <?=$output1?>
                        </td>
                      </tr>

                      <tr class="text-center">
                        <td>
                          21.
                        </td>
                        <td>
                          IF Suhu Panas AND Kelembaban Kering THEN Pompa = ON
                        </td>
                        <td>
                          <?=$a_pred21?>
                        </td>
                        <td>
                          <?=$output2?>
                        </td>
                      </tr>

                      <tr class="text-center">
                        <td>
                          22.
                        </td>
                        <td>
                          IF Suhu Panas AND Kelembaban Agak Kering THEN Pompa = ON
                        </td>
                        <td>
                          <?=$a_pred22?>
                        </td>
                        <td>
                          <?=$output2?>
                        </td>
                      </tr>

                      <tr class="text-center">
                        <td>
                          23
                        </td>
                        <td>
                         IF Suhu Panas AND Kelembaban Sedang THEN Pompa = ON
                        </td>
                        <td>
                          <?=$a_pred23?>
                        </td>
                        <td>
                          <?=$output2?>
                        </td>
                      </tr>

                      <tr class="text-center">
                        <td>
                          24.
                        </td>
                        <td>
                          IF Suhu Panas AND Kelembaban Agak Basah THEN Pompa = ON
                        </td>
                        <td>
                          <?=$a_pred24?>
                        </td>
                        <td>
                          <?=$output2?>
                        </td>
                      </tr>

                      <tr class="text-center">
                        <td>
                          25.
                        </td>
                        <td>
                          IF Suhu Panas AND Kelembaban Basah THEN Pompa = ON
                        </td>
                        <td>
                          <?=$a_pred25?>
                        </td>
                        <td>
                          <?=$output2?>
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div> 
            </div>
        </div>
       
                </div>
              </div>
              
            </div>
    </div>
<!-- Defuzzifikasi -->
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6" >
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Defuzzifikasi</p>
                          <p class="card-title"><?php echo $z ?></p>
                        
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <!-- <div class="stats">
                  <i class="fa fa-refresh"></i> Update Now
                </div> -->
              </div>
            </div>

          </div>
          <div class="col-lg-6 col-md-6 col-sm-6" >
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Status Pompa</p>
                      
                          <p class="card-title">
                            <?php
                              if ($z<0.5) {
                                echo "OFF";

                              }else
                                echo "ON";
                              
                            ?></p>
                        
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <!-- <div class="stats">
                  <i class="fa fa-refresh"></i> Update Now
                </div> -->
              </div>
            </div>

          </div>
        </div>
    </div>
        </div>
      </div>
      
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="js/core/jquery.min.js"></script>
  <script src="js/core/popper.min.js"></script>
  <script src="js/core/bootstrap.min.js"></script>
  <script src="js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

<?php
}
 }
}

?>  
</html>
<?php
  

?>
