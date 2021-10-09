<?php ob_start() ?>
<?php
include "conx.php";

$quaryy = "DELETE FROM  client WHERE `id`=".$_GET['id'];
$resultt = mysqli_query($conn, $quaryy);
if (! $resultt) {
    die("error");
}


?> 
<html><body>
<?php
$x=$_GET['user'];
header("location:../cllient.php?user=$x");?>
</body>
</html>