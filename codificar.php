<?php
header('Content-Type: application/json; charset=utf-8');

$kid_hex = trim($_GET['kid'] ?? '');
$key_hex = trim($_GET['key'] ?? '');

$kid_bin = hex2bin($kid_hex);
$key_bin = hex2bin($key_hex);

$kid_b64 = rtrim(strtr(base64_encode($kid_bin), '+/', '-_'), '=');
$key_b64 = rtrim(strtr(base64_encode($key_bin), '+/', '-_'), '=');

$output = [
    'keys' => [
        [
            'kty' => 'oct',
            'k'   => $key_b64,
            'kid' => $kid_b64
        ]
    ],
    'type' => 'temporary'
];

echo json_encode($output, JSON_UNESCAPED_SLASHES);