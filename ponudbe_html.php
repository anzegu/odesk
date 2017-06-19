<?php
include_once 'header.php';
include_once 'database.php';
?>

<h1>Pregled projektov</h1>

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
        $query = "SELECT *, p.id AS project_id, po.user_id 
                  FROM projects p INNER JOIN users u INNER JOIN Ponudbe po ON po.user_id=po.id 
                  ON u.id = p.user_id";
        $result = mysqli_query($link, $query);
        //izpisal bom vse projekte
        $st = 0;
        while ($row = mysqli_fetch_array($result)) {
            $st++;
            echo "<tr>";
            echo "<td>$st</td>";
            echo "<td>".$row['title']."</td>";
            echo "<td>".$row['first_name']. "</td>";
            echo "<td>".$row['okvirna_cena']."€"."</td>";
            echo "<td>".$row['deadline_cena']."€"."</td>";
            echo "<td>".$row['cena']. "</td>";
            echo "<td>".$row['opis']. "</td>";
            echo "<td>".$row['user_id']. "</td>";
            
                         //.$row['last_name']."</td>";
            echo "<td>";
            if ($_SESSION['user_id'] == $row['user_id']) {
                echo '<a href="project_edit.php?id='.$row['project_id'].'">Uredi</a> ';
                echo '<a href="project_delete.php?id='.$row['project_id'].'">Izbriši</a>';
            }

            echo "</td>";
            echo '</tr>';
        }
    ?>
</table>

<?php
include_once 'footer.php';
?>