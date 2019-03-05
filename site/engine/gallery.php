<?php

function getHtmlImage($image, $templateName)
{
    $imageData = [
        'imageSource' => $image['url'],
        'imageAlt'    => $image['title'],
        'imageId'     => $image['id'],
        'imageViews'  => $image['views'],
    ];
    return render($templateName, $imageData);
}

function getHtmlImages($images)
{
    $galleryHtml = '';
    foreach ($images as $image) {
        $galleryHtml .= getHtmlImage($image, IMAGE_CARD_TEMPLATE);
    }
    return $galleryHtml;
}

function getHtmlGallery($galleryHtml)
{
    return render(IMAGE_GALLERY_TEMPLATE, ['contentGallery' => $galleryHtml]);
}

function getImages()
{
    $records = readRecords('images', SORT_BY_VIEWS);
    $data = [];

    foreach ($records as $record) {
        $fullPath = $record['url'];

        if (!is_file($fullPath) || !exif_imagetype($fullPath)) {
            continue;
        }

        $data[] = $record;
    }

    return $data;
}

function getImage($imageId)
{
    $record = readRecord('images', $imageId)[0];

    $fullPath = $record['url'];

    if (!is_file($fullPath) || !exif_imagetype($fullPath)) {
        return '';
    }

    return $record;

}

function setPhotoViews($imageId, $views)
{
    updateRecord('images', 'views', $views, $imageId);
}