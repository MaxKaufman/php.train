<?php

include "autoload.php";

$news = new NewsDB();
$errors = [];

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
</head>
<body>
<h1>Последние новости</h1>
<?php

if( count($errors) > 0 )
{
    foreach ($errors as $error)
    {
        echo "<p> $error </p>";
    }
}

?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <p>Заголовок</p>
    <p><input type="text" name="title"></p>
    <p>Выберите категорию:</p>
    <p><input type="select"></input></p>
</form>

</body>
</html>