<?php

class View
{
    function __construct(){

    }

    /**
     * Descrizione
     * 
     * @param String $name -> la path della view da caricare
     * @param Boolean $noInclude -> se includere o meno l'header e footer
     */
    public function render($name, $noInclude = false){
        if($noInclude){
            require "application/views/" . $name;
        }else{
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