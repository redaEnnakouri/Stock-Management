<?php ob_start() ?>
<?php
include "conx.php";


$quaryy = "DELETE FROM  compte WHERE `id`=".$_GET['id'];
$resultt = mysqli_query($conn, $quaryy);
if (! $resultt) {
    die("error");
}


?> 
<html><body>

<?php header("location:../superviseur.php");?>
</body>
</html>