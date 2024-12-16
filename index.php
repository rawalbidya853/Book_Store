<?php
include 'dbconnection.php';
$sql = "SELECT * FROM books";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<div class='book'>";
    echo "<img src='image/img1.jpg" . $row['image'] . "image/imag1.jpg' alt='" . $row['title'] . "'>";
    echo "<h3>" . $row['title'] . "</h3>";
    echo "<p>Author: " . $row['author'] . "</p>";
    echo "<p>Price: $" . $row['price'] . "</p>";
    echo "<a href='cart.php?book_id=" . $row['id'] . "'>Add to Cart</a>";
    echo  "</div>";
}  ?>