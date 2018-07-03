<?php
header("Content-Type: text/html;charset=utf-8");

$dom = new DOMDocument();
$dom->load("xml/catalog.xml");
$root = $dom->documentElement;
$items = $root->childNodes;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalog</title>
</head>
<body>
<h1>Book catalog</h1>
<table border="1" width="100%">
    <tr>
        <th>Автор</th>
        <th>Название</th>
        <th>Год издания</th>
        <th>Цена, руб.</th>
    </tr>
    <?php
    $len = $items->length;
    for($i = 0; $i < $len; $i++) {
        $item = $items->item($i);//dom node
        if($item->nodeType != 1) continue;
        /*echo $item->nodeName,"<br>";
        echo $item->nodeType,"<br>";*/

    }
    ?>
</table>
</body>
</html>
