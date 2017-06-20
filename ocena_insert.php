<?php
    include_once 'header.php';
    include_once 'database.php';
?>
<?php
$ocena = $_POST['ocena'];
$user_id = $_GET['user_id'];
$query = sprintf("INSERT INTO score(user_id,ocena)"."VALUES($user_id,'%s')",
		mysqli_real_escape_string($link, $ocena));
		mysqli_query($link, $query);
?>
<?php
include_once 'footer.php';
?>