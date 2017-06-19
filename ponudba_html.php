<?php
include_once 'session.php';
include_once 'database.php';
include_once 'header.php';
?>
<?php
$project_id = $_GET['pid'];
?>
    <body>
        <form action="ponudba.php" method="post">
             
            Cena: <input type="text" name="cena" /> </br>
            Opis <input type="text" name="opis" /> </br>
              
                                 <input  type="submit" value="Shrani" >
                                 <input type="reset" value="Prekliči">
             
        </form>
    </body>
    <?php
    include_once 'footer.php';
?>
</html>