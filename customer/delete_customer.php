<?php
    include('../includes/ongeza.php');
    //page that delete customer details
    if ($_GET['customer_id']){
        ongeza::deleteCustomer($db);
    }else{
        echo 'error counted while submitting your form';
    }

?>