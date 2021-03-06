<?php

include "autoload.php";

$news = new NewsDB();
$errors = [];
include "functions/delete_news.inc.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "save_news.inc.php";

}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
<h1>Последние новости</h1>
<?php
if (count($errors) > 0) {
    foreach ($errors as $error) {
        echo "<p> $error </p>";
    }
}
?>
<form action="news.php" method="POST">
    <p>Заголовок</p>
    <p>
        <input type="text" name="title">
    </p>
    <p>Выберите категорию:</p>
    <p>
        <select type="select" name="category">
            <option value="1">Политика</option>
            <option value="2">Философия</option>
            <option value="3">Гастрономия</option>
        </select>
    </p>
    <p>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
    </p>
    <p>
        <input type="text" name="source">
    </p>
    <p><input type="submit"></p>
</form>

<?php
include 'get_news.inc.php';
?>
</div>
</body>
</html>