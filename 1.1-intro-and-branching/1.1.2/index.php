<?php 
$hour = date("H");
$day = date("N");

if($hour >= 6 && $hour < 11) {
    $timeOfDay = 'Доброе утро!';
    $img='0.jpg';
} elseif ($hour >= 11 && $hour < 18) {
    $timeOfDay = 'Добрый день!';
    $img='1.jpg';
} elseif ($hour >= 18 && $hour < 23) {
    $timeOfDay = 'Добрый вечер!';
    $img='2.jpg';
} else {
    $timeOfDay = 'Доброй ночи!';
    $img='3.jpg';
}

switch ($day) {
    case 1: $dayOfWeek = 'понедельник'; break;
    case 2: $dayOfWeek = 'вторник'; break;
    case 3: $dayOfWeek = 'среда'; break;
    case 4: $dayOfWeek = 'четверг'; break;
    case 5: $dayOfWeek = 'пятница'; break;
    case 6: $dayOfWeek = 'суббота'; break;
    case 7: $dayOfWeek = 'воскресение'; break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>bPHP - 1.1.2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style ="background-image:url(<?=$img?>)">
    <div class="greeting">
        <h1><?="$timeOfDay Сегодня - $dayOfWeek" ?></h1>
    </div>
</body>
</html>