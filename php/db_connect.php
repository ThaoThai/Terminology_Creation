<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=terminology_creation', 'root', 'poker');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $error = $e->getMessage();
}