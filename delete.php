<?php
session_start();
require_once 'config/database.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    try {
        $sql = "DELETE FROM tasks WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        
        $_SESSION['success'] = "Task berhasil dihapus!";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Gagal menghapus task";
    }
}

header('Location: index.php');
exit();
?>