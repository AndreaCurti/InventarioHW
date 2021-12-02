<?php
class ModifyComponent extends Controller
{
  public function index($id){
    $this->view->idComponente = $id;
    $this->view->component = $this->takeInfos($id);
    $this->view->render('modifyComponent/index.php');
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
          $this->view->render('ListComponents/index.php');
        }else{
            echo "br";
        }
    }else{ 
        throw new Exception("Email o password non valida");
    }
  }
}
