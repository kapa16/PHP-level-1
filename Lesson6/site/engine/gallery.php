<?php

function getHtmlGallery($images, $templateName)
{
    $galleryHtml = '';
    foreach ($images as $image) {
        $imageData = [
            'imageSource' => $image['url'],
            'imageAlt'    => $image['title'],
            'imageId'     => $image['id'],
            'imageViews'  => $image['views'],
        ];
        $galleryHtml .= render(TEMPLATE_DIR . $templateName, $imageData);
    }
    return render(TEMPLATE_DIR . 'gallery.tpl', ['contentGallery' => $galleryHtml]);
}

function setPhotoViews($photoId, $views)
{
    $query = "UPDATE `images` SET `views` = " . $views . " WHERE `id` = " . $photoId . ";";
    executeQuery($query);
}
