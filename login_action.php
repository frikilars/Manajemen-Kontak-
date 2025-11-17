<?php
require_once 'config.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$username = trim($username);
$password = trim($password);

global $USERS;

if (isset($USERS[$username]) && $USERS[$username] === $password) {
    $_SESSION['user'] = $username;
    header("Location: index.php");
    exit();
}

header("Location: login.php?error=1");
exit();
