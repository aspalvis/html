<?php
    include "config.php";

    $connection = mysqli_connect(
        $config['db']['server'],
        $config['db']['username'],
        $config['db']['password'],
        $config['db']['name']
    );
    if ($connection == false) {
        echo 'No connection to the Data Base!';
        echo mysqli_connect_error();
        exit();
    };
?>