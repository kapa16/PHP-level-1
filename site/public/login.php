<?php

require_once __DIR__ . '/../config/config.php';


if (!empty($_POST)) {
    $result = loginUser($_POST);
    if (!$result) {
        echo 'Ошибка авторизации';
    } else {
        createSession($result);
        header('Location: /');
    }
}

$loginHtml = render(LOGIN_TEMPLATE);

$templateData['title'] = 'Shop login';
$templateData['header'] = 'Вход';
$templateData['content'] = $loginHtml;

echo render(INDEX_TEMPLATE, $templateData);