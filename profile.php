<?php
    include_once 'header.php';
    include_once 'database.php';
    
    //shrani si id trenutno prijavljenega uporabnika
    $user_id = $_SESSION['user_id'];
    
    $query = "SELECT * FROM users WHERE id =$user_id";
    $result = mysqli_query($link, $query);
    $user = mysqli_fetch_array($result);
?>

    <form action="profile_update.php" method="POST" enctype="multipart/form-data">
<table>    
        <tr><td>Ime: </td><td><input type="text" name="first_name" value="<?php echo $user['first_name']; ?>" /></td></tr><br />
        <tr><td>Priimek: </td><td><input type="text" name="last_name" value="<?php echo $user['last_name']; ?>" /></td></tr><br />
        <tr><td>Država: </td><td><select name="country_id">        
            <?php 
                $query = "SELECT * FROM countries";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['id'] == $user['country_id']) {
                        echo '<option value="'.$row['id'].'" selected="selected">'.$row['title'].'</option>';
                    }
                    else {
                        echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                    }
                    
                }
            ?>
        </select></td></tr><br />
        <tr>
            <td>
                <?php
                    if (!empty($user['avatar'])) {
                        echo '<img src="'.$user['avatar'].'" alt="Avatar" height="100px" />';
                    }
                    else {
                        echo '<img src="slike/no.jpg" alt="Ni slike" height="100px" />';
                    }
                ?>
            </td>
        </tr>
</table>
        <table>
        <tr><td><input type="file" name="fileToUpload" /></td></tr><br />
        <tr><td><input type="submit" name="submit" value="Posodobi" /></td></tr>
        </table>
    </form>
<br />
<hr />
<h2>Opis</h2>
<form action="description_update.php" method="POST">
    <textarea name="description" cols="25" rows="5"><?php echo $user['description'];?></textarea><br />
    <input type="submit" name="submit" value="Posodobi" />
</form>
<br />
<hr />
<h2>Veščine</h2>
<div class="center">
<form action="skills_profile_update.php" method="POST">    
    <?php 
        //zapomnim si trenute veščine, ki jih ima
        $query = "SELECT * FROM skills_users WHERE user_id=$user_id";
        $result = mysqli_query($link, $query);
        //naredim prazno tabelo
        $skills = array();
        while($row = mysqli_fetch_array($result)) {
            //napolnim tabelo z veščinami, ki jih obvladam :)
            $skills[] = $row['skill_id'];
        }    
        $query = "SELECT * FROM skills";
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_array($result)) {
            if (in_array($row['id'], $skills)) {
                echo '<input type="checkbox" 
                        name=skills[] value="'.$row['id'].'" checked="checked" />'.$row['title'];
            }
            else {
                echo '<input type="checkbox" 
                        name=skills[] value="'.$row['id'].'" />'.$row['title'];
            }
            echo '<br />';
        }
        
    ?>
    <input type="submit" value="Posodobi" />
</form>
    <h2>Dokumenti</h2>
    
<table>
    <form action="document_insert.php" method="POST" enctype="multipart/form-data">
        <tr><td>Naslov: </td><td><input type="text" name="title" /></td></tr><br />
        <tr><td>Opis: </td><td><textarea name="description" cols="15" rows="5"></textarea></td></tr><br />
        <tr><td>Datoteka: </td><td><input type="file" name="fileToUpload" /></td></tr><br />
        <tr><td></td><td><input type="submit" name="submit" value="Naloži" /></td></tr>
    </form>
</table>
<br />
<hr />
    <?php 
        if($user['admin'] == 1){
    ?>
        <h2>Dodaj novo Veščino</h2>
        <form action="skill_insert.php" method="POST">
            Ime: <input type="text" name="title"  /><br />
            Opis: <textarea name="description" cols="15" rows="5" placeholder="Vnesi pobrobni opis veščine"></textarea><br />
            <input type="submit" value="Vnesi" name="admin_skill_add" /> 
            <input type="reset" value="Prekliči" />
        </form>
    <?php } ?>
</div>
<?php
include_once 'footer.php';
?>