<?php

if ($row = $news->getNews()) {
    echo "<p>Количество записей: ", count($rows), "</p>";

    foreach ($rows as $row) {
        $dt = date('d-m-Y H-i-s', $row["datetime"]);
        echo <<<NEWS
<h3>{$row[title]} <em>{$row[category]}</em>($dt)</h3>
<p>{$row[description]}</p>
<p><a href="{$row[source]}">Посмотреть</a></p>
<p><a href="?del={$row[id]}">Удалить</a></p>  
NEWS;
    }
} else {
    die("No data (get_news.php)");
}

?>