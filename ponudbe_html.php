<?php
include_once 'header.php';
include_once 'database.php';
?>

<h1>Pregled ponudb</h1>
<meta charset="utf-8">
<table border="1" cellspacing="0" cellpadding="0">
    <tr>
        <th>Št.</th>
        <th>Ime</th>
        <th>Lastnik</th>
        <th>Okvirna Cena</th>
        <th>Zadnja cena</th>
        <th>Ponujena cena</th>
        <th>Opis</th>
        <th>Uporabnik</th>
    </tr>
    <?php 
    $user=$_SESSION['user_id'];
        $query = "select p.id,p.title, us.first_name,us.last_name,p.okvirna_cena,p.deadline_cena,pr.cena,pr.opis,users1.first_name as ime,users1.last_name as priimek from projects p inner join users us on us.id=p.user_id inner join Ponudbe pr on pr.project_id=p.id inner join users as users1 on users1.id=pr.user_id where us.id=$user;";
        $result = mysqli_query($link, $query);
        //izpisal bom vse projekte
        $st = 0;
        while ($row = mysqli_fetch_array($result)) {
            $st++;
            echo "<tr>";
            echo "<td>$st</td>";
            echo "<td>".$row['title']."</td>";
            echo "<td>".$row['first_name'].' '.$row['last_name'] ."</td>";
            echo "<td>".$row['okvirna_cena']."€"."</td>";
            echo "<td>".$row['deadline_cena']."€"."</td>";
            echo "<td>".$row['cena']."€"."</td>";
            echo "<td>".$row['opis']. "</td>";
            echo "<td>".$row['ime'].' '.$row['priimek']. "</td>";
            
                         //.$row['last_name']."</td>";

        }
    ?>
</table>

<?php
include_once 'footer.php';
?>