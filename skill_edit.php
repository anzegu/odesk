<?php
    include_once 'header.php';
    include_once 'database.php';
    
    //sprejmem podatek za katero državo gre
    $id = (int) $_GET['id'];
    
    $query = "SELECT * FROM skills WHERE id=".$id;
    
    //pošljem ukaz v bazo in sprejmem podatke
    $result = mysqli_query($link, $query);
    
    //rezultat pretvorim v array
    $skill = mysqli_fetch_array($result);
?>

<h1>Urejanje veščine</h1>
<table>
<form action="skill_update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <tr><td>  Ime:</td> <td><input type="text" name="title" value="<?php echo $skill['title']; ?>" /><br /></td></tr>
    <tr><td> Opis:</td><td> <textarea name="description" cols="15" rows="5" placeholder="Vnesi pobrobni opis veščine"><?php echo $skill['description']; ?></textarea><br /></td></tr>
    <tr><td>  <input type="submit" value="Vnesi" /></tr></td>
</form>
</table>

<?php
    include_once 'footer.php';
?>