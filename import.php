<?php
$host = 'localhost';
$db = 'utenti_u4w5d1';
$user = 'root';
$pass = '';
$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);

$fo = fopen('utenti.csv', 'r');



while (($data = fgetcsv($fo, 1000, ",")) !== FALSE) {
    $username = $data[1];
    $email = $data[2];
    $password = $data[3];


    $query = "INSERT INTO utenti ( username, Email, password) VALUES ( :username, :email, :password)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([

        ':username' => $username,
        ':email' => $email,
        ':password' => $password
    ]);
}
fclose($fo);
