<?php
include_once 'session.php';
include_once 'database.php';
?>

    <?php
    include_once 'header.php';
?>

    <body>

    <body>
        <form action="dodaj_projekt.php" method="post">
            Vpišite naslov projekta <br>
                <input type="text" name="title" /> </br>
            <input type="datetime-local" name="end_date"><br>
            Opišite projekt <input type="text" name="description" /> </br>
            Okvirna cena: <input type="text" name="okvirna_cena" /> </br>
            Deadline cena: <input type="text" name="deadline_cena" /> </br>
            

                 </select>

              
                                 <input  type="submit" value="Shrani" >
             
        </form>
    </body>
    <?php
    include_once 'footer.php';
?>
</html>