<?php
require_once 'dbconnection.php';

$query = "select *from users";
// PHP mysqli_query()method is used to execute the query 
$exe_query = mysqli_query($conn, $query);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">


    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <!-- offset used here to take a margin from both side and it will stick into center   -->
        <div class="row">
            <div class="col-sm-10 offset-1">
            <span style="text-align:center;">
                    <?php if (isset($_GET['alert'])) {
                        if ($_GET['alert'] == 'success') {
                            echo "<h4 style=color:green; >" . "User Created Successfully" . "</h4>";
                        } else {
                            echo "Try Again";
                        }
                    } ?>
                </span>
                <legend style="text-align: center; margin-top:25px; margin-bottom: 25px;"> User's Details</legend>
                <span id="msg"> </span>
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        
                        
                    </tr>
                    <!-- Embedding PHP into HTML -->
                    <?php while ($records = mysqli_fetch_assoc($exe_query)) { ?>

                        <tr>
                            <td>1</td>
                            <td><?php echo $records['name']; ?></td>
                            <td><?php echo $records['email']; ?></td>
                            <td><?php echo $records['password']; ?></td>
                            
                            
                        </tr>
                    <?php  } ?>
                </table>

            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User's <span id="message"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form>

<input type="number" id="userid" name="userid" class="form-control" hidden>
<div class="form-group">
    <label>FullName</label>
    <input type="text" id="fname" name="fname" class="form-control">
</div>
<div class="form-group">
    <label>Email</label>
    <input type="text" id="email" name="email" class="form-control">
</div>
<!-- <div class="form-group">
    <label>Password</label>
    <input type="password" id ="password" name="password" class="form-control">
</div> -->
<div class="form-group">
    <label>Contact</label>
    <input type="number" id="contact" name="contact" class="form-control">
</div>
<div class="form-group">
    <label>Address</label>
    <input type="text" id="address" name="address" class="form-control">
</div>
</form>
                    <button id="user_edit_submit_btn" class="btn btn-primary" style="margin-left:40%">submit</button>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

</body>

</html>