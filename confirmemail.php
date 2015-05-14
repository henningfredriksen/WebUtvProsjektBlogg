<?php
require_once 'config.php';

$dbaccess = new DBAccess();
$email = $_GET[email];
$id = $_GET[id];


$query = "SELECT hash FROM users WHERE email = '" . $email . "'";
$result = $dbaccess->run_query($query);
$data = $result->fetch();
$hash = $data['hash'];

if($id == $hash) {
	$query = "UPDATE users SET email_confirmed = 1 WHERE email= '" . $email . "'";
	$dbaccess->run_query($query);
	header("Location: index.php");
}else {
	echo "Noe har gått galt.... :(";
}