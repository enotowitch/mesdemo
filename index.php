<?
session_start();
require 'DB.php';

$jobs = R::find( 'jobs' );

?>

<link rel="stylesheet" href="jquery-ui/jquery-ui.css">

<style>
	img {
		display: block;
	}

	.post {
		margin-bottom: 35px;
	}
</style>
<!--  -->
<div> <a href="login.php">LOGIN</a> OR <a href="reg.php">REGISTER</a><br><br>
	<a href="messages.php">YOUR MESSAGES</a></div>
<hr>
<br>
<?
echo 'HELLO '. strtok($_SESSION['useremail'], '@');
?>
<br>
<hr>
<br>
<!-- ! INSERT -->
<p>INSERT</p>
<form action="insert.php" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="useremail" value="<? echo $_SESSION['useremail']; ?>">
	<!-- userid -->
	<input type="hidden" name="userid" value="<? echo $_SESSION['userid']; ?>">
	<input type="file" name="file">
	<input type="text" name="text">
	<input type="submit" value="insert">
</form>
<!-- ? INSERT -->
<br>
<br>
<hr>
<!-- ! POST -->
<? foreach($jobs as $job): ?>
<div class="post">
	<img src="<? echo $job['img'];?>" height="40">
	<div>
		<? echo $job['id'];?>
	</div>
	<div>
		<? echo $job['text'];?>
	</div>
	<div style="color: tomato;">
		POST BY: <? echo $job['useremail'];?>
	</div>

	<a href="destroy.php?id=<? echo $job['id']; ?>">delete</a>
	<a href="update.php?id=<? echo $job['id']; ?>">update</a>

	<!-- ! strtok() -->
	<!-- // ! MESSAGE -->
	<div class="dialog" title="SEND MESSAGE TO <? echo strtok($job['useremail'], '@');?>">
		<p class="send">SEND MESSAGE</p>
		<form action="messages2.php" method="POST">
			<!-- ! FROM -->
			<input type="hidden" name="fromuserid" value="<? echo $_SESSION['userid']; ?>">
			<input type="hidden" name="fromuseremail" value="<? echo $_SESSION['useremail']; ?>">
			<!-- ! TO -->
			<input type="hidden" name="touserid" value="<? echo $job['userid']; ?>">
			<input type="hidden" name="touseremail" value="<? echo $job['useremail']; ?>">
			
			<p>Enter your message here</p>
			<textarea rows="10" cols="30" name="msg_text"></textarea>
			<input type="submit" value="SEND MESSAGE">
		</form>
		<!-- // ? MESSAGE -->
	</div>
</div>
<? endforeach; ?>
<!-- ? POST -->

<h1>FIND EXACT CELL = $logo = R::getCell("select logo_path from jobs where id='$id'");</h1>



<? 
include_once "footer.php";
?>

<script>
	// $('.dialog').children().hide();
	$('.send').show();
	$('.dialog').on('click', function () {
		// $(this).children().show();
		$('.send').hide();
		$(this).dialog({
			modal: true,
			resizible: true,
		});
	})
</script>