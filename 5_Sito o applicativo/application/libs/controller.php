<?php
session_start();
class Controller{
    function __construct(){
        $this->view = new View();
    }
}