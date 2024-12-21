<?php
require_once 'dbconnection.php';

$query = "select *from orders";
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
                        <th>customerID</th>
                        <th>orderDate</th>
                        <th>quantity</th>
                        <th>totalAmount</th>
                    </tr>
                    <!-- Embedding PHP into HTML -->
                    <?php while ($records = mysqli_fetch_assoc($exe_query)) { ?>

                        <tr>
                            <td><?php echo $records['customerId']; ?></td>
                            <td><?php echo $records['orderDate']; ?></td>
                            <td><?php echo $records['quantity']; ?></td>
                            <td><?php echo $records['totalAmount']; ?></td>
                            <td><a href="" class="user_edit_btn bi bi-pencil-square" data-toggle="modal" data-target="#exampleModal"></a> | <a href="#" class="user_delete_btn bi bi-trash" style="color:red;"></a> </td>
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
    <label>customerID</label>
    <input type="text" id="customerID" name="customerID" class="form-control">
</div>
<div class="form-group">
    <label>orderDate</label>
    <input type="text" id="orderDate" name="orderDate" class="form-control">
</div>

<div class="form-group">
    <label>quantity</label>
    <input type="number" id="quantity" name="quantity" class="form-control">
</div>
<div class="form-group">
    <label>totalAmount</label>
    <input type="text" id="totalAmount" name="totalAmount" class="form-control">
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

<script>
    $(document).ready(function() {
      $('.user_edit_btn').click(function() {
            var row = $(this).closest('tr');


            $('#userid').val(row.find('td:eq(0)').text());
            $('#fname').val(row.find('td:eq(1)').text());
            $('#email').val(row.find('td:eq(2)').text());
            $('#contact').val(row.find('td:eq(3)').text());
            $('#address').val(row.find('td:eq(4)').text());


        });

        $('#user_edit_submit_btn').click(function() {

            var userid = document.getElementById('userid').value;
            var fname = document.getElementById('fname').value;
            var email = document.getElementById('email').value;
            var contact = document.getElementById('contact').value;
            var address = document.getElementById('address').value;
            $.ajax({
                type: "POST",
                url: "action.php?form=edit_user_form",
                data: {
                    userid: userid,
                    fname: fname,
                    email: email,
                    contact: contact,
                    address: address
                },
                cache: false,
                success: function(response) {

                    if (response) {

                        document.getElementById('message').innerHTML = 'User Details update';
                        document.getElementById('message').style.color = 'green';
                    // setTimeout method is used to execute on your time.
                        setTimeout(() => {
                          location.reload();
                        }, 3000);

                    }

                }
            });

        });

        // For Delete Query

        $('.user_delete_btn').click(function() {
            var row = $(this).closest('tr');


            var userid = row.find('td:eq(0)').text();


            $.ajax({
                type: "POST",
                url: "action.php?form=delete_user_form",
                data: {
                    userid: userid
                  },
                cache: false,
                success: function(response) {

                    if (response) {

                        document.getElementById('msg').innerHTML = 'User Details Delete';
                        document.getElementById('msg').style.color = 'red';

                        setTimeout(() => {

                            location.reload();
                        }, 3000);

                    }

                }
            });

        });

    });
</script>