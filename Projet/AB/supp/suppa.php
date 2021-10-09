<?php ob_start() ?>
<?php
include "conx.php";

$quaryy = "DELETE FROM article WHERE `bon`='".$_GET['id']."'";
$resultt = mysqli_query($conn, $quaryy);
if (! $resultt) {
    die("error");
}
$qua = "DELETE FROM artbon WHERE `bon`='".$_GET['id']."'";
$res = mysqli_query($conn, $qua);

?> 
<html><body>
<?php
$x=$_GET['user'];
header("location:../GestionArticles.php?user=$x");?>
</body>
</html>