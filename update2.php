<?
require 'DB.php';
header('location: /');


$jobs = R::findOne( 'jobs', 'id = ?', [$_POST['id']] );

	 $jobs->text = $_POST['text'];


	 $path = 'uploads/' . $_FILES['file']['name'];
	move_uploaded_file($_FILES['file']['tmp_name'], $path);
	$jobs->img = $path;
	
	 
    R::store( $jobs );