<?php

function success()
{
    echo json_encode([
        'error'      => false,
        'error_text' => '',
    ]);
    exit;
}

function error($errorText)
{
    echo json_encode([
        'error'      => true,
        'error_text' => $errorText,
    ]);
    exit;
}