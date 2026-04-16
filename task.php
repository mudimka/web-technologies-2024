<?php
// Блок переменных
$pageTitle = "Главная страница";
$headerTitle = "Добро пожаловать на сайт";
$currentYear = date("Y");

// Функция для форматирования времени с правильными склонениями
function getFormattedTime() {
    $hours = date("G");
    $minutes = date("i");
    
    // Склонение для часов
    if ($hours % 10 == 1 && $hours % 100 != 11) {
        $hoursWord = "час";
    } elseif (($hours % 10 == 2 || $hours % 10 == 3 || $hours % 10 == 4) && ($hours % 100 < 10 || $hours % 100 > 20)) {
        $hoursWord = "часа";
    } else {
        $hoursWord = "часов";
    }
    
    // Склонение для минут
    if ($minutes % 10 == 1 && $minutes % 100 != 11) {
        $minutesWord = "минута";
    } elseif (($minutes % 10 == 2 || $minutes % 10 == 3 || $minutes % 10 == 4) && ($minutes % 100 < 10 || $minutes % 100 > 20)) {
        $minutesWord = "минуты";
    } else {
        $minutesWord = "минут";
    }
    
    return $hours . " " . $hoursWord . " " . $minutes . " " . $minutesWord;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #1a1a2e;
            min-height: 100vh;
            padding: 20px;
            color: #e0e0e0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #2d2d3f;
            border-radius: 16px;
            padding: 30px;
            text-align: center;
        }
        h1 {
            color: #4a6fa5;
        }
        .time {
            font-size: 24px;
            background: #1e1e2e;
            padding: 20px;
            border-radius: 12px;
            margin: 20px 0;
        }
        .year {
            color: #6a6a8a;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $headerTitle; ?></h1>
        <div class="time">
            <?php echo getFormattedTime(); ?>
        </div>
        <div class="year">
            © <?php echo $currentYear; ?>
        </div>
    </div>
</body>
</html>