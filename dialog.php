<?
session_start();
require 'DB.php';
// ! SEND MESSAGE


$fromuserid = $_POST['fromuserid'];


$messages = R::find('messages', 'fromuserid = ? AND touserid = ?', [$fromuserid, $_SESSION['userid']]);



foreach($messages as $message){
	$fromuserid = $message['fromuserid'];
	$fromuseremail = $message['fromuseremail'];
	$touserid = $message['touserid'];
	$touseremail = $message['touseremail'];
	$msg_text = $message['msg_text'];
}



$output .= '

<div id="dialog" title="SEND MESSAGE TO">
	<p class="send">SEND MESSAGE</p>
	<form action="messages2.php" method="POST">
		<!-- ! FROM -->
		<input type="hidden" name="fromuserid" value="'.$_SESSION['userid'].'">
		<input type="hidden" name="fromuseremail" value="'.$_SESSION['useremail'].'">
		<!-- ! TO -->
		<input type="hidden" name="touserid" value="'.$fromuserid.'">
		<input type="hidden" name="touseremail" value="'.$fromuseremail.'">
		
		<p>Enter your message here</p>
		<textarea rows="10" cols="30" name="msg_text"></textarea>
		<input type="submit" value="SEND MESSAGE">
	</form>
	</div>

';

echo $output;
// echo "<script>location.reload();</script>";

	?>