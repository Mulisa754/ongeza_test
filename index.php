<?php
    include ('includes/ongeza.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--bootstrap link-->
    <link rel="stylesheet" href="bootstrap-4.4.1/css/bootstrap.css" >
    <!--Data tables!-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <!--custom css-->
    <link rel="stylesheet" href="custom-css/style.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>ONGEZA TEST</title>
</head>
<body>
<?php include('includes/navbar.php') ?>
<div class="row">
    <div class="container">
        <div class="col-lg-8 col-sm-12 col-md-12">
            <div class="message2 mt-3 mb-lg-n4"></div>
            <div class="card mt-5">
                <div class="card-header bg-info" style="color: #ffffff; font-size:15px; font-weight: bold;">
                    REGISTERED CUSTOMER DETAILS
                    <a href="customer/customer.php?chcke=1" class="btn btn-success ml-auto float-right ">Add New Customer</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-stripped" id="customer">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>FIRST NAME</th>
                                <th>LAST NAME</th>
                                <th>TOWN NAME</th>
                                <th>GENDER</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody id="customer-details"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--bootstrap modal for updating customer details-->
<div class="modal" id="update-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info text-light">
                <div class="title">UPDATE CUSTOMER DETAILS</div>

            </div>
            <div class="modal-body">
                <div class="message"></div>
                <form id="form-update" method="POST">
                    <div class="form-group">
                        <label><strong>First Name:</strong></label>
                        <input type="text" class="form-control inputtext-style" id="updatefname">
                        <small class="fnameerror"></small>
                    </div>
                    <div class="form-group">
                        <label><strong>Last Name:</strong></label>
                        <input type="text" class="form-control inputtext-style" id="updatelname">
                        <small class="lnameerror"></small>
                    </div>
                    <div class="form-group">
                        <label><strong>Town Name:</strong></label>
                        <input type="text" class="form-control inputtext-style" id="updatetname">
                        <small class="tnameerror"></small>
                        <input type="hidden" id="customerid" name="customerid">
                    </div>
                    <div class="form-group">
                        <label><strong>Gender:</strong></label>
                        <select class="form-control inputtext-style"  style="box-shadow: none;">
                            <option id="updategender" class="updategenders"></option>
                            <?php ongeza::getGender($db); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="updatebtn btn btn-info btn-md ml-auto float-right">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--custom scrip-->
<script src="custom-script/custom-sript.js"></script>
<!--JavaScript plugins CDN-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
