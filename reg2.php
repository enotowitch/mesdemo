<?
require 'DB.php';


$email = $_POST['email'];
$pass = $_POST['pass'];

// ! prevent duplicate users
$check = R::find('users', 'email = ? AND pass = ?', [$email, $pass]);

if($check){
	die('USER YET EXISTS!');
} else {

	$users = R::dispense( 'users' );

	$users->email = $email;
	$users->pass = $pass;
	
	$user = R::store( $users );
	
	if($user){
		session_start();
		$_SESSION['useremail'] = $users->email;
		$_SESSION['userid'] = $user;
		header("location: /");
	}

}



