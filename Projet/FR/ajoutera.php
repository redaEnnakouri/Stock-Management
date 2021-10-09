 
   <?php 
   include 'conx.php';
    $prixu=$_POST['$prixu'];
    $qte=$_POST['$qte'];
    $code=$_POST['$code'];
    $nomf=$_POST['$nomf'];
    $date =$_POST['date'];
    $total=$prixu*$qte;
    $totalt =$total;
    $avance =$_POST['avance'];
    $Reste =$totalt-$avance;
    
$quaryy="insert into articles(
 `date`, `nom Fournisseur`, `code Article`, `quantite`, `total`, `prix Utinitaire`, `total tout`, `avance`, `reste`
)  values('$date','$nomf','$code',$total,$prixu,$totalt,$avance,$Reste)";

$resultt = mysqli_query($conn, $quaryy);
if ( !$result) {
    die("<div class='alert alert-danger' role='alert'>
  <strong>Remarque : </strong>Erreur de l'insertion les informations ! <strong>
Réessaye En Coure</strong>
</div>");
}else echo"<div class='alert alert-success ' role='alert'>
  <strong> Les Informations est Enregistre
</strong>
</div>";

?>