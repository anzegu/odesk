<?php
include_once 'session.php';
include_once 'database.php';
include_once 'header.php';
?>
<?php

$_SESSION['project_id'] = $_GET['pid'];
?>
    <body>
        <table>
        <form action="ponudba.php" method="post">
             
            <tr><td>Cena:</td> <td><input type="text" name="cena" /> </br></td></tr>
        <tr><td>Opis:</td><td> <input type="text" name="opis" /> </br></td></tr>
              
                                <tr><td> <input  type="submit" value="Shrani" ></td>
                              <td>   <input type="reset" value="Prekliči"></td></tr>
             
        </form>
        </table>
    </body>
    <?php
    include_once 'footer.php';
?>
</html>