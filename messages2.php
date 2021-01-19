<?
session_start();
require 'DB.php';
// header('Location: '.$_SERVER['PHP_SELF']);



// <!-- ! FROM -->
$fromuserid = $_POST['fromuserid'];
$fromuseremail = $_POST['fromuseremail'];
// <!-- ! TO -->
$touserid = $_POST['touserid'];
$touseremail = $_POST['touseremail'];
$msg_text = $_POST['msg_text'];



$messages = R::dispense( 'messages' );


// <!-- ! FROM -->
$messages->fromuserid = $fromuserid;
$messages->fromuseremail = $fromuseremail;
// <!-- ! TO -->
$messages->touserid = $touserid;
$messages->touseremail = $touseremail;
$messages->msg_text = $msg_text;

if($msg_text && $msg_text != '' && $msg_text != NULL){
	$id = R::store( $messages );
}


header("Location: message.php?id=$touserid");

?>







