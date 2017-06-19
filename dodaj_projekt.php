<?php

include_once 'database.php';

//print_r($_POST); die();
session_start();
$user=$_SESSION['user_id'];
$title = $_POST['title'];
$end_date = $_POST['end_date'];
$description = $_POST['description'];
$okvirna_cena = $_POST['okvirna_cena'];
$deadline_cena = $_POST['deadline_cena'];



    $query =  sprintf("INSERT INTO  projects (user_id, title, end_date, description, okvirna_cena, deadline_cena) VALUES ($user,'%s','%s','%s','%s','%s')",
        mysqli_real_escape_string($link, $title),
   
        mysqli_real_escape_string($link, $end_date),
        mysqli_real_escape_string($link, $description),
        mysqli_real_escape_string($link, $okvirna_cena),
        mysqli_real_escape_string($link, $deadline_cena));

            
        $result = mysqli_query($link, $query); 
        echo $result;
        
      
        header("Location: projects.php");
?>