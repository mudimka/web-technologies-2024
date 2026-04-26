<?php
# Задание 3

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
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Задание 3</title>
</head>
<body>
<div class="result">
<h2>Задание 3</h2>

<p>5 + 3 = <?= add(5,3) ?></p>
<p>5 - 3 = <?= sub(5,3) ?></p>
<p>5 * 3 = <?= mult(5,3) ?></p>
<p>5 / 3 = <?= div(5,3) ?></p>

</div>
</body>
</html>
