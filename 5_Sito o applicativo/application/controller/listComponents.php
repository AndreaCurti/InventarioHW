<?php
class ListComponents extends Controller
{
  public function index($categoria = 0){
    $this->view->components = $this->listAll($categoria);
    $this->view->render('ListComponents/index.php');
  }

  public function listAll($categoria){
    require_once 'application/models/listComponents_model.php';
    $components = new ListComponentsClass($categoria);
    try{
      $_SESSION['emptyList'] = 0;
      return $components->getComponents();
    }catch(Exception $e){ 
      $_SESSION['emptyList'] = 1; ?>
    <?php }
  }
}
