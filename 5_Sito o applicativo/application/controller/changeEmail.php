<?php
class ChangeEmail extends Controller
{
  /**
   * Questo metodo serve per caricare la pagina per la modifica dell'email.
   * Viene controllato se l'utente è loggato ed ha i permessi.
   * 
   * @param String $message -> il messaggio di errore da stampare, default = ""
   */
  public function index($message = ""){
    if(!empty($_SESSION['id'])){
      if($_SESSION['isAdmin'] == 1){
        $this->view->errorMessage = $message;
        $this->view->render('ChangeEmail/index.php');
      }else{
        $this->view->render('Home/index.php');
      }
    }else{
      $this->view->render('Login/index.php');
    }
  }

  /**
   * Questo metodo viene invocato premuto il bottone, serve per cambiare l'email
   * In caso i vari controlli vadano a buon fine, l'email viene modificata.
   */
  public function change(){
    require_once 'application/models/changeEmail_model.php';
    try{
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user = new ChangeEmailClass($_POST["oldEmail"], 
        $_POST["newEmail"], $_POST["confEmail"], $_POST["confPass"]);
        $user->changeEmail();
        $this->view->render('Home/index.php');
      }
    }catch(Exception $e){ 
      $this->index($e->getMessage());
    }
  }
}
