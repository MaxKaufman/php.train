 <?php

if ( $rows = $news->getNews() ) {
    echo "<p>Количество записей: ", count($rows);

    foreach ($rows as $row) {

        $dt = date('d-m-Y H-i-s', $row["datetime"]);
        echo <<<NEWS
        
<article style="max-width:80%;">
<h3>{$row['title']} </h3>
<h6 class="mb-3"><em>{$row['category']}</em> <span>($dt)</span></h6>
<p>{$row['description']}</p>
<p  class="source">{$row['source']}</p>
<p><a href="{$row['source']}">Посмотреть</a></p>
<p><a href="?del={$row['id']}">Удалить</a></p>  
</article>
NEWS;
    }
} else {
    die("No data (get_news.php)");
}

?>


 <style>
     .source{
         color: orange;
     }

 </style>
