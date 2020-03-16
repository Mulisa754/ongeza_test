<?php
    $db = new mysqli("localhost","root","","ongeza_test");
    if($db->connect_error){
        echo '<div class="alert alert-danger"><strong>CONNECTION ERROR</strong> Check you connection file!</div>';
    }
?>


