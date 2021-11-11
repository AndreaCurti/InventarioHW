<?php

class ChangePassword extends Controller
{
  public function index(){
    if(!empty($_SESSION['id'])){
      if($_SESSION['isAdmin'] == 1){
        $this->view->render('ChangePassword/index.php');
      }else{
        $this->view->render('Home/index.php');
      }
    }else{
        $this->view->render('Login/index.php');
    }
  }

  public function change(){
    require_once 'application/models/changePassword_model.php';
    try{
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user = new ChangePasswordClass($_POST["email"], $_POST["oldPassword"], 
                $_POST["newPass"], $_POST["confPass"]);
        $user->changePassword();
      }
    }catch(Exception $e){ 
      $this->index(); ?>
      <script>
          document.getElementById("errorChangePassword").innerHTML = "<?php echo $e->getMessage()?>";
      </script>
    <?php }
  }
}
