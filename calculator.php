<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Health Calculator</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="calculator.css" media="screen">
<script type="text/javascript" src="externalScripts.js"></script>
<script type="text/javascript" src="loggedOrNot.js"></script>
<script src="fusioncharts.js"></script>
<script src="fusioncharts.theme.ocean.js"></script>
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded" style="background-image:url('images/demo/backgrounds/01.png');" onload='getCook("username")'>
  <div id="pageintro" class="hoc split clear">
    <article class="box bg-coloured clear">
      <!-- ################################################################################################ -->
      <h2 class="heading">Health Calculator</h2>
      <p>This is a calculator that would help loose weight and calculate your daily income of calories.</p>
      <footer>
        <ul class="nospace inline pushright">
            <li><a class="btn" href="index.html">Home</a></li>
          <li><a id="loggedOrNot" class="btn inverse" href = 'logout.php'>Logout</a></li>
        </ul>
      </footer>
      <!-- ################################################################################################ -->
    </article>
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear">
    <!-- ################################################################################################ -->
    <div id="logo"  class="fl_left">
      <h1 style="float: left"><a href="calculator.php">Health Calculator</a></h1>
        <h1 style="float: left"><a href="bloodAlcholContent.php">/ /Blood Alcohol Content Calculator</a></h1>
        <h1 style="float: left"><a href="calciumCalculator.php">/ /Vitamin D Int.</a></h1>
    </div>
    <!-- ################################################################################################ -->
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear">
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="group">
        <arcticle class="one_third first">
            <h3>Ever wonder what would be your ideal weight?</h3>
            <h6>Today, you would find out?</h6>
    Current weight:<br>
  <input type="text" id="weight">
  <br>
  Height:<br>
  <input type="text" id="height">
  <br>
  Gender:<br>
   <select id="gender">
    <option value="male">Male</option>
    <option value="female">Female</option>
  </select>
  <br>
  Ideal weight<br>
  <label id="idealWeight"></label>
  <button onclick="ideal()">Calculate</button>
  <br>
  </arcticle>
        <article class="one_third">
            <h3>How would you achieve that?</h3>
            <p id="advice"></p>
        </article>
        <article class="one_third">
            <h3 id="headingThird">which way you would go?</h3>
            <p id="way"></p>
        </article>

  </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    </div>
<div id="chart-1"></div>
</div>
  </main>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

            <?php
             if(isset($_SESSION['username'])&&isset($_SESSION['valid']))
    {
                 $username = $_SESSION['username'];
                require 'fusioncharts.php';
 $hostdb = "localhost:3306";
 $userdb = "healog81_root";
 $passdb = "healog81_root";
 $namedb = "healog81_IT";
$dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);
if ($dbhandle->connect_error) {
  exit("There was an error with your connection: ".$dbhandle->connect_error);
 }
 $strQuery = "SELECT weight,time,idealWeight FROM dataofuser1 ORDER BY time DESC LIMIT 10";
  $result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
   if ($result) {
       $arrData = array(
      "chart" => array(
          "caption" => "Last 10 records of your weight",
          "paletteColors" => "#0075c2",
          "bgColor" => "#ffffff",
          "borderAlpha"=> "20",
          "canvasBorderAlpha"=> "0",
          "usePlotGradientColor"=> "0",
          "plotBorderAlpha"=> "10",
          "showXAxisLine"=> "1",
          "xAxisLineColor" => "#999999",
          "showValues" => "0",
          "divlineColor" => "#999999",
          "divLineIsDashed" => "1",
          "showAlternateHGridColor" => "0"
        )
    );
        $categoryArray=array();
          $dataseries1=array();
          $dataseries2=array();
        $arrData["data"] = array();
        while($row = mysqli_fetch_array($result)) {
      array_push($categoryArray, array(
          "label" => $row["time"],
//          "value" => $row["weight"]
          ));
          array_push($dataseries1, array(
          "value" => $row['idealWeight'])
      );
          array_push($dataseries2, array(
          "value" => $row["weight"])
      );
   }
    $arrData["categories"]=array(array("category"=>$categoryArray));
     $arrData["dataset"] = array(array("seriesName"=> "Weight", "data"=>$dataseries1), array("seriesName"=> "idealWeight",  "renderAs"=>"line", "data"=>$dataseries2));

    $jsonEncodedData = json_encode($arrData);
     $columnChart = new FusionCharts("mscombi2d", "myFirstChart" , 1366 , 300, "chart-1", "json", $jsonEncodedData);
      $columnChart->render();
          $dbhandle->close();
   }
          }?>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <footer id="footer" class="hoc clear">
    <!-- ################################################################################################ -->
    <div class="center btmspace-80 clear">
      <h6 class="font-x3 uppercase">Contact us</h6>
      <p><a onclick=" window.open('contact.html','',' scrollbars=no,menubar=no,width=500, resizable=no,toolbar=no,location=no,status=no')">If you have any questions, please feel free to contact us!</a></p>
    </div>
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row6">
  <div id="copyright" class="hoc clear">
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Health Calculator</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>
