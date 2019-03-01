<?php

function render($file, $variables = [])
{
    if (!is_file($file)) {
        return 'File ' . $file . ' not found';
    }

    if (filesize($file) === 0) {
        return 'File ' . $file . ' is empty';
    }

    $template = file_get_contents($file);

    if (empty($variables)) {
        return $template;
    }

    foreach ($variables as $key => $value) {
        $searchKey = '{{' . strtoupper($key) . '}}';
        $template = str_replace($searchKey, $value, $template);
    }

    return $template;
}

function getPhotos($photoId = null, $sort = SORT_IMAGE_BY_VIEWS)
{

    $condition = "";
    if ($photoId) {
        $condition = " WHERE `id` = " . $photoId;
    }

    $query = "SELECT * FROM `images`" . $condition . " ORDER BY `" . $sort . "` DESC;";
    $files = getAssocData($query);
    $filesImage = [];

    foreach ($files as $fileData) {
        $fullPath = $fileData['url'];

        if (!is_file($fullPath)) {
            continue;
        }

        if (!exif_imagetype($fullPath)) {
            continue;
        }

        $filesImage[] = $fileData;
    }

    return $filesImage;
}

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
