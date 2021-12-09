<?php

class View
{
    function __construct(){

    }

    /**
     * Questo metodo permette di caricare una pagina php, con header e footer
     * passando solo la path della pagina.
     * 
     * @param String $name -> la path della view da caricare
     * @param Boolean $noInclude -> se includere o meno l'header e footer, default = false
     */
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