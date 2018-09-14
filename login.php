<?php
include 'ligar_db.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$password = mysqli_real_escape_string($link, $_POST['password']);

	$query = mysqli_query($link, "SELECT * FROM users WHERE email='$email' AND password='$password'");

	if (mysqli_num_rows($query) > 0) {
		$_SESSION['user'] = array("$email", "$password");
	} 
	

}
?>