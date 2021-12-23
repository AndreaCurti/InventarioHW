<?php
class AddComponent extends Controller
{
  /**
     * Questo metodo serve per caricare la pagina per l'aggiunta di un componente.
     * Viene controllato se l'utente è loggato.
     * In caso di errore viene ricaricata la pagina i contenuti aggiunti.
     * 
     * @param String $error -> il messaggio di errore da stampare, default = ""
     * @param String $marca -> marca del componente, default = ""
     * @param String $desc -> descrizione del componente, default = ""
     * @param String $nSeriale -> numero seriale del componente, default = ""
     * @param String $aula -> aula in cui si trova il componente, default = ""
     */
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

  /**
  * Questo metodo viene invocato con il bottone.
  * Viene controllato se i campi inseriti sono corretti, ed in caso
  * positivo, aggiunge un nuovo componente.
  */
  public function add(){
    require_once 'application/models/component_model.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      try{
        if(Component::addComponent($_POST["marca"], $_POST["desc"], 
        $_POST["nSeriale"], $_POST["aula"], $_POST["categoria"])){
          header('Location: '.URL."ListComponents/index/".$_SESSION["idCategoria"]);
          $this->writeLog("(AddComponent) New component added");
        }
      }catch(Exception $e){
        $this->writeErrorLog("(AddComponent) Error while adding component");
        $this->index($e->getMessage(), $_POST["marca"], $_POST["desc"], 
        $_POST["nSeriale"], $_POST["aula"]);
      }
    }
  }
}
