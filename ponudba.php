<?php
include_once 'session.php';
include_once 'database.php';
?>
<?php
$user=$_SESSION['user_id'];
$cena = $_POST['cena'];
$opis = $_POST['opis'];



    $query =  sprintf("INSERT INTO  Ponudbe (user_id, cena, opis) VALUES ($user,'%s','%s')",
        
        mysqli_real_escape_string($link, $cena),
        mysqli_real_escape_string($link, $opis));

            
        $result = mysqli_query($link, $query); 
        echo $result;
        
      
        header("Location: projects.php");
?>
</html>
