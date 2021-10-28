<?php
class addUser extends Controller
{
    public function index(){
      $this->view->render('addUser/index.php');
    }

    public function registerUser(){
      require 'application/models/addUser_model.php';
      try{
        if(!empty($_POST["nome"]) 
            && !empty($_POST["cognome"]) 
            && !empty($_POST["email"]) 
            && !empty($_POST["password"]) 
            && !empty($_POST["confPassword"])){
            $user = new AddUserClass($_POST["nome"], 
                $_POST["cognome"], $_POST["email"], 
                $_POST["password"], $_POST["confPassword"], 
                isset($_POST["isAdmin"]) ? 1 : 0);
            $user->createUser();
        }else{
            throw new Exception("Completare correttamente tutti i campi");
        }
    }catch(Exception $e){ 
        $this->index(); ?>
        <script>
            document.getElementById("errorAddUser").innerHTML = "<?php echo $e->getMessage()?>";
        </script>
    <?php }
    }
}