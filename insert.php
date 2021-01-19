<?
require 'DB.php';
header('location: /');

$jobs = R::dispense( 'jobs' );


$path = 'uploads/' . $_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'], $path);
$jobs->img = $path;


$jobs->text = htmlentities($_POST['text']);
// ! YOU CAN NOT PUT user_id
$jobs->userid = $_POST['userid'];
$jobs->useremail = $_POST['useremail'];

//create or update
$id = R::store( $jobs );
?>

