<?php

require_once __DIR__ . '/../config/config.php';

if (!empty($_POST)) {
    $result = registrationUser($_POST);
    if ($result['error']) {
        echo $result['data'];
    } else {
        authUser($result['data']);
        header('Location: /');
    }
}

$registrationHtml = render(REGISTRATION_TEMPLATE);

$templateData['title'] = 'Registration';
$templateData['header'] = 'Регистрация';
$templateData['content'] = $registrationHtml;

echo render(INDEX_TEMPLATE, $templateData);