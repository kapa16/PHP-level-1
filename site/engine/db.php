<?php

function createConnection()
{
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$link) {
        $error = mysqli_connect_error();
        $errno = mysqli_connect_errno();
        print "$errno: $error\n";
        exit();
    }

    mysqli_query($link, "SET CHARACTER SET 'utf8'");
    return $link;
}

function executeQuery($query)
{

    $link = createConnection();

    $result = mysqli_query($link, $query);
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

function insert($query)
{
    $link = createConnection();

    mysqli_query($link, $query);
    $id = mysqli_insert_id($link);

    mysqli_close($link);
    return $id;
}

function executePrepareQuery($sql, $params, $close = true)
{
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    $stmt = $mysqli->prepare($sql) or die ("Failed to prepared the statement!");

    call_user_func_array([$stmt, 'bind_param'], refValues($params));

    $stmt->execute();

    if ($close) {
        $result = $mysqli->insert_id;
//        $result = $mysqli->affected_rows;
//        var_dump($stmt->insert_id);
    } else {
        $meta = $stmt->result_metadata();

        $parameters = [];
        while ($field = $meta->fetch_field()) {
            $parameters[] = &$row[$field->name];
        }

        call_user_func_array([$stmt, 'bind_result'], refValues($parameters));

        $results = [];
        while ($stmt->fetch()) {
            $x = [];
            foreach ($row as $key => $val) {
                $x[$key] = $val;
            }
            $results[] = $x;
        }

        $result = $results;
    }

    $stmt->close();
    $mysqli->close();

    return $result;
}

function refValues($arr)
{
    $refs = [];
    foreach ($arr as $key => $value) {
        $refs[$key] = &$arr[$key];
    }
    return $refs;
}

function mysqlEscapeString($params)
{
    $link = createConnection();
    foreach ($params as $key => $value) {
        $params[$key] = mysqli_real_escape_string($link, $value);
    }
    mysqli_close($link);
}