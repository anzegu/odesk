<?php
    include_once 'header.php';
?>

<h1>Dodajanje veščin</h1>
<table>
<form action="skill_insert.php" method="POST">
    <tr><td> Ime:</td><td> <input type="text" name="title"  /><br /></td></tr>
    <tr><td>Opis:</td><td> <textarea name="description" cols="15" rows="5" placeholder="Vnesi pobrobni opis veščine"></textarea><br /></td></tr>
    <tr><td><input type="submit" value="Vnesi" /> 
    <input type="reset" value="Prekliči" /></td></tr>
</form>


<?php
    include_once 'footer.php';
?>