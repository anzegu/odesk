<?php
 include_once 'database.php';
  include_once 'session.php';
if(isset($_POST['btn-upload']))
{    
    $email=$_POST['tuser']; 
    $subject=$_POST['subject'];
    $content=$_POST['content'];
    $id=$_POST['id'];
    
    if(isset($_POST['id'])){
        $query = sprintf("INSERT INTO messages(tuser_id, fuser_id, subject, content) VALUES
                        (".$id.",".$_SESSION['user_id'].",
                            '".$subject."', '".$content."')");
    }else{ 
    $query = sprintf("INSERT INTO messages(tuser_id, fuser_id, subject, content) VALUES
                        ((select id from users where email='".$email."'),
                         ".$_SESSION['user_id'].",
                            '".$subject."', '".$content."')");
    }
        
        //preverimo uspešnost
        mysqli_query($link, $query);
        
        $message_id = mysqli_insert_id($link);
        
        $file = rand(1000,100000)."-".$_FILES['file']['name'];
        $file_loc = $_FILES['file']['tmp_name'];
        $folder="messages/";
        
        if($_FILES['file']['size']!=0){
            move_uploaded_file($file_loc,$folder.$file);
            $sql="INSERT INTO files(message_id, file) VALUES($message_id, '$folder$file')";
            mysqli_query($link, $sql); 
        }
}
header("Location: sporocila_prva.php"); die();