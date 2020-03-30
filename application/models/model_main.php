<?php

class Model_Main extends Model
{
	
	public function get_data()
	{	
	}

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
}