<?php

define('HOST', 'localhost');
define('NAME', 'root');
define('PASS', '');
define('DB', 'phpcrud');

$conn = new mysqli(HOST, NAME, PASS, DB);

if ($conn->connect_error) {
    die('Connection failed' . $conn->connect_error);
}
