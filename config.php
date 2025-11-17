<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('DATA_FILE', __DIR__ . '/data/contacts.json');

$USERS = [
    "friskila" => "1234"
];

if (!file_exists(DATA_FILE)) {
    if (!is_dir(dirname(DATA_FILE))) {
        mkdir(dirname(DATA_FILE), 0755, true);
    }
    file_put_contents(DATA_FILE, json_encode([], JSON_PRETTY_PRINT));
}
