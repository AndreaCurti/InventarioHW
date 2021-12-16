<?php
class AddUser extends Controller
{
    /**
     * Questo metodo serve per caricare la pagina per l'aggiunta di un utente.
     * Viene controllato se l'utente è loggato ed ha i permessi.
     * 
     * @param String $message -> il messaggio di errore da stampare, default = ""
     */
    public function index($message = ""){
        if(!empty($_SESSION['id'])){
            if($_SESSION['isAdmin'] == 1){
                $this->view->errorMessage = $message;
                $this->view->render('addUser/index.php');
            }else{
                $this->view->render('Home/index.php');
            }
        }else{
            $this->view->render('Login/index.php');
        }
    }

    /**
     * Questo metodo viene invocato con il bottone.
     * Viene controllato se i campi inseriti sono corretti, ed in caso
     * positivo, aggiunge un nuovo utente.
     */
    public function registerUser(){
        require_once 'application/models/addUser_model.php';
        try{
            $user = new AddUserClass($_POST["nome"], 
                    $_POST["cognome"], $_POST["email"], 
                    $_POST["password"], $_POST["confPassword"], 
                    isset($_POST["isAdmin"]) ? 1 : 0);
            if($user->createUser()){
                $this->view->render('Home/index.php');
            }            
        }catch(Exception $e){ 
            $this->index($e->getMessage());
        }
    }
}