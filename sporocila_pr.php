<?php 
    //session_start();
    include_once 'header.php';
    include_once 'database.php';
    
    if (isset($_SESSION['user_id'])) {
        //je prijavljen
$query = "select m.id as 'id', u.first_name, u.last_name, m.tuser_id, m.subject, m.date, m.content, u.email from messages m inner join users u on u.id=m.tuser_id where (m.fuser_id=".$_SESSION['user_id'].")and (m.id=".$_GET['id'].") order by m.date desc";
          
        
        //preverimo uspešnost
        $result=mysqli_query($link, $query);
        
        $row = mysqli_num_rows($result);
        if($row!=0){  
            echo "<table>";
            while($rows = mysqli_fetch_assoc($result)){
                $id=$rows['id'];
                $email=$rows['email'];
                $tuser = $rows['tuser_id'];
                echo '<td>Prejemnik:</td><td>'.$fuser = $rows['first_name'].'&nbsp;'.$prii= $rows['last_name'].'</td></tr>';
                echo '<tr><td>Zadeva:</td><td>'.$subject = $rows["subject"];
                echo '<tr><td>Vsebina</td><td>'.$content = $rows['content'].'</td></tr>';                
            }
            $query = "select m.id as 'id', u.first_name, u.last_name, m.tuser_id, f.file, m.subject, m.date, m.content, u.email from messages m inner join users u on u.id=m.tuser_id inner join files f on m.id=f.message_id where (m.fuser_id=".$_SESSION['user_id'].")and (m.id=".$_GET['id'].") order by m.date desc";
            $result=mysqli_query($link, $query);
            if($row!=0){
                while($rows = mysqli_fetch_assoc($result)){
                echo '<tr><td>Datoteka:</td><td><a href="'.$file = $rows['file'].'">Link</a></td></tr>';
                echo '<tr><td colspan="2"><a href="sporocila_izbris.php?mid='.$id.'&fid='.$fid.'">Izbriši</a>';
                }
            }
            echo '<tr><td colspan="2"><a href="sporocila_izbris.php?mid='.$id.'">Izbriši</a>';
            echo '<tr><td colspan="2"><a href="sporocila_s.php?email='.$email.'&mid='.$id.'&subject=RE:'.$subject.'">Odgovori</a>';
            echo '</td></tr></table>';
            
        }      
    }
    else {
        echo 'Nisi prijavljen!';
    }
     
    include 'footer.php';

?>