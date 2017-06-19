<?php
include_once 'header.php';
include_once 'database.php';
?>
<table>
    <form action="user_insert.php" method="POST" onsubmit="return validateForm()">
        <tr><td><label id="first_name">Ime</label></td>
        <td><input type="text" name="first_name" required="required" /></td></tr><br />
        <tr><td><label id="last_name">Priimek</label></td>
        <td><input type="text" name="last_name" required="required" /></td></tr><br />
        <tr><td><label id="email">e-pošta</label></td>
        <td><input type="email" name="email" required="required" /></td></tr><br />
        <tr><td><label id="pass">Geslo</label></td>
        <td><input type="password" name="pass" required="required" /></td></tr><br />
        <tr><td><label id="pass2">Geslo</label></td>
        <td><input type="password" name="pass2" required="required" /></td></tr><br />
        <div id="passErr"></div>
        <tr><td></td><td><select name="country_id">        
            <?php
            $query = "SELECT * FROM countries";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo '<option value="' . $row['id'] . '">' . $row['title'] . '</option>';
            }
            ?>
        </select></td></tr><br />
        <tr><td><input type="submit" value="Registriraj" /></td></tr>
    </form>
</table>

<?php
include_once 'footer.php';
?>