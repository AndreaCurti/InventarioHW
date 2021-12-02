<?php
class ListComponents extends Controller
{
  public function index($categoria = 0){
    $this->view->components = $this->listAll($categoria);
    if($categoria == 0){
      $this->view->errorMessage = "Selezionare una categoria";
    }
    $this->view->idCategoria = $categoria; 
    $this->view->render('ListComponents/index.php');
  }

  public function listAll($categoria){
    require_once 'application/models/listComponents_model.php';
    $components = new ListComponentsClass($categoria);
    try{
      $_SESSION['emptyList'] = 0;
      return $components->getComponents();
    }catch(Exception $e){ 
      $_SESSION['emptyList'] = 1; 
      $this->view->errorMessage = "Nessun elemento presente in questa categoria";
    }
  }

  public function askConfirm($id, $idCategoria){
    $this->view->idComponente = $id;
    $this->view->idCategoria = $idCategoria;
    $this->view->render('ListComponents/confirmDelete.php');
  }

  public function deleteComponent($id, $idCategoria){
    require_once 'application/models/component_model.php';
    $component = new Component($id);
    if($component->delete()){
      $this->index($idCategoria);
    }
  }
}
