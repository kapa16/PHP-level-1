<?php

function getHtmlImage($image)
{
    $imageData = [
        'imageSource' => $image['url'],
        'imageAlt'    => $image['title'],
        'imageId'     => $image['id'],
        'imageViews'  => $image['views'],
    ];
    return render(IMAGE_CARD_TEMPLATE, $imageData);
}

function getHtmlImages($images)
{
    $galleryHtml = '';
    foreach ($images as $image) {
        $galleryHtml .= getHtmlImage($image);
    }
    return $galleryHtml;
}

function getHtmlGallery($images)
{
    $galleryHtml = getHtmlImages($images);
    return render(IMAGE_GALLERY_TEMPLATE, ['contentGallery' => $galleryHtml]);
}

function setPhotoViews($imageId, $views)
{
    updateRecord('images', 'views', $views, $imageId);
}

function getImages()
{
    $records = readRecords('images', SORT_IMAGE_BY_VIEWS);
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
    $record = readRecord('images', $imageId);
var_dump($record);

    $fullPath = $record['url'];

    if (!is_file($fullPath) || !exif_imagetype($fullPath)) {
        return '';
    }

    return $record;

}