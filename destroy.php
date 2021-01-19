<?
require 'DB.php';
header('location: /');

R::hunt( 'jobs', 'id = ?', [$_GET['id']] );