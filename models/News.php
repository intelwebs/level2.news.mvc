<?php

// ниже PHPDoc в PHPstorm поможет получать подсказки и автоподстановки
/**
 * Class NewsModel
 * @property $id;
 * @property $title;
 * @property $content
 */
class News extends AbstractModel
{
    protected static $table = 'news';
}