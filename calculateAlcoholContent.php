<?php
require 'connectionToDB.php';
$alcoholic = $_GET['alcoholic'];
$username = $_GET['username'];
if($alcoholic=="yes")
{
  $statement  =  array(urlencode("stop drinking"),urlencode("drink water"),urlencode("snacks or peanuts"),urlencode("30-min nap"));
  $json='https://pixabay.com/api/?key=7691580-237ccc9e7b45a3f72e3a82544&q=';
  for ($i =0;$i<count($statement);$i++) {
    $text=$json.$statement[$i];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_URL, $text);
    $result = curl_exec($ch);
    curl_close($ch);
    $arr = json_decode($result,TRUE);
    echo urldecode($statement[$i]).'<br>';
    echo ' <img src="'.$arr['hits']['0']['previewURL'].'" height="150" width="150">';
  }
  echo '</p>';
}
else {
  $statement  =  array(urlencode("Keep it up"));
  $json='https://pixabay.com/api/?key=7691580-237ccc9e7b45a3f72e3a82544&q=';
  for ($i =0;$i<count($statement);$i++) {
    $text=$json.$statement[$i];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_URL, $text);
    $result = curl_exec($ch);
    curl_close($ch);
    $arr = json_decode($result,TRUE);
    echo urldecode($statement[$i]).'<br>';
    echo ' <img src="'.$arr['hits']['0']['previewURL'].'" height="150" width="150">';
  }
  echo '</p>';
}
