<?php
require_once 'config.php';

$email = $_GET['email'];

$emailsender = new SendEmail();

$emailsender->SendEmailToResetPassword($email);