<?php
//session_start();
class addUser extends Controller
{
    public function index(){
        if(!empty($_SESSION['id'])){
            if($_SESSION['isAdmin'] == 1){
                $this->view->render('addUser/index.php');
            }else{
                $this->view->render('Home/index.php');
            }
        }else{
            $this->view->render('Login/index.php');
        }
    }

    public function registerUser(){
        require_once 'application/models/addUser_model.php';
        try{
            $user = new AddUserClass($_POST["nome"], 
                    $_POST["cognome"], $_POST["email"], 
                    $_POST["password"], $_POST["confPassword"], 
                    isset($_POST["isAdmin"]) ? 1 : 0);
            $user->createUser();
        }catch(Exception $e){ 
            $this->index(); ?>
            <script>
               document.getElementById("errorAddUser").innerHTML = "<?php echo $e->getMessage()?>";
            </script>
        <?php }
    }
}