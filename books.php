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
    <div class="container-fluid">
    <header>
     
    <div class="Container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"> <img src="imags/logo.jpg" style = "height: 50px; weight: 50px;" ></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" 
  id="navbarSupportedContent">
 <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link active"
        aria-current="page"
         href="index.php">Store</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"
           href="#">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"
           href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"
           href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"
           href="signup.php">signUp</a>
      </li>
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
   
  </div>
</nav>
</header>

  <div class="container">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
     
    </div>
    <div class="carousel-item">
      <img src="image/logo.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
    <img src="image/logo.jpg" style = "height: 100px; weight: 100px;" >
      </div>
  </div>
 <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
</div>
</div>
          
<div class="grid-container">
            <div class="main">
              
            <span style="float:left;">
            <?php if (isset($_GET['alert'])){ ?>
                    <h3> order Success, Thank You.</h3>
            <?php } ?>
        </span>
            <?php
            while($row = mysqli_fetch_assoc($result))
          {?>
            
         <div class="item">
         <td><img src="<?php echo $row['image']; ?>" alt="Book Image" width="100"></td>
         
        <h5> Title :<?php echo $row['title']; ?></h5>
        <h5> Author :<?php echo $row ['author']; ?></h5>
        <h5> Price : <?php echo $row ['price']; ?></h5>
      
                        <form action="orders.php?form=orderForm" method="POST">
                             <input type="number" name="userid" value="<?php echo $_SESSION['userid']; ?>" hidden>
                            <input type="number"name="qty" class="form-control" placeholder="Qty" required>
                            <br>
                            <input type="submit"name="order_btn" value="order">
          </div>
    <?php }?>
    </div>
    </div>

</div>
</body>
</html>