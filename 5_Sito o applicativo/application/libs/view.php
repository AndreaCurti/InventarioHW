<?php

class View
{
    function __construct(){

    }

    public function render($name, $noInclude = false){
        if($noInclude){
            require "application/views/" . $name;
        }else{
            //var_dump($_SESSION);
            if(!empty($_SESSION['id'])){
                if($_SESSION['isAdmin'] == 0){
                    require 'application/views/headerBase.php';
                    require "application/views/" . $name;
                    require 'application/views/footer.php';
                }else if($_SESSION['isAdmin'] == 1){
                    require 'application/views/headerAdmin.php';
                    require "application/views/" . $name;
                    require 'application/views/footer.php';
                }
            }else{
                require 'application/views/headerLogin.php';
                require "application/views/" . $name;
                require 'application/views/footer.php';
            }
            
        }
    }
}


?>