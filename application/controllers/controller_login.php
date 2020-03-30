<?php

class Controller_Login extends Controller
{
	function __construct(){
		$this->model = new Model_Login();
		$this->view = new View();
	}

	function action_index()	{
		$this->view->generate('login_view.php', 'template_view.php');
	}

	function action_login() {
		$username = $_POST['name'];
		$password = $_POST['password'];

		$result = $this->model->login($username, $password);
		$this->view->generate('login_view.php', 'template_view.php', $result);
		
	}

	function action_logout() {
		$this->model->logout();
	}

	function action_session_check() {
		$this->model->session_check();
	}
	
}
