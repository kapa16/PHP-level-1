<?php

function createConnection()
{
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$link) {
        echo "Ошибка, невозможно установить соединение <br>";
        exit;
    }
    mysqli_query($link, "SET CHARACTER SET 'utf8'");
    return $link;
}

function executeQuery($query)
{

    $link = createConnection();

    $result = mysqli_query($link, $query);
    var_dump($query);
    mysqli_close($link);
    return $result;
}

function getAssocData($query)
{

    $result = executeQuery($query);

    $data_array = [];
    while ($data = mysqli_fetch_assoc($result)) {
        $data_array[] = $data;
    }

    return $data_array;
}