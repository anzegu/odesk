<?php
    $db_user = 'root';
    $db_pass = '';
    $db_host = 'localhost';
    $db_name = 'odesk';
    
    $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    mysqli_query($link,"SET NAMES 'utf8");
    
    //soljenje gesla
    $salt = '93487gh59874ldsk439875';
?>