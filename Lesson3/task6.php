<?php

//6. В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP.
// Необходимо представить пункты меню как элементы массива и вывести их циклом.
// Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.

echo 'Задание 6. <br>';

$menuContent = [
    [
        'title' => 'Главаная',
        'link'  => '/',
    ],
    [
        'title'    => 'Каталог',
        'link'     => '/catalog/',
        'children' => [
            [
                'title'    => 'Женская одежда',
                'link'     => '/catalog/woman/',
                'children' => [
                    [
                        'title' => 'Куртки',
                        'link'  => '/catalog/woman/jacket/',
                    ],
                    [
                        'title' => 'Блузки',
                        'link'  => '/catalog/woman/blouse/',
                    ],
                    [
                        'title' => 'Брюки',
                        'link'  => '/catalog/woman/pants/',
                    ],
                ],
            ],
            [
                'title' => 'Мужская одежда',
                'link'  => '/catalog/man/',
            ],
            [
                'title' => 'Детская одежда',
                'link'  => '/catalog/child/',
            ],
        ],
    ],
    [
        'title' => 'Контакты',
        'link'  => '/contacts/',
    ],
    [
        'title' => 'О нас',
        'link'  => '/about/',
    ],
];

function createMenu(array $menuContent)
{
    $html = '<ul>';
    foreach ($menuContent as $key => $value) {
        $subMenu = '';
        if (isset($value['children']) && is_array($value['children'])) {
            $subMenu = createMenu($value['children']);
        }
        $title = htmlspecialchars($value['title']);
        $link = htmlspecialchars($value['link']);
        $html .= '<li><a href="' . $link . '">' . $title . '</a>' . $subMenu . '</li>';

    }
    $html .= '</ul>';
    return $html;
}

echo createMenu($menuContent);

echo '<hr>';