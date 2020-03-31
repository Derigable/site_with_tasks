<?php

class Model_Main extends Model {
	
	public function get_all_tasks() {
		$link = mysqli_connect('mysql.zzz.com.ua', 'derigable', 'H7p1r8F9BZ1', 'derigable');
		if (!$link) {
			echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
			echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
			echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
			exit;
		}

		$query = "SELECT * FROM `tasks`";
		if (!$result = mysqli_query($link, $query)) {
			printf("Ошибка: %s\n", mysqli_error($link));
		}
		mysqli_close($link); 

		return $result;
	}

	public function status_change($id) {		
		$link = mysqli_connect('mysql.zzz.com.ua', 'derigable', 'H7p1r8F9BZ1', 'derigable');
		if (!$link) {
			echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
			echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
			echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
			exit;
		}

		// Определяем текущий статус задачи
		$query = "SELECT status FROM tasks WHERE tasks.id = $id";
		if (!$result = mysqli_query($link, $query)) {
			printf("Ошибка: %s\n", mysqli_error($link));
		}

		$result = $result->fetch_array();
		$current_status = $result['status'];

		// Меняем статус на противоположный
		if ($current_status == 'В процессе') {
			$current_status = 'Выполнено';
		} else {
			 $current_status = 'В процессе'; 
		}

		// Обновляем статус у задачи
		$query = "UPDATE `tasks` SET `status` = '$current_status' WHERE `tasks`.`id` = $id;";
		if (!$result = mysqli_query($link, $query)) {
			printf("Ошибка: %s\n", mysqli_error($link));
		}
		mysqli_close($link); 

		return $result;
	}
}