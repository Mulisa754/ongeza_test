<?php
//include class in this page in order to excute function that register customer
    include('../includes/ongeza.php');

    if(isset($_POST['fname'])){
        ongeza::registerCustomer($db);
    }else{
        sleep(1);
        echo 'Error cunted while submitting your form';
    }

?>