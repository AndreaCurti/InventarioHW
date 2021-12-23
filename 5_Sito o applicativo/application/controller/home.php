<?php
/**
 * questo metodo carica la pagina home
 */
class Home extends Controller
{
  public function index(){
	$this->view->render("Home/index.php");
  }

  /**
  * Questo metodo carica, in base al bottone cliccato, 
  * la pagina giusta.
  */
  public function load(){
    if(isset($_POST['listComponents'])){
		header('Location: '.URL."ListComponents");
	}else if(isset($_POST['users'])){
		$this->view->render("Home/manageUsers.php");
	}else if(isset($_POST['add'])){
		header('Location: '.URL."AddUser");
	}else if(isset($_POST['remove'])){
		header('Location: '.URL."DeleteUser");
	}else if(isset($_POST['changeEmail'])){
		header('Location: '.URL."ChangeEmail");
	}else if(isset($_POST['changePass'])){
		header('Location: '.URL."ChangePassword");
	}
  }
}

?>
