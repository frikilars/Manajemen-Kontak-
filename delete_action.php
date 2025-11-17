<?php
require_once 'config.php';
require_once 'functions.php';
require_login();

$id = $_REQUEST['id'] ?? '';
if ($id === '') {
    header("Location: index.php");
    exit();
}

delete_contact($id);
header("Location: index.php");
exit();
