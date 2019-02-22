<?php

require_once (__DIR__ . '/../config/config.php');

$templateData = [
  'title' => 'Gallery',
  'header' => 'Галерея',
  'currentYear' => date('Y')
];

echo getPhotos(WWW_DIR . 'img/');

echo render(TEMPLATE_DIR . 'index.tpl', $templateData);