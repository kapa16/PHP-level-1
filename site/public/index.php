<?php

require_once __DIR__ . '/../config/config.php';

$images = getImages();
$imagesHtml = getHtmlImages($images);
$galleryHtml = getHtmlGallery($imagesHtml);

$reviews = getReviews();
$reviewsHtml = getHtmlReviews($reviews);
$reviewsContainerData = [
    'reviewsHeader' => 'Комментарии:',
    'reviews'       => $reviewsHtml,
];
$reviewsContainerHtml = render(REVIEW_CONTAINER_TEMPLATE, $reviewsContainerData);

$templateData['title'] = 'Gallery';
$templateData['header'] = 'Галерея';
$templateData['content'] = $galleryHtml;
$templateData['reviewsContainer'] = $reviewsContainerHtml;

echo render(TEMPLATE_DIR . 'index.tpl', $templateData);