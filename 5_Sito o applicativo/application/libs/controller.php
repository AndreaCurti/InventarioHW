<?php
session_start();
class Controller{
    function __construct(){
        $this->view = new View();
    }

    function writeLog($msg){
        if($puntatore = fopen('application/logs/log.log', "a")){
            $user = isset($_SESSION['id']) ? $_SESSION['id'] : "undefined";
            $str = date("Y/m/d H:i:s") . " user_id=" . $user . ": " . $msg;
            fwrite($puntatore, $str . PHP_EOL);
        }
    }

    function writeErrorLog($msg){
        if($puntatore = fopen('application/logs/logError.log', "a")){
            $user = isset($_SESSION['id']) ? $_SESSION['id'] : "undefined";
            $str = date("Y/m/d H:i:s") . " user_id=" . $user . ": " . $msg;
            fwrite($puntatore, $str . PHP_EOL);
        }
    }
}