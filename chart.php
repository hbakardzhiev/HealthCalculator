<!DOCTYPE html>
<html>
    <head>
        <script src="fusioncharts.js"></script>
        <script src="fusioncharts.theme.ocean.js"></script>
    </head>
    <body>
    

<?php
include 'fusioncharts.php';
 $hostdb = "localhost";
 $userdb = "root";
 $passdb = "";
 $namedb = "national it competition"; 
$dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);
if ($dbhandle->connect_error) {
  exit("There was an error with your connection: ".$dbhandle->connect_error);
 }
 $strQuery = "SELECT weight, time ,idealWeight FROM dataofuser1 ORDER BY time DESC LIMIT 10";
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
        $arrData["data"] = array();
        while($row = mysqli_fetch_array($result)) {
      array_push($arrData["data"], array(
          "label" => $row["time"],
          "value" => $row["weight"]
          )
      );
   }
    $jsonEncodedData = json_encode($arrData);
     $columnChart = new FusionCharts("chart2D", "myFirstChart" , 600, 300, "chart-1", "json", $jsonEncodedData);
      $columnChart->render();
          $dbhandle->close();
  }
  ?>
<div id="chart-1"></div>
    </body>
        </html>