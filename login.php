<?php
    include_once 'header.php';
?>

<h1>Prijava</h1>
<table>
	<form action="login_check.php" method="POST">
	    <tr><td>E-Pošta: </td><td><input type="email" name="email" /></td></tr><br />
	    <tr><td>Geslo: </td><td><input type="password" name="pass" /></td></tr><br />
	    <tr><td><input type="submit" value="Prijava" /></td>
	    <td><input type="reset" value="Prekliči" /></td></tr>
	</form>
</table><br>
<?php
    include_once 'footer.php';
?>