<?php

function getDataFromPost($postParams, $fields)
{
    mysqlEscapeString($postParams);
    $data = [];
    foreach ($fields as $field) {
        $data[$field] = $postParams[$field] ?? '';
    }
    return $data;
}

function registrationUser($postParams)
{
    $result = ['error' => false, 'data' => ''];

    $fields = ['login', 'email', 'name', 'lastname', 'password'];
    $userData = getDataFromPost($postParams, $fields);
    $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);

    $user = findUser($userData['login']);
    if (!empty($user)) {
        $result['error'] = true;
        $result['data'] = 'Пользователь с логином ' . $userData['login'] . ' уже существует';
        return $result;
    }

    $sql = 'INSERT INTO `users` (`login`, `email`, `name`, `lastname`, `password`) 
        VALUES (?, ?, ?, ?, ?);';
    $resultSql = executePrepareQuery($sql, array_merge(['sssss'], $userData), true);
    if ($resultSql) {
        unset($userData['password']);
        $userData['id'] = $resultSql;
        $result['data'] = $userData;
    } else {
        $result['error'] = true;
        $result['data'] = 'Пользователь не зарегистрирован';
    }
    return $result;
}

function findUser($userLogin)
{
    $sql = "SELECT * FROM `users` WHERE `login`='{$userLogin}';";
    return getAssocData($sql);
}

function createSession($userData)
{
    $_SESSION['login'] = $userData;
}

function clearSession()
{
    unset($_SESSION['login']);
}

function loginUser($postParams)
{
    $fields = ['login', 'password'];
    $userData = getDataFromPost($postParams, $fields);

    $user = findUser($userData['login'])[0];

    if (!$user) {
        return false;
    }

    if (password_verify($userData['password'], $user['password'])) {
        unset($user['password']);
        return $user;
    }

    return false;
}

function adminCheck() {
    return $_SESSION['login']['role'] ?? 0;
}