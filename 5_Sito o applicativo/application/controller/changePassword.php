<?php

class ChangePassword extends Controller
{
  /**
   * Questo metodo serve per caricare la pagina per la modifica della password.
   * Viene controllato se l'utente è loggato ed ha i permessi.
   * 
   * @param String $message -> il messaggio di errore da stampare, default = ""
   */
  public function index($message = ""){
    if(!empty($_SESSION['id'])){
      if($_SESSION['isAdmin'] == 1){
        $this->view->errorMessage = $message;
        $this->view->render('ChangePassword/index.php');
      }else{
        $this->view->render('Home/index.php');
      }
    }else{
        $this->view->render('Login/index.php');
    }
  }

  /**
   * Questo metodo viene invocato schiacciato il bottone.
   * Se tutti i controlli vanno a buon fine, cambia la password.
   */
  public function change(){
    require_once 'application/models/changePassword_model.php';
    try{
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user = new ChangePasswordClass($_POST["email"], $_POST["oldPassword"], 
                $_POST["newPass"], $_POST["confPass"]);
        if($user->changePassword()){
          $this->view->render('Home/index.php');
        }
      }
    }catch(Exception $e){ 
      $this->index($e->getMessage());
    }
  }
}
