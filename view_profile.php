<?php
    include_once 'header.php';
    include_once 'database.php';
    //dobi id iz linka
    $user_id = $_GET['id'];
    //dobi uporabnika iz baze
    $query = "SELECT * FROM users WHERE id =$user_id";
    $result = mysqli_query($link, $query);
    $user = mysqli_fetch_array($result);


?>

<table>    
        <tr><td>Ime: <?php echo $user['first_name']; ?></td></tr><br />
        <tr><td>Priimek: <?php echo $user['last_name']; ?></td></tr><br />
        <tr><td>Država: </td><td>      
            <?php 
                $query = "SELECT * FROM countries";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['id'] == $user['country_id']) {
                        echo $row['title'];
                    }
                }
            ?></td></tr><br />
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
<br />
<hr />
<h2>Ocena</h2>
<?php

echo '<form action="ocena_insert.php?user_id='.$user_id.'" method="post">';
echo '<input type="number" name="ocena" min="1" max="5">';
echo '<input type="submit" value="oceni">';
echo '</form>';
?>
<br>
    <?php 
        $query = "SELECT Avg(ocena) AS AverageOcena FROM score WHERE user_id = ".$user_id."";
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_array($result)) {
            echo "Ocena: "."<td>".$row['AverageOcena']."</td>";
        }

    ?>
<br />

<?php
include_once 'footer.php';
?>