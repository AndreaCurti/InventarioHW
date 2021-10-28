<?php

class Login extends Controller
{
    public function index(){
      $this->view->render('login/index.php');
    }

    public function doLogin(){
      require 'application/models/login_model.php';
      try{
        if($_SERVER["REQUEST_METHOD"] == "POST"){
          $user = new LoginClass($_POST["email"], 
                $_POST["password"]);
          $user->doLogin();
        }else{ 
          throw new Exception("Email o password non valida");
        }
      }catch(Exception $e){ 
        $this->index(); ?>
        <script>
            document.getElementById("errorLogin").innerHTML = "<?php echo $e->getMessage()?>";
        </script>
<?php }
}
}
