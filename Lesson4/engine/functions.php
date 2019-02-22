<?php

function render($file, $variables = []) {
    if (empty($file)) {
        return 'Пустое имя файла';
    }

    $template = file_get_contents($file);

    if (empty($template)) {
        return 'Пустой файл ' . $file;
    }

    if ()
}