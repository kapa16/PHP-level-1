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
        'title' => 'Регистрация',
        'link'  => '/registration.php',
    ];
} else {
    $menuContent[] = [
        'title' => 'Привет, ' . $_SESSION['login']['name'] ?? '',
        'link'  => '/personal_area.php',
    ];
    $menuContent[] = [
        'title' => 'Выход',
        'link'  => '/logout.php',
    ];
}

if (getAdminRole()) {
    $menuContent[] = [
        'title' => 'Админка',
        'link'  => '/admin_page.php',
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