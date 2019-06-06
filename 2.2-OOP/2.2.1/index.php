<?php
include 'autoload.php';
include 'config/SystemConfig.php';
include 'classes/JsonFileAccessModel.php';
$jsonObj = new JsonFileAccessModel('json1');
$json = $jsonObj->readJson();
var_dump($json);
//$check = file_exists('./files/json1.json');
//var_dump(filesize('./files/json1.json'));

?>