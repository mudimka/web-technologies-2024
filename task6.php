<?php
# Задание 6

function power($val, $pow){

    if($pow == 0){
        return 1;
    }

    return $val * power($val,$pow-1);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Задание 6</title>
</head>
<body>

<div class="result">
<h2>Задание 6: Рекурсивное возведение в степень</h2>

<p>2<sup>3</sup> = <?= power(2,3) ?></p>
<p>5<sup>4</sup> = <?= power(5,4) ?></p>

</div>

</body>
</html>
