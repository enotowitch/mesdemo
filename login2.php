<?php
require 'DB.php';
session_start();


$email = $_POST['email'];
$pass = $_POST['pass'];

$user = R::find('users', 'email = ? AND pass = ?', [$email, $pass]);



if($user){

	foreach($user as $user){

		$_SESSION['useremail'] = $user['email'];
		$_SESSION['userid'] = $user['id'];

	}
	header("location: /");

} else {
	echo 'NO USER';
}

?>