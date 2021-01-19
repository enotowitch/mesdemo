<?php
session_start();
require 'DB.php';
include_once "header.php";

$fromuserid = $_REQUEST['id'];


?>



<? 
include_once "footer.php";
?>

<div class="result">
<input type="hidden" name="fromuserid" value="<? echo $fromuserid; ?>">

</div>

<div class="mymes">

</div>

<div class="dialog">

</div>

<script>
	$(document).ready(function(){

		var fromuserid = $('input[name="fromuserid"]').val();

		$.ajax({
				url: 'message2.php',
				type: 'POST',
				dataType: 'text',
				data: {fromuserid:fromuserid},
				success: function(data){
					$('.result').html(data);
				},
			});

		setInterval(() => {
			$.ajax({
				url: 'message2.php',
				type: 'POST',
				dataType: 'text',
				data: {fromuserid:fromuserid},
				success: function(data){
					$('.result').html(data);
				},
			})
		}, 9000);

		$.ajax({
				url: 'mymes.php',
				type: 'POST',
				dataType: 'text',
				data: {fromuserid:fromuserid},
				success: function(data){
					$('.mymes').html(data);
				},
			});

			$.ajax({
				url: 'dialog.php',
				type: 'POST',
				dataType: 'text',
				data: {fromuserid:fromuserid},
				success: function(data){
					$('.dialog').html(data);
				},
			});




	})
</script>