<?php

function render($file, $variables = []) {
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
        if (empty($value)) {
            continue;
        }
        $searchKey = '{{' . strtoupper($key) . '}}';
        $template = str_replace($searchKey, $value, $template);
    }

    return $template;
}

function getPhotos($dirName) {
    if (!is_dir($dirName)) {
        return 'Directory ' . $dirName . ' not found';
    }

    $files = scandir($dirName);
    $filesImage = [];

    foreach ($files as $fileName) {
        $fullPath = $dirName . '/' . $fileName;
        if (!is_file($fullPath)) {
            continue;
        }
        if (!exif_imagetype($fullPath)) {
            continue;
        }

        $filesImage[] = str_replace(WWW_DIR, '', $fullPath);
    }

    return $filesImage;
}