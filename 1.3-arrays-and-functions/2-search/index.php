<?php
function generate($rows,$placesPerRow,$avaliableCount) {
    $map = [];
    for($i = 0; $i < $rows; $i++) {
        $map[$i] = [];
        for($j = 0; $j < $placesPerRow; $j++) {
            $map[$i][] = FALSE;
        }
    }

    if ($rows*$placesPerRow > $avaliableCount) {
        return FALSE;
    }else {
        return $map;
    }
}

function reserve(&$map,$row,$place) {
    if($map[$row-1][$place-1] === FALSE) {
        $map[$row-1][$place-1] = TRUE;
        return TRUE;
    }else {
        return FALSE;
    }
}

$chairs = 50;
$map = generate(5, 8, $chairs);
$requireRow = 3;
$requiredPlace = 5;

$reverve = reserve($map, $requireRow, $requiredPlace);
logReserve($requireRow, $requiredPlace, $reverve);

$reverve = reserve($map, $requireRow, $requiredPlace);
logReserve($requireRow, $requiredPlace, $reverve);


function logReserve($row, $place, $result){
    if ($result) {
        echo "Ваше место забронировано! Ряд $row, место $place".PHP_EOL;
    } else {
        echo "Что-то пошло не так=( Бронь не удалась".PHP_EOL;
    }
}

function checkPlacesOfMap($map,$requireNearPlaces) {
    for($i=0;$i<count($map);$i++){
        $checkPos = 0;
        for($j=0;$j<(count($map[$i])-$requireNearPlaces + 1);$j++) {
            if($checkPos !== $requireNearPlaces) {
                if($map[$i][$j] === FALSE) {
                    $checkPos++;
                }else {
                    $checkPos = 0;
                }
            }else {
                $row = $i+1; 
                echo "<div>Номер ряда $row , место $j</div>";
                $j--;
                $checkPos = 0;
            }
        }     
    }
}

checkPlacesOfMap($map,2);

?>