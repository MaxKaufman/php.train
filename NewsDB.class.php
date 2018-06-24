<?php

include 'INewsDB.class.php';

class NewsDB
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
        $dt = time();
        $sql = "INSERT INTO msgs (title, category, description, source, datetime) VALUES(:title, :category, :description, :source, $dt )";
        $stmt = $this->_db->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':source', $source );
        $stmt->execute();
        $stmt->close();

        if( $this->_db->lastErrorCode() > 0)
        {
            return false;
        }
        else
        {
            return true;
        }

    }

    function getNews()
    {
        $sql = "SELECT msgs.id as id, 
                title, 
                category.name as category,
                description,
                source,
                datetime
                FROM msgs, category
                WHERE category.id = msgs.category
                ORDER BY bsgs.is DESC";

        $result = $this->_db->query($sql);

        if( $this->_db->lastErrorCode() == 0 ) {
            while ($rows[] = $result->fetchArray(SQLITE3_ASSOC));
            return $rows;
        } else {
            return false;
        }



    }

    function deleteNews()
    {

    }
}

$news = new NewsDB();


?>