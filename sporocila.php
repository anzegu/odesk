<?php 
    //session_start();
    include_once 'header.php';
    include_once 'database.php';
    
    if (isset($_SESSION['user_id'])) {
        //je prijavljen

$query = "select m.id AS 'id', u.first_name, u.last_name, m.tuser_id, m.subject, m.date from messages m inner join users u on u.id=m.fuser_id where m.tuser_id=".$_SESSION['user_id']." order by m.date desc";
                    
        echo '<table border="1"><tr><td><b><a href="sporocila_s.php">Novo</a></b></td><td><b><a href="sporocila.php">Prejeto</a></b></td><td><b><a href="sporocila_po.php">Poslano</a></b></td></tr>
            <tr><td><b>Pošiljatelj:</b></td><td><b>Zadeva:</b></td><td><b>Datum:</b></td></tr>';
        //preverimo uspešnost
        $result=mysqli_query($link, $query);
        
        $row = mysqli_num_rows($result);
        if($row!=0){
            
            
            
            while($rows = mysqli_fetch_assoc($result)){
                $id=$rows['id'];
                echo '<tr>';
                echo '<td>'.'<a href="view_profile.php?id='.$_SESSION['user_id'].'">'.$tuser = $rows['first_name'].'&nbsp;'.$prii= $rows['last_name'].'</a>'.'</td>';
                echo "<td><a href='sporocila_pr2.php?id=$id'>".$subject = $rows['subject']."</a></td>";
                echo '<td>'.$date = $rows['date'].'</td></tr>';
            } 
            echo '</table>';
        }
        else {echo '<tr><td colspan="3">Niste prejeli sporočila!</td></tr></table>';}
        
      
    }
    else {
        echo 'Nisi prijavljen!';
    }
     
    include 'footer.php';

?>