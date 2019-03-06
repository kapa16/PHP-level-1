<?php

$menuContent = [
    [
        'title' => 'Главная',
        'link'  => '/',
    ],
    [
        'title' => 'Каталог товаров',
        'link'  => '/products.php',
    ],
];

if (empty($_SESSION['login'])) {
    $menuContent[] = [
        'title' => 'Вход',
        'link'  => '/login.php',
    ];
    $menuContent[] = [
        'title' => 'Вход',
        'link'  => '/login.php',
    ];
} else {
    $menuContent[] = [
        'title' => 'Привет, ' . $_SESSION['name'],
        'link'  => '/personalArea.php',
    ];
}

function createMenu($menuContent)
{
    $html = '<ul  class="nav">';
    foreach ($menuContent as $key => $value) {

        $subMenu = '';
        if (isset($value['children']) && is_array($value['children'])) {
            $subMenu = createMenu($value['children']);
        }
        $title = htmlspecialchars($value['title']);
        $link = htmlspecialchars($value['link']);
        $html .= '<li class="nav-item"><a class="nav-link" href="' . $link . '">' . $title . '</a>' . $subMenu . '</li>';

    }
    $html .= '</ul>';
    return $html;
}

$templateData = [
    'title'            => 'Shop',
    'header'           => '',
    'mainMenu'         => createMenu($menuContent),
    'currentYear'      => date('Y'),
    'reviewsContainer' => '',
];