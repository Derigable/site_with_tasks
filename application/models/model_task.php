<?php

class Model_Task extends Model
{
	
	public function get_data()
	{	
	}

	public function send($username, $email, $task) {

		if (empty($username) || empty($email) || empty($task)) {
			return "Вы заполнили не все поля";
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return "Вы неверно заполнили поле email";
		}

		// конвертируем теги и прочее
		$username = htmlentities(trim($username), ENT_QUOTES);
		$email = htmlentities(trim($email), ENT_QUOTES);
		$task = htmlentities(trim($task), ENT_QUOTES);
		$status = 0;
		
		$mysqli = new mysqli('mysql.zzz.com.ua', 'derigable', 'H7p1r8F9BZ1', 'derigable');

		/* проверка подключения */
		if (mysqli_connect_errno()) {
			printf("Не удалось подключиться: %s\n", mysqli_connect_error());
			exit();
		}

		$stmt = $mysqli->prepare("INSERT INTO tasks (name, email, task_description, status) VALUES (?, ?, ?, ?)");
		$stmt->bind_param('sssi', $username, $email, $task, $status);

		/* выполнение подготовленного запроса */
		$stmt->execute();

		/* закрываем запрос */
		$stmt->close();

		/* закрываем подключение */
		$mysqli->close();

		return "Задача успешно добавлена!";
	}
}