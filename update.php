<?
require 'DB.php';

$jobs = R::find( 'jobs', 'id = ?', [$_GET['id']] );

?>

<? foreach($jobs as $job): ?>
<form action="update2.php" method="POST" enctype="multipart/form-data">

<input type="file" name="file">
<input type="text" name="id" value="<? echo $job['id'];?>">
<input type="text" name="text" value="<? echo $job['text'];?>">
<input type="submit" value="UPDATE">

</form>

<? endforeach; ?>