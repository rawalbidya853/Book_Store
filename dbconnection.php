<?php
  
  $conn = mysqli_connect("localhost", "root", "", "online_book_store");
  if($conn == false) {
    die("Connection Error".mysqli_connect_erro());
  }
?>