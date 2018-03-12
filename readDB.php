<?php
//notice
error_reporting(E_ALL & ~E_NOTICE);
    require 'connectionToDB.php';
    $caloric = $_GET['caloric'];
    $idealWeight = intval($_GET['idealWeight']);
      $weight = intval($_GET['weight']);
      $temp = $idealWeight;
      $idealWeight = $weight;
      $weight = $temp;
    if($caloric=='caloric'){

    $stmt = $conn->query('SELECT * FROM caloricfood where amountOfCalories>=300 ORDER BY amountOfCalories DESC Limit 3');
    $statement = $stmt->fetchAll();
    echo "<p>Products that are highly caloric used for gaining weight: <br>";
    //$json = 'https://api.qwant.com/api/search/images?count=1&offset=1&q=';
    $json='https://pixabay.com/api/?key=7691580-237ccc9e7b45a3f72e3a82544&q=';
    foreach ($statement as $data) {
        $text=$json.$data['product'];
        $ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_URL, $text);
$result = curl_exec($ch);
curl_close($ch);
$arr = json_decode($result,TRUE);
        echo ' <img src="'.$arr['hits']['0']['previewURL'].'" height="150" width="150">';
        echo $data['product'].'-'.$data['amountOfCalories'].'Cal<br><br>';
    }echo '</p>';}
    else{
        $stmt = $conn->query('SELECT * FROM exercises order by id ASC');
    $statement = $stmt->fetchAll();
    echo "<p>Exercises that would help you lose weight: <br>";
    //$json = 'https://api.qwant.com/api/search/images?count=1&offset=1&q=';
    $json='https://pixabay.com/api/?key=7691580-237ccc9e7b45a3f72e3a82544&q=';
    foreach ($statement as $data) {
        $text=$json.$data['exercise'];
        $ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_URL, $text);
$result = curl_exec($ch);
curl_close($ch);
$arr = json_decode($result,TRUE);
        echo ' <img src="'.$arr['hits']['0']['previewURL'].'" height="150" width="150">';
    }echo '</p>';

    }
   // $tableName = 'dataof'.$_GET['username'];
    $statement = $conn->prepare('INSERT INTO dataofuser1(id,weight, idealWeight) VALUES(null,:weight, :idealWeight)');
$statement->execute(array(
    ":weight" => $weight,
    ":idealWeight" => $idealWeight,
));
