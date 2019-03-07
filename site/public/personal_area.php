<?php

require_once __DIR__ . '/../config/config.php';

if (empty($_SESSION['login'])) {
    header('Location: /');
}

$personalAreaData = [
  'personalAreaText' => 'Добро пожаловать в наш магазин',
  'personalAreaName' => $_SESSION['name'],
  'personalAreaLogin' => $_SESSION['login'],
];

$loginHtml = render(PERSONAL_AREA_TEMPLATE, $personalAreaData);

$templateData['title'] = 'Shop';
$templateData['header'] = 'Личный кабинет';
$templateData['content'] = $loginHtml;

echo render(INDEX_TEMPLATE, $templateData);