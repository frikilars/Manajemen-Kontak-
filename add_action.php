<?php
require_once 'config.php';
require_once 'functions.php';
require_login();

$name = sanitize($_POST['name'] ?? '');
$email = sanitize($_POST['email'] ?? '');
$phone = str_replace(' ', '', $_POST['phone'] ?? ''); // hapus spasi
$phone = sanitize($phone);
$asal = sanitize($_POST['asal'] ?? '');
$catatan = sanitize($_POST['catatan'] ?? '');

$errors = [];

if ($name === '') $errors[] = 'Nama wajib diisi.';
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Email tidak valid.';
if ($phone === '') {
    $errors[] = 'Telepon wajib diisi.';
} elseif (!ctype_digit($phone)) {
    $errors[] = 'Nomor telepon hanya boleh angka.';
}

if (!empty($errors)) {
    $_SESSION['flash'] = implode(' ', $errors);
    header('Location: add.php');
    exit();
}
add_contact($name, $email, $phone, $asal, $catatan);

header('Location: index.php');
exit();
