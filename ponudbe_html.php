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
        <th>Pošlji sporočilo</th>
    </tr>
    <?php 
    $user=$_SESSION['user_id'];
        $query = "SELECT p.id,p.title, us.first_name,us.last_name,p.okvirna_cena,p.deadline_cena,pr.cena,pr.opis,users1.first_name as ime,users1.last_name as priimek FROM projects p INNER JOIN users us ON us.id=p.user_id INNER JOIN Ponudbe pr ON pr.project_id=p.id INNER JOIN users as users1 ON users1.id=pr.user_id WHERE us.id=$user;";
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
            echo '<td> <a href = sporocila_s.php> Pošlji sporočilo</a>';
            echo '</tr>';
        } 
    ?>
</table>
<br>
<?php
include_once 'footer.php';
?>