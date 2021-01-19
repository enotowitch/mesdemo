<?php
session_start();
require 'DB.php';
include_once "header.php";



// ! show LAST message to CURRENT user
$messages = R::find('messages', 'touserid = ? ORDER BY id DESC LIMIT 123456789', [$_SESSION['userid']]);
$messAll = R::find('messages');
// $messAll = R::find('messages', 'touserid = ?, fromuserid = ?', [$_SESSION['userid'], ?????????]);


?>

<style>
	.mes {
		border: 2px solid green;
		margin-bottom: 10px;
	}

	.to {
		color: tomato;
	}

	.from {
		/* height: 50px; */

		font-size: 22px;
	}

	.text {
		color: #356341;
	}
	a{
		text-decoration: none;
	}
</style>

<div class="to">
Your messages. YOU LOGED IN AS: <? echo $_SESSION['useremail']; ?>
</div>

<? if(!$messages){
	echo "NO NEW MESSAGES";
}
?>

<? foreach($messages as $message): ?>

	

	<? 
	
	$one_msg_came[] = "";
	
	if(in_array($message['fromuserid'], $one_msg_came)){
		continue;
	} 
	
	?>


<form action="message2.php" method="POST">

	<input type="hidden" name="fromuserid" value="<? echo $message['fromuserid'] ?>">

		<div class="mes">
				<p class="from">FROM:
					<? echo $message['fromuseremail'] ?>
				</p>
				<p class="text">TEXT:
					<? echo $message['msg_text'] ?>
				</p>
				
				<!-- <input type="submit" value="MORE MESSAGES"> -->
				<a href="message.php?id=<? echo $message['fromuserid'] ?>">READ MORE</a>
		</div>


</form>

<? $one_msg_came[] = $message['fromuserid']; ?>

<? endforeach; ?>









<!-- ! DELETE -->

<!-- <? 
include_once "footer.php";
?> -->

<!-- <script>
	$(document).ready(function(){
		setTimeout(() => {
			$.ajax({
				url: 'messages2.php',
				type: 'POST',
				dataType: 'text',
				success: function(){
					// alert('yEAS');
				},
			})
		}, 1000);
	})
</script> -->