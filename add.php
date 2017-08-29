<?php
$pdo = new PDO("mysql:host=localhost;dbname=lesson4.3;charset=utf8", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
session_start();