<?php
# Задание 4

function add($a,$b){
    return $a + $b;
}

function sub($a,$b){
    return $a - $b;
}

function mult($a,$b){
    return $a * $b;
}

function div($a,$b){
    return $a / $b;
}

function mathOperation($arg1,$arg2,$operation){

    switch($operation){

        case "add":
            return add($arg1,$arg2);

        case "sub":
            return sub($arg1,$arg2);

        case "mult":
            return mult($arg1,$arg2);

        case "div":
            return div($arg1,$arg2);

        default:
            return "Ошибка";
    }
}

$result = mathOperation(10,5,"mult");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Задание 4</title>
</head>
<body>
<div class="result">
<h2>Задание 4</h2>

<p>Результат операции: <?= $result ?></p>

</div>
</body>
</html>
