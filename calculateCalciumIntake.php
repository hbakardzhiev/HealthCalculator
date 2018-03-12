<?php
require 'connectionToDB.php';
if(isset($_GET['basket']))
{
  $statement = [
    "Oatmeal" => 350,
  //  "Cheddar%20cheese" => 306,
    "Milkshake" => 302,
    "Soybeans" =>261,
    "Tofu" =>204,
    "Salmon" =>181,
  ];
  $sum += $statement[ucfirst($_GET['basket'])];
  echo $sum;
  $calciumIntake = $_GET['calciumIntake'];
  $json='https://pixabay.com/api/?key=7691580-237ccc9e7b45a3f72e3a82544&q=';
  $basket = $_GET['basket'];
  $text = $json.$basket;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_URL, $text);
  $result = curl_exec($ch);
  curl_close($ch);
  $arr = json_decode($result,TRUE);
    echo ' <img src="'.$arr['hits']['0']['previewURL'].'" height="150" width="150">';
echo '<script type="text/javascript">document.getElementById("Basket").innerHTML='.'Basket '.$sum.'Calium</script>';
    echo "<br>";
}
else{
$dailyIntake = intval($_GET['dailyIntake']);
$statement = [
  "oatmeal" => 350,
//  "Cheddar%20cheese" => 306,
  "Milkshake" => 302,
  "Soybeans" =>261,
  "Tofu" =>204,
  "Salmon" =>181,
];
$br = 0;
$json='https://pixabay.com/api/?key=7691580-237ccc9e7b45a3f72e3a82544&q=';
foreach($statement as $key => $value) {

  $text=$json.$key;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_URL, $text);
  $result = curl_exec($ch);
  curl_close($ch);
  $arr = json_decode($result,TRUE);
  echo (urldecode($key).' '.$value.'Cal(mg)');
  echo '<button type="button" onclick="add(this.id)" id='.strtolower(urldecode($key)).'>+</button>';
  echo ' <img src="'.$arr['hits']['0']['previewURL'].'" height="150" width="150">';
  echo "<br>";
  $br++;
}
echo '</p>';
}
