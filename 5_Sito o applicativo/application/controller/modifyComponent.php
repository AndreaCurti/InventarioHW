<?php
class ModifyComponent extends Controller
{
  /**
   * Questo metodo serve per caricare la pagina per la modifica dei componenti.
   * Vengono mostrati già tutte le informazioni inserite, pronte alla modifica.
   * 
   * @param Int $id -> id del componente
   */
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

  /**
   * Questo metodo serve per prendere le informazioni di un componente
   * 
   * @param Int $id -> id del componente
   */
  public function takeInfos($id){
    require_once 'application/models/component_model.php';
    $infos = new Component($id);
    return $infos->takeDescAndAula();
  }

  /**
   * Questo metodo serve per modificare le informazioni di un componente.
   * Vengono efettuati i dovuti controlli suo parametri.
   * 
   * @param Int $id -> id del componente
   */
  public function changeComponent($id){
    require_once 'application/models/component_model.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $component = new Component($id);
      if($component->modifyDescAndAula($_POST["descrizione"], $_POST["aula"])){
        header('Location: '.URL."ListComponents/index/".$_SESSION["idCategoria"]);
        $this->writeLog("(ModifyComponent) Component modified");
      }else{
        $this->view->idComponente = $id;
        $this->view->component = $this->takeInfos($id);
        writeErrorLog("(ModifyComponent) Classroom not existing");
        $this->view->errorMessage = "Aula non esistente";
        $this->view->render('modifyComponent/index.php');
      }
    }
  }
}
