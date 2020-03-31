<?php

class Model_Task extends Model {
	
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
		$status = "В процессе";
		$task_changed = 0;
		
		$mysqli = new mysqli('mysql.zzz.com.ua', 'derigable', 'H7p1r8F9BZ1', 'derigable');

		/* проверка подключения */
		if (mysqli_connect_errno()) {
			printf("Не удалось подключиться: %s\n", mysqli_connect_error());
			exit();
		}

		$stmt = $mysqli->prepare("INSERT INTO tasks (name, email, task_description, status, task_changed) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param('ssssi', $username, $email, $task, $status, $task_changed);

		/* выполнение подготовленного запроса */
		$stmt->execute();

		/* закрываем запрос */
		$stmt->close();

		/* закрываем подключение */
		$mysqli->close();

		return "Задача успешно добавлена!";
	}

	public function edit_task($id, $task, $task_changed) {

		$task = htmlentities(trim($task), ENT_QUOTES);

		if (empty($task)) {
			return "Вы заполнили не все поля";
		}

		$mysqli = new mysqli('mysql.zzz.com.ua', 'derigable', 'H7p1r8F9BZ1', 'derigable');

		/* проверка подключения */
		if (mysqli_connect_errno()) {
			printf("Не удалось подключиться: %s\n", mysqli_connect_error());
			exit();
		}

		$stmt = $mysqli->prepare("UPDATE `tasks` SET `task_description` = ? , `task_changed` = ? WHERE `tasks`.`id` = ?");
		$stmt->bind_param('sii', $task, $task_changed, $id);

		/* выполнение подготовленного запроса */
		$stmt->execute();

		/* закрываем запрос */
		$stmt->close();

		/* закрываем подключение */
		$mysqli->close();

		return "Задача успешно обновлена!";
	}
}