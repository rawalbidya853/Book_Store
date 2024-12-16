<?php
include('dbconnection.php');
if(isset($_POST['add_book_btn'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    

    $query = mysqli_query($conn, "Insert into books(Title, Author, Price) Values ('$title', '$author', '$price')");
    if($query){
        echo "<script>alert('data inserted successfully')</script>";
    } else {
        echo "<script>alert('there is an error')</script>";

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data to Db using PHP</title>
</head>
<body>
       <div style="margin: 5px auto">
        <form method="POST" enctype="multipart/form-data">

            <input type = "file" name = 'image'><br><br>
            <input type="title" name="title" placeholder="Enter title" >
            <br/> <br>
            
            <input type="author" name="author" placeholder="Enter author">
            <br/> <br>
            
            <input type="price" name="price" placeholder="Enter price" >
            <br/> <br>
            <button type="submit" name="add_book_btn" >Submit</button>
       </form>
   </div> 
</body>
</html>





