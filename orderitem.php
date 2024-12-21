<?php

include('dbconnection.php');
if(isset($_POST['Submit'])) {

    $orderId = $_POST['orderId'];
    $customerId = $_POST['customerId'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    


    $query = mysqli_query($con, "insert into orderItem(orderId, customerId, quantity, price) Values('$orderId', '$customerId','$quantity',$price)");

    if($query){
        echo "<script>alert('data inserted successfully')</script>";
    }else{
        echo "<script>alert('there is an error')</script>";
    }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>orderItem</title>
</head>
<body>
<section class="contact" id="contact">
            <div style="margin:5px auto">
        <form action="orderItem.php" method="POST">
         <label for="order_Id">order_Id:</label>
        <input type="text" Name="order_Id"/>
            <br /> <br />
            <label for="customerId">user_Id:</label>
            <input type="text" Name="customerId">
            <br><br>
             
            <label for="quantity">quantity:</label>
            <input type="number" Name="quantity"><br><br>
             
            <label for="price">price:</label>
            <input type="text" Name="price"><br><br>

            <button type="submit" name="Submit">Submit</button>
            
        </form>
    </div>
          </section>
</body>
</html>