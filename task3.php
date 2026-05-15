<?php
$translitMap = [
    'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
    'е' => 'e', 'ё' => 'yo', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
    'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
    'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
    'у' => 'u', 'ф' => 'f', 'х' => 'kh', 'ц' => 'ts', 'ч' => 'ch',
    'ш' => 'sh', 'щ' => 'shch', 'ъ' => '', 'ы' => 'y', 'ь' => '',
    'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
];

function transliterate($string, $map) {
    $result = '';
    $chars = mb_str_split(mb_strtolower($string));
    
    foreach ($chars as $char) {
        if (isset($map[$char])) {
            $result .= $map[$char];
        } else {
            $result .= $char;
        }
    }
    
    return $result;
}

$text = "Тестовая строка.";
echo "Исходная строка: $text\n";
echo "Транслитерация: " . transliterate($text, $translitMap) . "\n";
?>