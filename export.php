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

$stmt = $pdo->prepare('SELECT * FROM utenti');
$stmt->execute();

$fo = fopen('utenti.csv', 'w');
$user = array('ID', 'user', 'Email', 'password');
// fputcsv($fo, $user);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($fo, $row);
}
fclose($fo);
