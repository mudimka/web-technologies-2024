<?php
function printNumbersWithParity() {
    $num = 0;
    do {
        if ($num == 0) {
            echo "$num – это ноль.\n";
        } elseif ($num % 2 == 0) {
            echo "$num – чётное число.\n";
        } else {
            echo "$num – нечётное число.\n";
        }
        $num++;
    } while ($num <= 10);
}

printNumbersWithParity();
?>