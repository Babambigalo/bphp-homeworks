<?php
include 'autoload.php';
include 'config/SystemConfig.php';
include 'classes/JsonFileAccessModel.php';
$jsonObj = new JsonFileAccessModel('json1');
$json = $jsonObj->readJson();
print_r($json);

?>