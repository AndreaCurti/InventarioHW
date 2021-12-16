<?php
class ModifyComponent extends Controller
{
  public function index($id){
    if(!empty($_SESSION['id'])){
      $this->view->idComponente = $id;
      $this->view->component = $this->takeInfos($id);
      $this->view->errorMessage = "";
      $this->view->render('modifyComponent/index.php');
    }else{
      $this->view->render('Login/index.php');
    }
  }

  public function takeInfos($id){
    require_once 'application/models/component_model.php';
    $infos = new Component($id);
    return $infos->takeDescAndAula();
  }

  public function changeComponent($id){
    require_once 'application/models/component_model.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $component = new Component($id);
      if($component->modifyDescAndAula($_POST["descrizione"], $_POST["aula"])){
        $_SESSION["components"] = $this->getComponents($_SESSION["idCategoria"]);
        $this->view->render('ListComponents/index.php');
      }else{
        $this->view->idComponente = $id;
        $this->view->component = $this->takeInfos($id);
        $this->view->errorMessage = "Aula non esistente";
        $this->view->render('modifyComponent/index.php');
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
