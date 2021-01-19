<?
session_start();
require 'DB.php';
// ! MY MESSAGES to some user

$touserid = $_POST['fromuserid'];

$messages = R::find('messages', 'fromuserid = ? AND touserid = ?', [$_SESSION['userid'], $touserid]);


foreach($messages as $message){
	$output = '<div>MY MES: '.$_SESSION['useremail'].'</div><div class="mes">';
}


foreach($messages as $message){
	$output .= '
	<p class="text mymes">'.$message['msg_text'].'</p>
';
}



$output .= '

</div>	

';



echo $output;
?>

<style>
.mymes{
	display: inline-block;
	font-size: 22px;
	padding: 15px;
	border-radius: 8px;
}
.mymes p{
	background-color: rgb(255, 169, 169);
}
</style>