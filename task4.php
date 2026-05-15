<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Динамическое меню на PHP</title>
    <style>
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            background: #333;
        }
        nav > ul > li {
            display: inline-block;
            position: relative;
        }
        nav ul li a {
            display: block;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
        }
        nav ul li:hover > a {
            background: #555;
        }
        /* Подменю */
        nav ul ul {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: #444;
            min-width: 200px;
        }
        nav ul li:hover > ul {
            display: block;
        }
        nav ul ul li {
            display: block;
        }
        nav ul ul li a {
            padding: 8px 15px;
        }
        nav ul ul li a:hover {
            background: #666;
        }
    </style>
</head>
<body>
    <nav>
        <?php
        $menu = [
            "Главная" => "/",
            "О нас" => "/about",
            "Услуги" => [
                "Разработка сайтов" => "/services/webdev",
                "SEO-оптимизация" => "/services/seo",
                "Контекстная реклама" => "/services/ads"
            ],
            "Портфолио" => "/portfolio",
            "Блог" => "/blog",
            "Контакты" => "/contacts"
        ];
        
        function renderMenu($items) {
            echo "<ul>";
            foreach ($items as $name => $link) {
                if (is_array($link)) {
                    // Пункт с подменю
                    echo "<li><a href='#'>$name</a>";
                    renderMenu($link);
                    echo "</li>";
                } else {
                    // Обычный пункт
                    echo "<li><a href='$link'>$name</a></li>";
                }
            }
            echo "</ul>";
        }
        
        renderMenu($menu);
        ?>
    </nav>
    
    <main style="padding: 20px;">
        <h1>Добро пожаловать</h1>
        <p>Это пример динамического меню</p>
    </main>
</body>
</html>