<?php

class DeleteUser extends Controller
{
  public function index(){
    $this->view->render('deleteUser/index.php');
  }

  public function delete(){
    require 'application/models/deleteUser_model.php';
    try{
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user = new DeleteUserClass($_POST["email"], 
              $_POST["confEmail"]);
        $user->deleteUser();
      }
    }catch(Exception $e){ 
      $this->index(); ?>
      <script>
          document.getElementById("errorDeleteUser").innerHTML = "<?php echo $e->getMessage()?>";
      </script>
    <?php }
  }
}
