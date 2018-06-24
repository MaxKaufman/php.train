<?php
const DBNAME = 'my.db';
$db = new SQLite3(DBNAME);

/*$db->exec("CREATE TABLE user (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name TEXT,
  age INTEGER  
)");
if ($db->lastErrorCode() > 0) {
    echo $db->lastErrorCode() . " " . $db->lastErrorMsg();
}*/

/*$sql = 'INSERT INTO user (name, age) VALUES(:name, :age)';
$stmt = $db->prepare($sql);
$stmt->bindParam(':name', $name = 'Max');
$stmt->bindParam(':age', $age = 29);
$stmt->execute();*/


$sql = 'SELECT id, name, age FROM user';
$stmt = $db->prepare($sql);
$result = $stmt->execute();

while ($row = $result->fetchArray()) {
    echo "<pre>", print_r($row), "</pre>";
}
unset($db);