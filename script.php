<?php

class FormClass {
	var $email;
	var $fio;
	var $phone;
	var $comment;
	var $file;
	var $errArray;
	var $result_set;
	var $is_err;
	public function FormClass() {
		$this -> result_set = '';
		$this -> email = '';
		$this -> fio = '';
		$this -> phone = '';
		$this -> comment = '';
		$this -> file = '';
		$this -> errArray = array(
			'email' => false,
			'fio' => false,
			'phone' => false,
			'comment' => false,
			'file' => false);
		$this -> is_err = '';
	}

	public function checkEmail($email) {
		if (!(filter_var(trim($email), FILTER_VALIDATE_EMAIL))) {
			$this -> errArray['email'] = true;
			return false;
		}
		$this -> errArray['email'] = false;
		return true;
	}

	public function checkFio($fio) {
		$pattern = '/^[А-ЯA-Z]{1}[а-яА-Яa-zA-Z\ \-]{0,150}$/';
		$fio = trim($fio);
		if(!preg_match($pattern, $fio)) {
			$this -> errArray['fio'] = true;
			return false;
		}
		$this -> errArray['fio'] = false;
		return true;
	}

	public function checkPhone($phone) {
		if (trim($phone) !== '') {
				//https://regex101.com/r/rO8uO3/1 - test this pattert in work
			$pattern = '/^[\+]?[0-9\-\ ]{1,4}?[\(]?[0-9\-\ ]{2,5}[\)]?[0-9\-\ ]{5,10}$/';
			if(preg_match($pattern, $phone)){
				$this -> errArray['phone'] = false;
				return true;
			} else {
				$this -> errArray['phone'] = true;
				return false;
			}
		}
		$this -> errArray['phone'] = false;
		return true;
	}

	public function checkComment($comment) {
		if(trim($comment) == '') {
			$this -> errArray['comment'] = true;
			return false;
		}
		$this -> errArray['comment'] = false;
		return true;
	}

	public function checkFile($file) {
		if ($this -> file !== '')
		{
			if (file_exists($file)) {
				$this -> errArray['file'] = false;
				return true;
			} else {
				$this -> errArray['file'] = true;
				return false;
			}
		}
		$this -> errArray['file'] = false;
		return true;
	}

	public function checkFields() {
		$correctFields = true;
		$correctFields = $this -> checkEmail($_POST['InputEmail']);
		$correctFields = $this -> checkFio($_POST['InputFio']);
		$correctFields = $this -> checkPhone($_POST['InputPhone']);
		$correctFields = $this -> checkComment($_POST['InputComment']);
		$correctFields = $this -> checkFile($_POST['InputFile']);
		return $correctFields;
	}
	public function readData() {
		$this -> email = $_POST['InputEmail'];
		$this -> fio = $_POST['InputFio'];
		$this -> phone = $_POST['InputPhone'];
		$this -> comment = $_POST['InputComment'];
		$this -> file = $_POST['InputFile'];
		if ($this -> file != '') {
			$this -> file = substr_replace($this -> file, null, 0, 12);
		}
	}

	public static function ShowComments() {
		$login = 'codevery';
		$pass = 'codevery';
		$connection = new PDO("mysql:host=mysql.zzz.com.ua;dbname=malyarevich", $login, $pass);
		$result_arr = array();
		foreach($connection -> query('SELECT * FROM `comments`') as $row) {
			$item = array('fio' => $row['fio'], 'email' => $row['email'], 'id' => $row['id'], 'date' => $row['date'], 'comment' => $row['comment'], 'file' => $row['file']);
			array_push($result_arr, $item);
		}
		$connection = null;

		$json_data = json_encode($result_arr);
		return $json_data;
	}

	public function getCurrentInfo() {
		$this -> is_err = false;
		$result_arr = array(); 
		$i = 0;

		foreach ($this -> errArray as &$value) {
			$result_arr['err' . $i] = $value;
			if ($value) {
				$this -> is_err = true;
			}
			$i ++;
		}

		$result_arr['is_err'] = $this -> is_err;#1
		$result_arr['email'] = $this -> email;#2
		$result_arr['fio'] = $this -> fio;#3
		$result_arr['phone'] = $this -> phone;#4
		$result_arr['comment'] = $this -> comment;#5
		$result_arr['file'] = $this -> file;#6

		$json_data = json_encode($result_arr);
		return $json_data;
	}

	public function writeToDB($email, $fio, $phone, $comment, $file) {
		$login = 'codevery';
		$pass = 'codevery';
		$connection = new PDO("mysql:host=mysql.zzz.com.ua;dbname=malyarevich", $login, $pass);
		if( !$this -> is_err ) {
			if ($phone == '') {
				$PH = 'NULL';
			} else {
				$PH = '\'' . $phone .'\'';
			}			
			if ($file == '') {
				$FL = 'NULL';
			} else {
				$FL = '\'' . $file .'\'';
			}
			$today = date("Y-m-d H:i:s");

			$temp['sql'] = $sql = 'INSERT INTO `comments` (`id` , `date`, `email`, `fio`, `phone`, `comment`, `file`) VALUES( NULL, \'' . $today . '\', \'' . $email . '\', \'' . $fio . '\', ' . $PH . ', \'' . $comment . '\', ' . $FL . ');';
			$connection -> query($sql);
		}
		$connection = null;

		$json_data = json_encode($temp);
		return $json_data;
	}
}

$form = new FormClass();
if($form -> checkFields()) {
	$form -> readData();
}
?>