<?php


class Home extends Controller
{

    /**
   * Questo metodo serve per caricare la pagina Home.
   */
    public function index()
    {
        $this->view->render('home/index.php');  
    }


}
