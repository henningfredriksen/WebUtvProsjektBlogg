<?php
require_once 'config.php';

$dbaccess = new DBAccess();
$email = $_GET[email];
$id = $_GET[id];
$request = $_GET[request];

$query = "SELECT hash FROM users WHERE email = '" . $email . "'";
$result = $dbaccess->run_query($query);
$data = $result->fetch();
$hash = $data['hash'];

if($id == $hash) {
	if($request == "1") {
		$query = "UPDATE users SET email_confirmed = true WHERE email= '" . $email . "'";
		$dbaccess->run_query($query);
		header("Location: index.php");
	}else if($request == "2") {
		$_SESSION['resetingemail'] = $email;
		header("Location: changepassword.html");
	}else {
		echo "Noe har gått galt.... :(";
	}
}else {
	echo "Noe har gått galt.... :(";
}