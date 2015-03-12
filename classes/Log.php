<?php

class Log{

    public function putContents($message, $code){
        file_put_contents(__DIR__ .'/../log.txt', date("H:i:s Y-m-d") . " " . $message ." *". $code . "*\n", FILE_APPEND);
    }
}