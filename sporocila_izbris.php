<?php
    include_once 'session.php';
    include_once 'database.php';
    
    if (isset($_SESSION['user_id'])) {
        $mid = $_GET['mid'];
        
        if(isset($_GET['fid'])){        
        $result=mysqli_query($link, "delete from files where (id=".$_GET['fid'].")");       
        }
        
        $result=mysqli_query($link, "delete from messages where id=$mid");
        
        
        }
        else {
        echo 'Nisi prijavljen!';
    }
     
header("Location: sporocila_prva.php"); die();
?>