<?php

require_once(__DIR__ . '/../config/config.php');

$images = getImages();
$imagesHtml = getHtmlImages($images);
$galleryHtml = getHtmlGallery($imagesHtml);

$reviews = getReviews();
$reviewsHtml = getHtmlReviews($reviews);

$templateData = [
    'title'         => 'Gallery',
    'header'        => 'Галерея',
    'currentYear'   => date('Y'),
    'content'       => $galleryHtml,
    'reviewsHeader' => 'Комментарии:',
    'reviews'       => $reviewsHtml,
];

echo render(TEMPLATE_DIR . 'index.tpl', $templateData);