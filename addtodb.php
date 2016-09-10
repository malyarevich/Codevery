<?php
	include ('script.php');
	$email = $_POST['email'];
	$fio = $_POST['fio'];
	$phone = $_POST['phone'];
	$comment = $_POST['comment'];
	$file = $_POST['file'];
	echo $form -> writeToDB($email, $fio, $phone, $comment, $file);
?>