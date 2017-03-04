<?php


$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['passwd'])) {
$error = "Username or Password is invalid";
}
}



?>