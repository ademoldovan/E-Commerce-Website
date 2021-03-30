<?php
	$con = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($con, 'shop_project');

	$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
	$sql = "SELECT * FROM clienti WHERE username='".$username."'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

	$password = $row['pass_word'];
	$name = $row['nume'];
	$email = $row['email'];
	$phone = $row['numarTelefon'];
	$birthday = $row['dataNasterii'];

	if($username != null){
		echo "<table style='width:100%'>
			<tr>
				<th><i class='fas fa-user-tag'></i> Nume de utilizator: </th>
				<td>".$username."</td>
			</tr>
			<tr>
				<th><i class='fa fa-user'></i> Nume: </th>
				<td>".$name."</td>
			</tr>
			<tr>
				<th><i class='fas fa-envelope'></i> Email: </th>
				<td>".$email."</td>
			</tr>
			<tr>
				<th><i class='fas fa-phone'></i> Numar de telefon: </th>
				<td>".$phone."</td>
			</tr>
			<tr>
				<th><i class='fas fa-birthday-cake'></i> Data de nastere: </th>
				<td>".$birthday."</td>
			</tr>
		</table>
		<br>";
	}
?>