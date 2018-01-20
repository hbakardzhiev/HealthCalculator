<?php
$conn = new PDO('mysql:host=localhost:3306;dbname=healog81_IT','healog81_root', 'healog81_root',array(PDO::MYSQL_ATTR_FOUND_ROWS => true));
if($conn==NULL)
{
    die("could not find database");
}