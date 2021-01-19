<?php
session_start();
require 'DB.php';



$fromuserid = $_POST['fromuserid'];





// ORDER BY id DESC LIMIT 123
$messages = R::find('messages', 'fromuserid = ? AND touserid = ?', [$fromuserid, $_SESSION['userid']]);


foreach($messages as $message){
	$output = '<div>MESSAGES FROM: '.$message['fromuseremail'].'</div><div class="mes">
	<div>AND I am '.$_SESSION['useremail'].'</div>
	';
}


foreach($messages as $message){
	$output .= '
	<p class="text">'.$message['msg_text'].'</p>
';
}



$output .= '

</div>	

';



echo $output;






	
?>