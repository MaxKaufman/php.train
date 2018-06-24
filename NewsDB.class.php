<?php

include 'INewsDB.class.php';

class NewsDB implements INewsDB
{
    const DB_NAME = "D:\OpenServer\OSPanel\domains\specialist\my.db";

    private $_db = null;

    function __construct()
    {
        if (!file_exists(self::DB_NAME)) {
            $this->_db = new SQLite3(self::DB_NAME);

            $queries = [
                "CREATE TABLE msgs(
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                title TEXT,
                category INTEGER,
                description TEXT,
                source TEXT,
                datetime INTEGER
                ) ",
                "CREATE TABLE category(
                id INTEGER,
                name TEXT)",
                "INSERT INTO category(id, name)
                SELECT 1 as id, 'Политика' as name
                UNION SELECT 2 as id, 'Культура' as name
                UNION SELECT 3 as id, 'Спорт' as name"
            ];
            foreach ($queries as $query)
            {
                $this->_db->exec($query);
            }
        } else {
             $this->_db = new SQLite3(self::DB_NAME);
        }
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