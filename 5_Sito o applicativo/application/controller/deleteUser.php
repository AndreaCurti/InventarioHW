<?php

class DeleteUser extends Controller
{
  public function index(){
    if(!empty($_SESSION['id'])){
      if($_SESSION['isAdmin'] == 1){
        $this->view->render('deleteUser/index.php');
      }else{
        $this->view->render('Home/index.php');
      }
    }else{
      $this->view->render('Login/index.php');
    }
  }

  public function delete(){
    require_once 'application/models/deleteUser_model.php';
    try{
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user = new DeleteUserClass($_POST["email"], 
              $_POST["confEmail"]);
        if($user->deleteUser()){
          $this->view->render('Home/index.php');
        }
      }
    }catch(Exception $e){ 
      $this->index(); ?>
      <script>
          document.getElementById("errorDeleteUser").innerHTML = "<?php echo $e->getMessage()?>";
      </script>
    <?php }
  }
}
