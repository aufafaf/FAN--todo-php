<?php
session_start();
require_once 'config/database.php';

// Ambil semua tasks
$sql = "SELECT * FROM tasks ORDER BY created_at DESC";
$stmt = $pdo->query($sql);
$tasks = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>My To-Do List</h1>
        
        <!-- Flash Message -->
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert success">
                <?= htmlspecialchars($_SESSION['success']) ?>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
        
        <!-- Form Tambah -->
        <form method="POST" action="add.php">
            <input type="text" name="title" placeholder="Task title" required>
            <textarea name="description" placeholder="Description"></textarea>
            <button type="submit">Add Task</button>
        </form>
        
        <!-- List Tasks -->
        <div class="tasks">
            <?php foreach ($tasks as $task): ?>
                <div class="task <?= $task['is_completed'] ? 'completed' : '' ?>">
                    <h3><?= htmlspecialchars($task['title']) ?></h3>
                    <p><?= htmlspecialchars($task['description']) ?></p>
                    <div class="actions">
                        <a href="toggle.php?id=<?= $task['id'] ?>">
                            <?= $task['is_completed'] ? 'Undo' : 'Complete' ?>
                        </a>
                        <a href="edit.php?id=<?= $task['id'] ?>">Edit</a>
                        <a href="delete.php?id=<?= $task['id'] ?>" 
                           onclick="return confirm('Yakin hapus?')">Delete</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>