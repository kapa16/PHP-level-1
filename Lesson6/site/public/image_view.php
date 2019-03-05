<?php

require_once(__DIR__ . '/../config/config.php');

if (empty($_GET['photo-id'])) {
    header('Location: /');
    die;
}

$imageId = +$_GET['photo-id'];

$image = getImage($imageId);
if (!$image) {
    header('Location: /');
    die;
}

$views = +$image['views'] + 1;
$imagesHtml = getHtmlImage($image, IMAGE_VIEW_TEMPLATE);
$galleryHtml = getHtmlGallery($imagesHtml);

$templateData = [
    'title'         => 'Gallery',
    'header'        => 'Просмотр полноразмерного изображения',
    'currentYear'   => date('Y'),
    'content'       => $galleryHtml,
    'reviewsHeader' => '',
    'reviews'       => '',
];

echo render(INDEX_TEMPLATE, $templateData);

setPhotoViews($imageId, $views);
