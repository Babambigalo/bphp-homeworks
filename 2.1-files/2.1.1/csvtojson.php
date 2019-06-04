<?php

setlocale(LC_ALL, 'ru_RU.UTF-8');
$csv = []; 
if (($handle = fopen("data.csv", "r")) !== FALSE) {    
  while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
    $csv[] = ["Name" => $data[0], "Art" => $data[1], "Price" => $data[2]];
  }
  fclose($handle);
}

if(($handle = fopen($argv[1], "w+")) !== FALSE) {
    for($i=1;$i<count($csv);$i++) {
        if ($i === 1) {
            fwrite($handle,"[\n\t".json_encode($csv[$i]).",\n");
        }elseif ($i === count($csv)-1) {
            fwrite($handle,"\t".json_encode($csv[$i])."\n]");
        }else {
            fwrite($handle, "\t".json_encode($csv[$i]).",\n");
        }       
    }
}

?>