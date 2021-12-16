<?php
class AddComponent extends Controller
{
  public function index($error = "", $marca = "", $desc = "", $nSeriale = "", $aula = ""){
    if(!empty($_SESSION['id'])){
        require_once 'application/models/component_model.php';
        $this->view->categories = Component::getCategories();
        $this->view->errorMessage = $error;
        $this->view->marca = $marca;
        $this->view->desc = $desc;
        $this->view->nSeriale = $nSeriale;
        $this->view->aula = $aula;
        $this->view->render('addComponent/index.php');
    }else{
        $this->view->render('Login/index.php');
    }
  }


  public function add(){
    require_once 'application/models/component_model.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        try{
            Component::addComponent($_POST["marca"], $_POST["desc"], 
            $_POST["nSeriale"], $_POST["aula"], $_POST["categoria"]);
        }catch(Exception $e){
            $this->index($e->getMessage(), $_POST["marca"], $_POST["desc"], 
            $_POST["nSeriale"], $_POST["aula"]);
        }
    }
  }

  public function getComponents($categoria){
    require_once 'application/models/listComponents_model.php';
    $components = new ListComponentsClass($categoria);
    try{
      return $components->getComponents();
    }catch(Exception $e){ 
      $this->view->errorMessage = "Error";
    }
  }
}
