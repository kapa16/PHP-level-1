<?php

require_once(__DIR__ . '/../config/config.php');

$images = getPhotos();
$galleryHtml = getHtmlGallery($images, 'image_card.tpl');


$templateData = [
    'title'       => 'Gallery',
    'header'      => 'Галерея',
    'currentYear' => date('Y'),
    'content'     => $galleryHtml,
];

echo render(TEMPLATE_DIR . 'index.tpl', $templateData);