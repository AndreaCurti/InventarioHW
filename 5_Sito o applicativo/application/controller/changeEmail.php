<?php
class ChangeEmail extends Controller
{
  public function index(){
    if(!empty($_SESSION['id'])){
      if($_SESSION['isAdmin'] == 1){
        $this->view->render('ChangeEmail/index.php');
      }else{
        $this->view->render('Home/index.php');
      }
    }else{
      $this->view->render('Login/index.php');
    }
  }

  public function change(){
    require_once 'application/models/changeEmail_model.php';
    try{
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user = new ChangeEmailClass($_POST["oldEmail"], 
        $_POST["newEmail"], $_POST["confEmail"], $_POST["confPass"]);
        $user->changeEmail();
      }
    }catch(Exception $e){ 
      $this->index(); ?>
      <script>
          document.getElementById("errorChangeEmail").innerHTML = "<?php echo $e->getMessage()?>";
      </script>
    <?php }
  }
}
