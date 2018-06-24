<?php
const DBNAME = 'my.db';
$db = new SQLite3(DBNAME);

$db->exec("CREATE TABLE user (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name TEXT,
  age INTEGER  
)");
if ($db->lastErrorCode() > 0) {
    echo $db->lastErrorCode() . " " . $db->lastErrorMsg();
}


unset($db);