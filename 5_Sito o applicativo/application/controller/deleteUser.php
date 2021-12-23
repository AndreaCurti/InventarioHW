<?php

class DeleteUser extends Controller
{
  /**
   * Questo metodo serve per caricare la pagina per 
   * l'eliminazione di un utente.
   * Viene controllato se l'utente è loggato ed ha i permessi.
   * 
   * @param String $message -> il messaggio di errore da stampare, default = ""
   */
  public function index($message = ""){
    if(!empty($_SESSION['id'])){
      if($_SESSION['isAdmin'] == 1){
        $this->view->errorMessage = $message;
        $this->view->render('deleteUser/index.php');
      }else{
        $this->view->render('Home/index.php');
      }
    }else{
      $this->view->render('Login/index.php');
    }
  }

  /**
   * Questo metodo viene invocato una volta premuto il bottone.
   * Se tutti i controlli vanno a buon fine, l'utente viene eliminato.
   */
  public function delete(){
    require_once 'application/models/deleteUser_model.php';
    try{
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user = new DeleteUserClass($_POST["email"], 
              $_POST["confEmail"]);
        $user->deleteUser();
        $this->writeLog("(DeleteUser) User deleted");
        $this->view->render('Home/index.php');
      }
    }catch(Exception $e){ 
      $this->writeErrorLog("(DeleteUser) User not deleted");
      $this->index($e->getMessage());
    }
  }
}
