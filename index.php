<?php 
    //session_start();
    include 'header.php';
    
    if (isset($_SESSION['user_id'])) {
        //je prijavljen
        echo $_SESSION["email"];
    }
    else {
        echo 'Nisi prijavljen!';
    }
   
?>

<h1>Obrazec</h1>

<form action="users.php" method="POST">
    Ime: <input type="text" name="ime99" /><br/><br/>
    <input type="submit" value="Pošlji" />
</form>
<br/>
        
<?php 
    include 'footer.php';
?>