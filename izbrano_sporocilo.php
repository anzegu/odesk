<?php 
    //session_start();
    include 'header.php';
    if (isset($_SESSION['user_id'])) {
        //je prijavljen
        echo '<form action="sporocila_u.php" method="post" enctype="multipart/form-data" style="margin: 0 25% 0 25%;" id="s_u">
    <small>Naslovnik</small> <br>';
        if(isset($_GET['email'])){ 
            echo '<input type="email" name="tuser" maxlength="200" required value="'.$_GET['email'].'"/> <br>';
        }
        else {   echo '<select id="s_u" name="id">';
        $query=  mysqli_query($link, "select id, first_name, last_name from users");
        while ($row = mysqli_fetch_array($query)) {
            $id = $row['id'];
            $fn = $row['first_name'];
            $ln = $row['last_name'];
            echo "<option value='$id'>$fn&nbsp;$ln</option>";
        }
        echo '</select><br>'; 
        }
    echo '<small>Zadeva</small> <br> '; 
    if(isset($_GET['subject'])){
    echo '<input type="text" name="subject" maxlength="100" required value="'.$_GET['subject'].'"/> <br><br>';}
    else{
        echo '<input type="text" name="subject" maxlength="100" required/> <br><br>';
    }
    echo '<textarea form_id="s_u.php" name="content" required style="width: 600px; height: 200px;"></textarea> <br>
    <input type="file" name="file" /> <br>


<button type="submit" name="btn-upload">Upload</button>
</form>
';
    }
    else {
        echo 'Nisi prijavljen!';
    }
   include 'footer.php';

