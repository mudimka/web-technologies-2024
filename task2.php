<?php
# Задание 2

$a = 7;

ob_start();

switch($a){
    case 0: echo "0 ";
    case 1: echo "1 ";
    case 2: echo "2 ";
    case 3: echo "3 ";
    case 4: echo "4 ";
    case 5: echo "5 ";
    case 6: echo "6 ";
    case 7: echo "7 ";
    case 8: echo "8 ";
    case 9: echo "9 ";
    case 10: echo "10 ";
    case 11: echo "11 ";
    case 12: echo "12 ";
    case 13: echo "13 ";
    case 14: echo "14 ";
    case 15: echo "15 ";
        break;
    default:
        echo "Число вне диапазона";
}

$result = ob_get_clean();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Задание 2</title>
</head>
<body>
<div class="result">
    <h2>Задание 2</h2>
    <p>Числа от <?= $a ?> до 15:</p>
    <p><?= $result ?></p>
</div>
</body>
</html>
