<?php

function success($newLocation = '')
{
    echo json_encode([
        'error'      => false,
        'error_text' => '',
        'location' => $newLocation,
    ]);
    exit;
}

function error($errorText, $newLocation = '')
{
    echo json_encode([
        'error'      => true,
        'error_text' => $errorText,
        'location' => $newLocation,
    ]);
    exit;
}