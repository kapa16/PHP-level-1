<?php

function render($file, $variables = [])
{
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
        $searchKey = '{{' . strtoupper($key) . '}}';
        $template = str_replace($searchKey, $value, $template);
    }

    return $template;
}

function readRecords($tableName, $sort = SORT_BY_ID, $directionSort = 'DESC')
{
    $query = 'SELECT * FROM `' . $tableName . '` ORDER BY `' . $sort . '` ' . $directionSort . ';';
    return getAssocData($query);
}

function readRecord($tableName, $recordId)
{
    $query = 'SELECT * FROM `' . $tableName . '` WHERE `id`=' . $recordId . ';';
    return getAssocData($query);
}

function updateRecord($tableName = '', $fieldName = '', $setData = '', $dataId = 0)
{
    $query = 'UPDATE `' . $tableName . '` SET `' . $fieldName . '` = ' . $setData . ' WHERE `id` = ' . $dataId . ';';
    executeQuery($query);
}