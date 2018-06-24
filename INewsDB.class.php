<?php


interface INewsDB
{
    /**
     * @param string $title
     * @param string $category
     * @param string $description
     * @param string $source
     *
     * @return boolean
     */
    function saveNews($title, $category, $description, $source);

    /**
     * @return array
     */
    function getNews();

    /*
    * @param integer $id
    *
    * @return boolean
    */
    function deleteNews();

}