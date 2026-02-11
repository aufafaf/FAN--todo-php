<?php
session_start();
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    
    // Validation
    if (empty($title)) {
        $_SESSION['error'] = "Title tidak boleh kosong";
        header('Location: index.php');
        exit();
    }
    
    // Insert
    try {
        $sql = "INSERT INTO tasks (title, description) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$title, $description]);
        
        $_SESSION['success'] = "Task berhasil ditambahkan!";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Gagal menambahkan task";
    }
    
    header('Location: index.php');
    exit();
}
?>