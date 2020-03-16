<?php
    //page that get information for a selected customer
    include('../includes/ongeza.php');
    if (isset($_GET['id'])){
        ongeza::customerDetails($db);
    }
?>
