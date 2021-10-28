<?php

class View
{
    function __construct(){

    }

    public function render($name, $noInclude = false){
        if($noInclude){
            require "application/views/" . $name;
        }else{
            require 'application/views/header.php';
            require "application/views/" . $name;
            require 'application/views/footer.php';
        }
    }
}


?>