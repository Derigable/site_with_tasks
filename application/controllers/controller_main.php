<?php

class Controller_Main extends Controller
{
	function __construct(){
		$this->model = new Model_Main();
		$this->view = new View();
	}

	function action_index()
	{	
		$result = $this->model->get_all_tasks();
		$this->view->generate('main_view.php', 'template_view.php', $result);
	}

	function action_status_change() {
		$this->model->status_change($_POST['task_id']);
	}
}