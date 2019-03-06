<?php

function createConnection()
{
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$link)
    {
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

function executePrepareQuery($sql, $params, $close){
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    $stmt = $mysqli->prepare($sql) or die ("Failed to prepared the statement!");

    call_user_func_array(array($stmt, 'bind_param'), refValues($params));

    $stmt->execute();

    if($close){
        $result = $mysqli->insert_id;
//        $result = $mysqli->affected_rows;
//        var_dump($stmt->insert_id);
    } else {
        $meta = $stmt->result_metadata();

        $parameters = [];
        while ( $field = $meta->fetch_field() ) {
            $parameters[] = &$row[$field->name];
        }

        call_user_func_array(array($stmt, 'bind_result'), refValues($parameters));

        $results =[];
        while ( $stmt->fetch() ) {
            $x = array();
            foreach( $row as $key => $val ) {
                $x[$key] = $val;
            }
            $results[] = $x;
        }

        $result = $results;
    }

    $stmt->close();
    $mysqli->close();

    return  $result;
}

function refValues($arr){
    if (strnatcmp(phpversion(),'5.3') >= 0) //Reference is required for PHP 5.3+
    {
        $refs = array();
        foreach($arr as $key => $value)
            $refs[$key] = &$arr[$key];
        return $refs;
    }
    return $arr;
}
?>