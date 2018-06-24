<?php

include 'INewsDB.class.php';

class NewsDB implements INewsDB
{
    const DB_NAME = "D:\OpenServer\OSPanel\domains\jsjs\my.db";

    private $_db = null;

    function __construct()
    {
        $this->_db = new SQLite3(self::DB_NAME);
    }

    function __destruct()
    {
        unset($this->_db);
    }

    function saveNews($title, $category, $description, $source)
    {

    }

    function getNews()
    {

    }

    function deleteNews()
    {

    }
}

$news = new NewsDB();


?>