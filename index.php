<?php
echo "Todo App jalan\n";
echo "halo";

// String
$task = "Belajar PHP";
$name = "John";

// Array dari form
$_POST['title'];      // Data dari form method POST
$_GET['id'];          // Data dari URL ?id=5
$_SESSION['message']; // Data yang disimpan di session

// Contoh real:
$title = $_POST['title'];  // Ambil input dari form
$id = $_GET['id'];         // Ambil ID dari URL