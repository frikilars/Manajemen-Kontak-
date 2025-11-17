<?php
require_once 'config.php';

function require_login() {
    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit();
    }
}

function sanitize($v) {
    return trim(htmlspecialchars((string)$v, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'));
}

function read_contacts() {
    $json = @file_get_contents(DATA_FILE);
    $data = json_decode($json, true);
    if (!is_array($data)) return [];
    return $data;
}

function save_contacts(array $contacts) {
    file_put_contents(DATA_FILE, json_encode(array_values($contacts), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function add_contact($name, $email, $phone, $asal = '', $catatan = '') {
    $contacts = read_contacts();
    $contacts[] = [
        'id' => uniqid('', true),
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'asal' => $asal,
        'catatan' => $catatan
    ];
    save_contacts($contacts);
}

function get_contact($id) {
    $contacts = read_contacts();
    foreach ($contacts as $c) {
        if ((string)$c['id'] === (string)$id) return $c;
    }
    return null;
}

function update_contact($id, $name, $email, $phone, $asal = '', $catatan = '') {
    $contacts = read_contacts();
    foreach ($contacts as &$c) {
        if ((string)$c['id'] === (string)$id) {
            $c['name'] = $name;
            $c['email'] = $email;
            $c['phone'] = $phone;
            $c['asal'] = $asal;
            $c['catatan'] = $catatan;
            break;
        }
    }
    save_contacts($contacts);
}

function delete_contact($id) {
    $contacts = read_contacts();
    $contacts = array_filter($contacts, function($c) use ($id) {
        return (string)$c['id'] !== (string)$id;
    });
    save_contacts($contacts);
}
