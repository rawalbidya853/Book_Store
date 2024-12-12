<?php
require_once 'dbconnection.php';
$query = "select * from books";
$result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
 <style>
        .main{
            margin: 50px;
            display: grid;
            grid-template-columns: repeat(4,1fr);
            gap: 20px;
        }
        .item{
             
            height:auto;
            margin: 25px;
            padding: 10px;
            border: 1px solid #1316134f;
            font-size: 28px;
        }

        </style>

        <body>

           <div class="grid-container">
            <input type="text" name="searchBook" placeholder="Search Book">
            <div class="main">

            <?php
            while($row = mysqli_fetch_assoc($result))
          {?>
            
         <div class="item">
        <h5> Title :<?php echo $row['title']; ?></h5>
        <h5> Author :<?php echo $row ['author']; ?></h5>
        <h5> Price : <?php echo $row ['price']; ?></h5>
        <a href="#" class="btn btn-primary" style="margin-top:25px;"> Book</a>
          </div>
    <?php }?>
    </div>
    </div>

</div>
</body>
</html>