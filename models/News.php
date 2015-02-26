<?php

class News extends AbstractModel
{
    public $id;
    public $title;
    public $content;

    protected static $table = 'news';
    protected static $class = 'News';
}