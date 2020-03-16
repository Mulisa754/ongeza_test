<?php
//page that update customer details
    include('../includes/ongeza.php');
    if(isset($_POST['id'])){
        ongeza::updateCustomer($db);
    }else{
        echo 'error counted while processing your form';
    }

?>