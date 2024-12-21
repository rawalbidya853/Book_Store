<?php
session_start();
require_once 'dbconnection.php';
if (isset($_POST['btn_user_form']) && $_GET['form'] == 'add_user') {

    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $query = "insert into users(fname ,email ,password ,contact,address)values('$fname','$email','$password',$contact ,'$address')";

    // mysqli_query() is a PHP method used run the sql query on php.

    if (mysqli_query($conn, $query)) {

        echo "user Created";

        // To redirect header('location: locationName');

        header("location:index.php?alert=success");
    }
}


//   This is for edit user
if(isset($_GET['form']) && $_GET['form']=='edit_user_form'){

    // unpacking the Data from the post method
    $userid = $_POST['userid'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

 $update_user = "update users set fname = '$fname' , email = '$email' , contact = '$contact' , address = '$address' where userid = '$userid'";

 print_r($update_user);
 die();
 if(mysqli_query($conn ,$update_user)){

    echo json_encode(array('statusCode'=>'200'));
 }

}

//   This is for Delete user
if(isset($_GET['form']) && $_GET['form']=='delete_user_form'){

    // unpacking the Data from the post method
    $userid = $_POST['userid'];


 $delete_user = "delete from users where userid = '$userid'";

 if(mysqli_query($connect ,$delete_user)){

    echo json_encode(array('statusCode'=>'200'));
 }

}

// loginForm

if(isset($_GET['form']) && $_GET['form']=='loginForm'){

$email = $_POST['email'];
$password = $_POST['password'];
$query = "select * from users where email = '$email' AND password = '$password'";

$sql = mysqli_query($connect , $query);
if($sql->num_rows != 0){
$getUserDetails=mysqli_fetch_assoc($sql); //Getting User Details from User's table

  $_SESSION['userid']=$getUserDetails['userid'];
  
    header("location: books.php?alert=success");
    die();
}
echo "invalid User's";
header("location: login.php?alert=error");
die();


}


if(isset($_GET['form']) && $_GET['form']=='orderForm'){

 $cid = $_POST['userid'];
 $qty  = $_POST['qty'];
 $price = $_POST['price'];

 $amt = $qty * $price;
$query = "insert into orders (customer_id,,total_amount) values ('$cid', '$amt')";

if(mysqli_query($connect , $query)){

    header("location:books.php?alert=success");
    
    die();
}else{ echo "<script> alert('Error on Operation , Please Try again Later.') </script>";
    header("location:books.php");
}

}