<?php
$host = 'localhost';
$db   = 'book_ecommerce';
$user = 'root';
$pass = 'password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    // This is to ensure that PDO will throw an exception if it encounters an error
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    // This is to ensure that PDO will return the correct data types
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    // This is to ensure that PDO will use the real prepared statements
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    // The "\" before the class name is to ensure that the class is in the global namespace
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

?>