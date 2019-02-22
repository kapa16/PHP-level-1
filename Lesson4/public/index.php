<?php

require_once (__DIR__ . '/../config/config.php');

$imagesSrc = getPhotos(WWW_DIR . 'img');
$galleryHtml = '';
foreach ($imagesSrc as $imgSrc) {
    $imageData = [
      'imageSource' => $imgSrc,
      'imageAlt' => 'photo',
      'imageClass' => 'gallery__image'
    ];
    $galleryHtml .= render(TEMPLATE_DIR . 'imageCard.tpl', $imageData);
}
$galleryHtml = render(TEMPLATE_DIR . 'gallery.tpl', ['contentGallery' => $galleryHtml]);


$templateData = [
    'title' => 'Gallery',
    'header' => 'Галерея',
    'currentYear' => date('Y'),
    'content' => $galleryHtml
];

echo render(TEMPLATE_DIR . 'index.tpl', $templateData);