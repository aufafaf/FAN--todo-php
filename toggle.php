<?php
session_start();
require_once 'config/database.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    try {
        $sql = "UPDATE tasks SET is_completed = NOT is_completed WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        
        $_SESSION['success'] = "Status task berhasil diubah!";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Gagal mengubah status";
    }
}

header('Location: index.php');
exit();
?>