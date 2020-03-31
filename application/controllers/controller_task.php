<?php

class Controller_Task extends Controller {

	function __construct(){
		$this->model = new Model_Task();
		$this->view = new View();
	}

	function action_index(){	
		$this->view->generate('task_view.php', 'template_view.php');
	}

	function action_send() {
		$username = $_POST['name'];
		$email = $_POST['email'];
		$task = $_POST['task'];

		$result = $this->model->send($username, $email, $task);
		$this->view->generate('successfull_task_view.php', 'template_view.php', $result);
	}

	function action_get_all_tasks() {
		$result = $this->model->get_all_tasks();
	}

	function action_edit_task() {
		$id = $_POST['id'];
		$task = $_POST['task'];
		$task_changed = $_POST['task_changed'];

		$result = $this->model->edit_task($id, $task, $task_changed);
		echo $result;
	}
	
}
