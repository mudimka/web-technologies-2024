<?php

class MenuEngine {
    private $menuItems = [];

    public function addItem($name, $url, $parent = null) {
        $item = [
            'name' => $name,
            'url' => $url,
            'children' => []
        ];
        
        if ($parent === null) {
            $this->menuItems[] = $item;
        } else {
            $this->addChild($this->menuItems, $parent, $item);
        }
    }
    
    private function addChild(&$items, $parentName, $child) {
        foreach ($items as &$item) {
            if ($item['name'] === $parentName) {
                $item['children'][] = $child;
                return true;
            }
            if (!empty($item['children'])) {
                if ($this->addChild($item['children'], $parentName, $child)) {
                    return true;
                }
            }
        }
        return false;
    }
    
    public function render() {
        return $this->renderMenu($this->menuItems);
    }
    
    private function renderMenu($items) {
        if (empty($items)) return '';
        
        $html = "<ul>";
        foreach ($items as $item) {
            $html .= "<li>";
            $html .= "<a href='" . htmlspecialchars($item['url']) . "'>" . htmlspecialchars($item['name']) . "</a>";
            
            if (!empty($item['children'])) {
                $html .= $this->renderMenu($item['children']);
            }
            
            $html .= "</li>";
        }
        $html .= "</ul>";
        
        return $html;
    }
}

$menu = new MenuEngine();
$menu->addItem("Главная", "/");
$menu->addItem("О компании", "/about");
$menu->addItem("Продукты", "/products");
$menu->addItem("Ноутбуки", "/products/laptops", "Продукты");
$menu->addItem("Смартфоны", "/products/phones", "Продукты");
$menu->addItem("Аксессуары", "/products/accessories", "Продукты");
$menu->addItem("Поддержка", "/support");
$menu->addItem("Контакты", "/contacts");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Динамическое меню на движке</title>
    <style>
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            background: #2c3e50;
        }
        nav > ul > li {
            display: inline-block;
            position: relative;
        }
        nav ul li a {
            display: block;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
        }
        nav ul li:hover > a {
            background: #e74c3c;
        }
        nav ul ul {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: #34495e;
            min-width: 180px;
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
            background: #e74c3c;
        }
    </style>
</head>
<body>
    <nav>
        <?= $menu->render() ?>
    </nav>
    <main style="padding: 20px;">
        <h1>Динамическое меню на движке</h1>
        <p>Меню сгенерировано через класс MenuEngine</p>
    </main>
</body>
</html>