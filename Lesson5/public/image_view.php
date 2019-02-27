<?php

require_once (__DIR__ . '/../config/config.php');

$photoId = +$_GET['photo-id'];
$image = getPhotos($photoId);
$galleryHtml = getHtmlGallery($image, 'image_view.tpl');


$templateData = [
    'title' => 'Gallery',
    'header' => 'Просмотр полноразмерного изображения',
    'currentYear' => date('Y'),
    'content' => $galleryHtml
];

echo render(TEMPLATE_DIR . 'index.tpl', $templateData);

function setPhotoViews() {
    
}