<?php ob_start() ?>
<?php
include "conx.php";

$quaryy = "DELETE FROM  fournisseur WHERE `id`=".$_GET['id'];
$resultt = mysqli_query($conn, $quaryy);
if (! $resultt) {
    die("error");
}


?> 
<html><body>

<?php 
$x=$_GET['user'];
header("location:../fournisseur.php?user=$x");?>
</body>
</html>