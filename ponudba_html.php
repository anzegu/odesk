<?php
include_once 'session.php';
include_once 'database.php';
?>

    <?php
    include_once 'header.php';
?>

    <body>

    <body>
        <form action="ponudba.php" method="post">
             
            Cena: <input type="text" name="cena" /> </br>
            Opis <input type="text" name="opis" /> </br>
              
                                 <input  type="submit" value="Shrani" >
             
        </form>
    </body>
    <?php
    include_once 'footer.php';
?>
</html>