<?php
	$con = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($con, 'shop_project');

	$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
	$username = isset($_REQUEST['username']) ? $_REQUEST['username'] : '';
	$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
	$fname = isset($_REQUEST['fname']) ? $_REQUEST['fname'] : '';
	$lname = isset($_REQUEST['lname']) ? $_REQUEST['lname'] : '';
	$date = isset($_REQUEST['date']) ? $_REQUEST['date'] : '';
	$phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : '';
	
	$succes = true;
	$errors = array();
	
	if(!isset($username) || empty($username)){
		$succes = false;
		$errors[] = 'Username-ul nu poate fi gol!';
	}
	
	if(strlen($username) < 6){
		$succes = false;
		$errors[] = 'Username-ul trebuie sa contina minim 6 caractere!';
	}
	
	if(!isset($password) || empty($password)){
		$succes = false;
		$errors[] = 'Parola nu poate fi goala!';
	}
	
	if(strlen($password) < 6){
		$succes = false;
		$errors[] = 'Parola trebuie sa contina minim 6 caractere!';
	}
	
	if(!isset($email) || empty($email)){
		$succes = false;
		$errors[] = 'Email-ul nu poate fi gol!';
	}
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$succes = false;
		$errors[] = 'Email invalid!';
	}
	
	if(!isset($fname) || empty($fname) || !isset($lname) || empty($lname)){
		$succes = false;
		$errors[] = 'Numele nu poate fi gol!';
	}
	
	if(!isset($phone) || empty($phone)){
		$succes = false;
		$errors[] = 'Va rugam introduceti numarul de telefon!';
	}
	
	if(strlen($phone) < 10){
		$succes = false;
		$errors[] = 'Numarul de telefon trebuie sa fie format din 10 cifre!';
	}
	
	if(!isset($date) || empty($date)){
		$succes = false;
		$errors[] = 'Va rugam introduceti data nasterii!';
	}
	
	if($succes){
		$sql = "INSERT INTO clienti (username, pass_word, nume, email, numarTelefon, dataNasterii) 
		VALUES ('".$username."','".$password."','".$fname." ".$lname."','".$email."','".$phone."','".$date."')";
		$result = mysqli_query($con, $sql);

		if($result){
			echo "Inregistrarea a fost efectuata cu succes!";
		}else{
			echo "A aparut o eroare la inregistrare!";
		}
	}else{
		foreach($errors as $i=>$value){
			echo $value."<br>";
		}
	}
?>