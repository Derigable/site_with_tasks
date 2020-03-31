<?php

class Model_Login extends Model {

	public function login($username, $password) {

		if (empty($username) || empty($password)) {
			return "Вы заполнили не все поля";
		}

		// конвертируем теги и прочее
		$username = htmlentities(trim($username), ENT_QUOTES);
		$password = sha1(htmlentities(trim($password), ENT_QUOTES));

		$mysqli = new mysqli('mysql.zzz.com.ua', 'derigable', 'H7p1r8F9BZ1', 'derigable');

		// проверка подключения 
		if (mysqli_connect_errno()) {
			printf("Не удалось подключиться: %s\n", mysqli_connect_error());
			exit();
		}

		$stmt = $mysqli->prepare("SELECT id FROM users WHERE login = ? and password = ?");
		$stmt->bind_param('ss', $username, $password);

		// выполнение подготовленного запроса 
		$stmt->execute();
		
		// привязка переменной к запросу
		$test = $stmt->bind_result($id);

		// выборка данных
		$stmt->fetch();
			
		if (!is_null($id)) {
			session_start();
			$_SESSION['username'] = 'admin';
			$text = "Вы успешно авторизовались как администратор";
		} else {
			$text = "Неправильно указаны реквизиты доступа";
		}
	
		// закрываем запрос 
		$stmt->close();

		// закрываем подключение 
		$mysqli->close();

		return $text;
	}

	public function logout() {
		session_start();
		unset($_SESSION["username"]);
	}

	public function session_check() {
		session_start();
		if( empty($_SESSION['username']) ) {
			echo "Expired";
		} else {
			echo "Active";
		}
	}

}