<?php
$host_name = 'db5018464601.hosting-data.io';
$database = 'dbs14674062';
$user_name = 'dbu715892';
$password = 'Dg7KPFr8xTpmZyU$qkr8';

try {
    $pdo = new PDO("mysql:host=$host_name;dbname=$database;charset=utf8", $user_name, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>