<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include 'dbconection.php';
if (isset($_GET['book_id'])) {
    $user_id = $_SESSION['user_id'];
    $book_id = $_GET['book_id'];

    $sql = "INSERT INTO cart (user_id, book_id, quantity) VALUES ('$user_id', '$book_id', 1)";
    if ($conn->query($sql)) {
        echo "Book added to cart!";
    } else {
        echo "Error: " . $conn->error;
     }
    } ?> 