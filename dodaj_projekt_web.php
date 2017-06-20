<?php
include_once 'session.php';
include_once 'database.php';
include_once 'header.php';
?>
    <body>
    <table>
        <form action="dodaj_projekt.php" method="post">
            <tr><td>Vpišite naslov projekta :</td>
                <td><input type="text" name="title"  size="26" /> </td>
            </tr>
            <tr><td>Okvirna cena: </td><td><input type="text" name="okvirna_cena" size="26"/> </td></tr>
            <tr><td>Deadline cena: </td><td><input type="text" name="deadline_cena" size="26"/></td></tr>
            <tr><td>Datum:</td><td><input type="datetime-local" name="end_date" ></td></tr>
            <tr><td>Opišite projekt: </td><td><textarea name="description" cols="32" rows="5"></textarea></td></tr>
                                 <tr><td><input  type="submit" value="Shrani" size="26"></td></tr>
        </form>
    </table><br>
    </body>
<?php
    include_once 'footer.php';
?>
