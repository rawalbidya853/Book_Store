
<?php
include "dbconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];

    $target_dir = "uploads/img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true); // Create the directory if it doesn't exist
    }

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO books (title, author, price, image) VALUES ('$title', '$author', '$price', '$target_file')";
        if ($conn->query($sql) === TRUE) {
            echo "Book added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Failed to upload image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Book</title>
</head>
<body>
    <h1>Add a New Book</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>Book Title:</label>
        <input type="text" name="title" required><br><br>
        <label>Author:</label>
        <input type="text" name="author" required><br><br>
        <label>Price:</label>
        <input type="text" name="price" required><br><br>
        <label>Book Image:</label>
        <input type="file" name="image" required><br><br>
        <button type="submit">Add Book</button>
    </form>
</body>
</html>