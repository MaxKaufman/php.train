<?php

$params = [
    'title' => 'string',
    'category' => 'integer',
    'description' => 'string',
    'source' => 'string'
];

$flag = true; //true - все поля заполнены

foreach ($params as $_param => $type) {

    $type = "_$type";
    $validParam[$_param] = $type($_POST[$_param]);

    if (empty($validParam[$_param])) {
        $flag = false;
        $errors[] = "Заполните {$validParam[$_param]}";
    }

}
if (!$flag) {

    $errors[] = "Заполните все поля!";
}
if (count($errors) == 0) {

    if ($news->saveNews(
        $validParam["title"],
        $validParam["category"],
        $validParam["description"],
        $validParam["source"])) {
        header("Location: /news.php");
    }
    else
    {
        $errors[] = 'Произошла ошибка при добавлении новости';
    }

}

function _string($in)
{
    return trim(strip_tags($in));
}

function _integer($in)
{
    return (int)$in;
}


?>