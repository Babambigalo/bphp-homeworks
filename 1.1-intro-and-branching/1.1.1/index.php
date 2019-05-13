<?php
$variable = 1.1;
if (is_bool($variable) === TRUE) {
    $type = 'bool';
} elseif (is_float($variable) === TRUE) {
    $type = 'float';
} elseif (is_int($variable) === TRUE) {
    $type = 'int';
} elseif (is_string($variable) === TRUE) {
    $type = 'string';
} elseif (is_null($variable) === TRUE) {
    $type = 'null';
} else {
    $type = 'other';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 1.1.1</title>
</head>
<body>
    <p><?="$variable is $type"?></p>
</body>
</html>