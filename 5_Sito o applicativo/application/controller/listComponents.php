<?php
class ListComponents extends Controller
{
  /**
   * Questo metodo serve per caricare la pagina
   * per la lista dei componenti.
   * Viene controllato se l'utente è loggato ed ha i permessi
   * e vengono richiamati vari metodi per trovare la lista da stampare.
   * 
   * @param Int $categoria -> la categoria del componente, default = 0
   */
  public function index($categoria = 0){
    if(!empty($_SESSION['id'])){
      $_SESSION["components"] = $this->listAll($categoria);
      if($categoria == 0){
        $this->view->errorMessage = "Selezionare una categoria";
      }
      $_SESSION["idCategoria"] = $categoria; 
      $this->view->render('ListComponents/index.php');
    }else{
        $this->view->render('Login/index.php');
    }
  }

  /**
   * Questo metodo serve per trovare la lista di tutti gli elementi di una lista.
   * 
   * @param Int $categoria -> la categoria del componente, default = 0
   */
  public function listAll($categoria){
    require_once 'application/models/component_model.php';
    try{
      $_SESSION['emptyList'] = 0;
      return Component::getComponents($categoria);
    }catch(Exception $e){ 
      $_SESSION['emptyList'] = 1; 
      $this->view->errorMessage = "Nessun elemento presente in questa categoria";
    }
  }

  /**
   * Questo metodo serve per chiedere conferma prima
   * dell'eliminazione di un componente.
   * 
   * @param Int $id -> id del componente
   * @param Int $idCategoria -> id della categoria del componente
   */
  public function askConfirm($id, $idCategoria){
    $this->view->idComponente = $id;
    $this->view->idCategoria = $idCategoria;
    $this->view->render('ListComponents/confirmDelete.php');
  }

  /**
   * Questo metodo elimina il componente selezionato
   * 
   * @param Int $id -> id del componente
   * @param Int $idCategoria -> id della categoria del componente
   */
  public function deleteComponent($id, $idCategoria){
    require_once 'application/models/component_model.php';
    $component = new Component($id);
    if($component->delete()){
      $this->index($idCategoria);
    }
  }
}
