<?php
    include "functions.php";
    
    $email_addr=$_GET['email'];
    $email = new email();
    $email->setData($email_addr);
    $email->populateTables();
?>