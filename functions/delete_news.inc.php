<?php
if( !empty($_GET['del'])) {
    $del = (int)$_GET['del'];
    if( !$news->deleteNews($del)) {
        $errors = 'Ошибка удаления записи';
    }
    else {
        header("Location: /news.php");
    }
}
?>