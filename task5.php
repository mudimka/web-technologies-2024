<?php
# Задание 5
$year1 = date("Y");
$year2 = Date("Y");
$year3 = getdate()['year'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Задание 5</title>
</head>
<body>

<div class="result">
<h2>Задание 5</h2>

<p>Способ 1: <?= $year1 ?></p>
<p>Способ 2: <?= $year2 ?></p>
<p>Способ 3: <?= $year3 ?></p>

<footer>
&copy; <?= date("Y") ?>
</footer>

</div>

</body>
</html>
