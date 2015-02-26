<?php
class DB
{
    public function __construct()
    {
        @mysql_connect('localhost', 'root', '');
        @mysql_select_db('level2_news');
        @mysql_query("SET NAMES 'utf8'");
    }

    public function queryAll($sql, $class = 'stdClass')
    {
        $res = mysql_query($sql);
        if (false === $res) {
            return false;
        }
        $arr = [];
        while ($row = mysql_fetch_object($res, $class)) {
            $arr[] = $row;
        }
        return $arr;
    }

    public function queryOne($sql, $class = 'stdClass')
    {
        return $this->queryAll($sql, $class)[0];
    }

    public function insert($sql)
    {
        mysql_query($sql);
    }
}
