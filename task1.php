<?php
# Задание 1

$a = -5;
$b = -3;

if ($a >= 0 && $b >= 0) {
    $result = $a - $b;
    $operation = "Разность";
}
elseif ($a < 0 && $b < 0) {
    $result = $a * $b;
    $operation = "Произведение";
}
else {
    $result = $a + $b;
    $operation = "Сумма";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Задание 1</title>
</head>
<body>
<div class="result">
    <h2>Задание 1</h2>
    <p>a = <?= $a ?></p>
    <p>b = <?= $b ?></p>
    <p><?= $operation ?>: <?= $result ?></p>
</div>
</body>
</html>
