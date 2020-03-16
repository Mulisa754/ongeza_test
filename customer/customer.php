<?php
include('../includes/ongeza.php')
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--bootstrap link-->
    <link rel="stylesheet" href="../bootstrap-4.4.1/css/bootstrap.css" >
    <!--Data tables!-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <!--custom css-->
    <link rel="stylesheet" href="../custom-css/style.css">
    <title> REGISTER CUSTOMER | ONGEZA TEST</title>
</head>
<body>
<?php include('../includes/navbar.php') ?>
<div class="row">
    <div class="container">
        <div class="col-lg-4 col-sm-12 col-md-12">
            <div class="card mt-5">
                <div class="card-header bg-info text-light" style="font-weight: bold; font-size: 15px;">
                    CUSTOMER REGISTRATION FORM
                </div>
                <div class="card-body">
                    <div class="message"></div>
                    <form name="customer-form" id="customer-form" method="POST" onsubmit="return validateText()">
                        <div class="form-group">
                            <div class="input-group-prepend" >
                                <label class="input-group-text" id="prependstyle">First Name</label>
                                <input type="text" class="form-control inputtext-style" id="fname" placeholder="Enter First Name" style="box-shadow: none;">
                            </div>
                            <small class="fnameerror"></small>
                        </div>
                        <div class="form-group">
                            <div class="input-group-prepend" >
                                <label class="input-group-text" id="prependstyle">Last Name</label>
                                <input type="text" class="form-control inputtext-style" id="lname" placeholder="Enter Last Name" style="box-shadow: none;">
                            </div>
                            <small class="lnameerror"></small>
                        </div>
                        <div class="form-group">
                            <div class="input-group-prepend" >
                                <label class="input-group-text" id="prependstyle">Town Name</label>
                                <input type="text" class="form-control inputtext-style" id="tname" placeholder="Enter Town Name" style="box-shadow: none;">
                            </div>
                            <small class="tnameerror"></small>
                        </div>
                        <div class="form-group">
                            <div class="input-group-prepend" >
                                <label class="input-group-text" id="prependstyle">Gender</label>
                                    <select class="form-control inputtext-style"  id="gender" style="box-shadow: none;">
                                        <option></option>
                                        <?php ongeza::getGender($db); ?>
                                    </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="customerbtn btn btn-outline-info btn-md ml-auto float-lg-right" style="box-shadow: none">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--JavaScript plugins CDN-->
<script src="../custom-script/custom-sript.js"></script>
<!--JavaScript plugins CDN-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>