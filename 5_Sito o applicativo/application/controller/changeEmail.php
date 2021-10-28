<?php

class ChangeEmail extends Controller
{
  public function index(){
    $this->view->render('changeEmail/index.php');
  }

  public function change(){
    require 'application/models/changeEmail_model.php';
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
