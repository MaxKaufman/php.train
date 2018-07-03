<?php
header("Content-Type: text/html;charset=utf-8");

$sax = xml_parser_create("utf-8");

function startHandler($p, $tag, $attrs)
{
    switch($tag) {
        case "CATALOG":
            $t = "<table class='container'>";
            break;
        case "BOOK":
            $t = "<tr class='$tag'>";
            break;
        case "AUTHOR":
            $t = "<td class='$tag'>";
            break;
        case "TITLE":
            $t = "<td class='$tag'>";
            break;
        case "PUBYEAR":
            $t = "<td class='$tag'>";
            break;
        case "PRICE":
            $t = "<td class='$tag'>";
            break;
    }

    echo $t;

}

function endHandler($p, $tag)
{
    switch($tag) {
        case "CATALOG":
            $t = "</table>";
            break;
        case "BOOK":
            $t = "</tr>";
            break;
        default:
            $t = "</td>";
            break;

    }

    echo $t;
}

function textHandler($p, $text)
{
    echo $text;
}


xml_set_element_handler($sax, "startHandler", "endHandler");
xml_set_character_data_handler($sax, "textHandler");
xml_parse($sax, file_get_contents("xml/catalog.xml"));

?>