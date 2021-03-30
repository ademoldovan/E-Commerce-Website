<?php
	$con = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($con, 'shop_project');

	$username = isset($_REQUEST['username']) ? $_REQUEST['username'] : null;
	$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;

	$succes = true;
	$errors = array();

	if(!isset($username) || empty($username)){
		$succes = false;
		$errors[] = 'Va rog sa introduceti numarul de utilizator!';
	}

	if(!isset($password) || empty($password)){
		$succes = false;
		$errors[] = 'Va rog sa introduceti parola!';
	}

	if($succes){
		$sql = "SELECT * FROM clienti WHERE username='".$username."' AND pass_word='".$password."'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);

		if($count == 1){
			session_start();
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $username;
			$_SESSION['name'] = $row['nume'];
			session_write_close();
			echo 1;
			exit();
		}else{
			echo "Combinatie de username si parola gresite!";
			die();
		}
	}else{
		foreach($errors as $i=>$value){
			echo $value."<br>";
		}
	}
?>