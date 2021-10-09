
<?php 


if(isset($_POST['submit'])){
   
    if($_POST['code']==null){
        
        echo("<div class='alert alert-danger' role='alert'>
    
  <strong>Remarque : </strong>Erreur de l'insertion les informations ! <strong>
Ressayer en Cour ......</strong>
</div>");
    }else if($_POST['code1']==null){
        $code=$_POST['code'];
    $c=$_POST['c'];
    $prixu=$_POST['prixu'];
    $qte=$_POST['qte'];
    $code=$_POST['code'];
    $nomf=$_POST['nomf'];
    $date =$_POST['date'];
    $avance =$_POST['avance'];
    $total=($prixu)*($qte);
   
  
        $totalt =$total;
        $Reste =$totalt-$avance;
   
        
        $quaryy="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
VALUES ('$code',$qte,$prixu,$total,$c) ";
        $qu="INSERT INTO `artbon`(`produit`, `qte`, `prixu`, `vstock`,bon)
VALUES ('$code',$qte,$prixu,$total,$c) ";
        
  
        $quary="INSERT INTO `article`(`bon`,date,nom, `total`, `avance`, `reste`)
VALUES ('$c','$date','$nomf',$totalt,$avance,$Reste) ";
        
        $result = mysqli_query($conn, $quary);
    $resultt = mysqli_query($conn, $quaryy);
    $re = mysqli_query($conn, $qu);
    if ( !$result) {
        echo("<div class='alert alert-danger' role='alert'>
  <strong>Remarque : </strong>Erreur de l'insertion les informations ! <strong>
Réessaye En Coure</strong>
</div>");
    }else echo"<div class='alert alert-success ' role='alert'>
  <strong> Les Informations est Enregistre
</strong>
</div>";
    
    
    }else  if($_POST['code2']==null){
        $c=$_POST['c'];
       
        $nomf=$_POST['nomf'];
        $date =$_POST['date'];
        $avance =$_POST['avance'];
        ///
        $code=$_POST['code'];
        $prixu=$_POST['prixu'];
        $qte=$_POST['qte'];
      
        
        $code1=$_POST['code1'];
        $prixu1=$_POST['prixu1'];
        $qte1=$_POST['qte1'];
        
       ////
        $total=($prixu)*($qte);
        $total1=($prixu1)*($qte1);
        ///
        $totalt =$total+$total1;
        $Reste =$totalt-$avance;
        $a="0";
            $b="0";
                $c="0";
        

        
        $quaryy="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
VALUES ('$code',$qte,$prixu,$total,$c),
('$code1',$qte1,$prixu1,$total1,$c) ";
        $qu="INSERT INTO `artbon`(`produit`, `qte`, `prixu`, `vstock`,bon)
VALUES ('$code',$qte,$prixu,$total,$c),
('$code1',$qte1,$prixu1,$total1,$c) ";
        
        $re = mysqli_query($conn, $qu);
        
        $quary="INSERT INTO `article`(`bon`,date,nom, `total`, `avance`, `reste`)
VALUES ('$c','$date','$nomf',$totalt,$avance,$Reste) ";
        
        $result = mysqli_query($conn, $quary);
        
        $resultt = mysqli_query($conn, $quaryy);
        if ( !$result) {
            echo("<div class='alert alert-danger' role='alert'>
  <strong>Remarque : </strong>Erreur de l'insertion les informations ! <strong>
Réessaye En Coure</strong>
</div>");
        }else echo"<div class='alert alert-success ' role='alert'>
  <strong> Les Informations est Enregistre
</strong>
</div>";
        
        
        
        
    }else  if($_POST['code3']==null){
        $c=$_POST['c'];
        
        $nomf=$_POST['nomf'];
        $date =$_POST['date'];
        $avance =$_POST['avance'];
        ///
        $code=$_POST['code'];
        $prixu=$_POST['prixu'];
        $qte=$_POST['qte'];
       
        
        $code1=$_POST['code1'];
        $prixu1=$_POST['prixu1'];
        $qte1=$_POST['qte1'];
      
        
        $code2=$_POST['code2'];
        $prixu2=$_POST['prixu2'];
        $qte2=$_POST['qte2'];
       
        ////
        $total=($prixu)*($qte);
        $total1=($prixu1)*($qte1);
        $total2=($prixu2)*($qte2);
        ///
        $totalt =$total+$total1+$total2;
        $Reste =$totalt-$avance;
        $a="0";
        $b="0";
        $c="0";
        
        $quaryy="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
VALUES ('$code',$qte,$prixu,$total,$c),
('$code1',$qte1,$prixu1,$total1,$c),
('$code2',$qte2,$prixu2,$total2,$c) ";
        $qu="INSERT INTO `artbon`(`produit`, `qte`, `prixu`, `vstock`,bon)
VALUES ('$code',$qte,$prixu,$total,$c),
('$code1',$qte1,$prixu1,$total1,$c),
('$code2',$qte2,$prixu2,$total2,$c) ";
        
        
        $quary="INSERT INTO `article`(`bon`,date,nom, `total`, `avance`, `reste`)
VALUES ('$c','$date','$nomf',$totalt,$avance,$Reste) ";
        
        $result = mysqli_query($conn, $quary);
        
        $re = mysqli_query($conn, $qu);
        $resultt = mysqli_query($conn, $quaryy);
        if ( !$result) {
            echo("<div class='alert alert-danger' role='alert'>
  <strong>Remarque : </strong>Erreur de l'insertion les informations ! <strong>
Réessaye En Coure</strong>
</div>");
        }else echo"<div class='alert alert-success ' role='alert'>
  <strong> Les Informations est Enregistre
</strong>
</div>";
        
        
        
        
        
    } ELSE if($_POST['code4']==null){
        $c=$_POST['c'];
        
        $nomf=$_POST['nomf'];
        $date =$_POST['date'];
        $avance =$_POST['avance'];
        ///
        $code=$_POST['code'];
        $prixu=$_POST['prixu'];
        $qte=$_POST['qte'];
      
        
        $code1=$_POST['code1'];
        $prixu1=$_POST['prixu1'];
        $qte1=$_POST['qte1'];
      
        
        $code2=$_POST['code2'];
        $prixu2=$_POST['prixu2'];
        $qte2=$_POST['qte2'];
     
        
        $code3=$_POST['code3'];
        $prixu3=$_POST['prixu3'];
        $qte3=$_POST['qte3'];
   
        ////
        $total=($prixu)*($qte);
        $total1=($prixu1)*($qte1);
        $total2=($prixu2)*($qte2);
        $total3=($prixu3)*($qte3);
        ///
        $totalt =$total+$total1+$total2+$total3;
        $Reste =$totalt-$avance;
        $a="0";
        $b="0";
        $c="0";
        
        $quaryy="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
VALUES ('$code',$qte,$prixu,$total,$c),
('$code1',$qte1,$prixu1,$total1,$c),
('$code2',$qte2,$prixu2,$total2,$c),
('$code3',$qte3,$prixu3,$total3,$c) ";
        $qu="INSERT INTO `artbon`(`produit`, `qte`, `prixu`, `vstock`,bon)
VALUES ('$code',$qte,$prixu,$total,$c),
('$code1',$qte1,$prixu1,$total1,$c),
('$code2',$qte2,$prixu2,$total2,$c),
('$code3',$qte3,$prixu3,$total3,$c) ";
        $re= mysqli_query($conn, $qu);
        
        $quary="INSERT INTO `article`(`bon`,date,nom, `total`, `avance`, `reste`)
VALUES ('$c','$date','$nomf',$totalt,$avance,$Reste) ";
        
        $result = mysqli_query($conn, $quary);
        
        $resultt = mysqli_query($conn, $quaryy);
        if ( !$result) {
            echo("<div class='alert alert-danger' role='alert'>
  <strong>Remarque : </strong>Erreur de l'insertion les informations ! <strong>
Réessaye En Coure</strong>
</div>");
        }else echo"<div class='alert alert-success ' role='alert'>
  <strong> Les Informations est Enregistre
</strong>
</div>";
        
        
        
        
        
        
        
        

    }ELSE if($_POST['code5']==null){
        $c=$_POST['c'];
        
        $nomf=$_POST['nomf'];
        $date =$_POST['date'];
        $avance =$_POST['avance'];
        ///
        $code=$_POST['code'];
        $prixu=$_POST['prixu'];
        $qte=$_POST['qte'];
      
        
        $code1=$_POST['code1'];
        $prixu1=$_POST['prixu1'];
        $qte1=$_POST['qte1'];
        
        
        $code2=$_POST['code2'];
        $prixu2=$_POST['prixu2'];
        $qte2=$_POST['qte2'];
       
        
        $code3=$_POST['code3'];
        $prixu3=$_POST['prixu3'];
        $qte3=$_POST['qte3'];
        
        
        $code4=$_POST['code4'];
        $prixu4=$_POST['prixu4'];
        $qte4=$_POST['qte4'];
        
        ////
        $total=($prixu)*($qte);
        $total1=($prixu1)*($qte1);
        $total2=($prixu2)*($qte2);
        $total3=($prixu3)*($qte3);
        $total4=($prixu4)*($qte4);
        ///
        $totalt =$total+$total1+$total2+$total3+$total4;
        $Reste =$totalt-$avance;
        $a="0";
        $b="0";
        $c="0";
        $quaryy="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
VALUES ('$code',$qte,$prixu,$total,$c),
('$code1',$qte1,$prixu1,$total1,$c),
('$code2',$qte2,$prixu2,$total2,$c),
('$code3',$qte3,$prixu3,$total3,$c),
('$code4',$qte4,$prixu4,$total4,$c) ";
        
        $qu="INSERT INTO `artbon`(`produit`, `qte`, `prixu`, `vstock`,bon)
VALUES ('$code',$qte,$prixu,$total,$c),
('$code1',$qte1,$prixu1,$total1,$c),
('$code2',$qte2,$prixu2,$total2,$c),
('$code3',$qte3,$prixu3,$total3,$c),
('$code4',$qte4,$prixu4,$total4,$c) ";
        
        $re = mysqli_query($conn, $qu);
        $quary="INSERT INTO `article`(`bon`,date,nom, `total`, `avance`, `reste`)
VALUES ('$c','$date','$nomf',$totalt,$avance,$Reste) ";
        
        $result = mysqli_query($conn, $quary);
        
        
        $resultt = mysqli_query($conn, $quaryy);
        if ( !$result) {
            echo("<div class='alert alert-danger' role='alert'>
  <strong>Remarque : </strong>Erreur de l'insertion les informations ! <strong>
Réessaye En Coure</strong>
</div>");
        }else echo"<div class='alert alert-success ' role='alert'>
  <strong> Les Informations est Enregistre
</strong>
</div>";
        
        
        
        
        
        
        
        
        
    }ELSE if($_POST['code6']==null){
        $c=$_POST['c'];
        
        $nomf=$_POST['nomf'];
        $date =$_POST['date'];
        $avance =$_POST['avance'];
        ///
        $code=$_POST['code'];
        $prixu=$_POST['prixu'];
        $qte=$_POST['qte'];
        
        
        $code1=$_POST['code1'];
        $prixu1=$_POST['prixu1'];
        $qte1=$_POST['qte1'];
        
        
        $code2=$_POST['code2'];
        $prixu2=$_POST['prixu2'];
        $qte2=$_POST['qte2'];
        
        
        $code3=$_POST['code3'];
        $prixu3=$_POST['prixu3'];
        $qte3=$_POST['qte3'];
        
        
        $code4=$_POST['code4'];
        $prixu4=$_POST['prixu4'];
        $qte4=$_POST['qte4'];
        
        $code5=$_POST['code5'];
        $prixu5=$_POST['prixu5'];
        $qte5=$_POST['qte5'];
        
        ////
        $total=($prixu)*($qte);
        $total1=($prixu1)*($qte1);
        $total2=($prixu2)*($qte2);
        $total3=($prixu3)*($qte3);
        $total4=($prixu4)*($qte4);
        $total5=($prixu5)*($qte5);
        
        ///
        $totalt =$total+$total1+$total2+$total3+$total4+$total5;
        $Reste =$totalt-$avance;
                                    $a="0";
                                    $b="0";
                                    $c="0";

 $quaryy="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
VALUES ('$code',$qte,$prixu,$total,$c),
('$code1',$qte1,$prixu1,$total1,$c),
('$code2',$qte2,$prixu2,$total2,$c),
('$code3',$qte3,$prixu3,$total3,$c),
('$code4',$qte4,$prixu4,$total4,$c),
 ('$code5',$qte5,$prixu5,$total5,$c)";
 
 
 $quaryy="INSERT INTO `artbon`(`produit`, `qte`, `prixu`, `vstock`,bon)
VALUES ('$code',$qte,$prixu,$total,$c),
('$code1',$qte1,$prixu1,$total1,$c),
('$code2',$qte2,$prixu2,$total2,$c),
('$code3',$qte3,$prixu3,$total3,$c),
('$code4',$qte4,$prixu4,$total4,$c),
 ('$code5',$qte5,$prixu5,$total5,$c)";
                                    
                                    
                                    $quary="INSERT INTO `article`(`bon`,date,nom, `total`, `avance`, `reste`)
VALUES ('$c','$date','$nomf',$totalt,$avance,$Reste) ";
                                    
                                    $result = mysqli_query($conn, $quary);
                                    $re = mysqli_query($conn, $qu);
        
        
        $resultt = mysqli_query($conn, $quaryy);
        if ( !$result) {
            echo("<div class='alert alert-danger' role='alert'>
  <strong>Remarque : </strong>Erreur de l'insertion les informations ! <strong>
Réessaye En Coure</strong>
</div>");
        }else echo"<div class='alert alert-success ' role='alert'>
  <strong> Les Informations est Enregistre
</strong>
</div>";
        
        
        
        
        
        
        
        
        
    }ELSE if($_POST['code7']==null){
        $c=$_POST['c'];
        
        $nomf=$_POST['nomf'];
        $date =$_POST['date'];
        $avance =$_POST['avance'];
        ///
        $code=$_POST['code'];
        $prixu=$_POST['prixu'];
        $qte=$_POST['qte'];
        
        
        $code1=$_POST['code1'];
        $prixu1=$_POST['prixu1'];
        $qte1=$_POST['qte1'];
        
        
        $code2=$_POST['code2'];
        $prixu2=$_POST['prixu2'];
        $qte2=$_POST['qte2'];
        
        
        $code3=$_POST['code3'];
        $prixu3=$_POST['prixu3'];
        $qte3=$_POST['qte3'];
        
        
        $code4=$_POST['code4'];
        $prixu4=$_POST['prixu4'];
        $qte4=$_POST['qte4'];
        
        $code5=$_POST['code5'];
        $prixu5=$_POST['prixu5'];
        $qte5=$_POST['qte5'];
        
        $code6=$_POST['code6'];
        $prixu6=$_POST['prixu6'];
        $qte6=$_POST['qte6'];
        
        ////
        $total=($prixu)*($qte);
        $total1=($prixu1)*($qte1);
        $total2=($prixu2)*($qte2);
        $total3=($prixu3)*($qte3);
        $total4=($prixu4)*($qte4);
        $total5=($prixu5)*($qte5);
        $total6=($prixu6)*($qte6);
        
        ///
        $totalt =$total+$total1+$total2+$total3+$total4+$total5+$total6;
        $Reste =$totalt-$avance;
        $a="0";
        $b="0";
        $c="0";
        $quaryy="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
VALUES ('$code',$qte,$prixu,$total,$c),
('$code1',$qte1,$prixu1,$total1,$c),
('$code2',$qte2,$prixu2,$total2,$c),
('$code3',$qte3,$prixu3,$total3,$c),
('$code4',$qte4,$prixu4,$total4,$c),
 ('$code5',$qte5,$prixu5,$total5,$c),
('$code6',$qte6,$prixu6,$total6,$c)";
        $qu="INSERT INTO `artbon`(`produit`, `qte`, `prixu`, `vstock`,bon)
VALUES ('$code',$qte,$prixu,$total,$c),
('$code1',$qte1,$prixu1,$total1,$c),
('$code2',$qte2,$prixu2,$total2,$c),
('$code3',$qte3,$prixu3,$total3,$c),
('$code4',$qte4,$prixu4,$total4,$c),
 ('$code5',$qte5,$prixu5,$total5,$c),
('$code6',$qte6,$prixu6,$total6,$c)";
        
        $re = mysqli_query($conn, $qu);
        
        $quary="INSERT INTO `article`(`bon`,date,nom, `total`, `avance`, `reste`)
VALUES ('$c','$date','$nomf',$totalt,$avance,$Reste) ";
        
        $result = mysqli_query($conn, $quary);
        
        
        
        $resultt = mysqli_query($conn, $quaryy);
        if ( !$result) {
            echo("<div class='alert alert-danger' role='alert'>
  <strong>Remarque : </strong>Erreur de l'insertion les informations ! <strong>
Réessaye En Coure</strong>
</div>");
        }else echo"<div class='alert alert-success ' role='alert'>
  <strong> Les Informations est Enregistre
</strong>
</div>";
        
        
        
        
        
        
        
        
        
    }ELSE if($_POST['code8']==null){
        $c=$_POST['c'];
        
        $nomf=$_POST['nomf'];
        $date =$_POST['date'];
        $avance =$_POST['avance'];
        ///
        $code=$_POST['code'];
        $prixu=$_POST['prixu'];
        $qte=$_POST['qte'];
        
        
        $code1=$_POST['code1'];
        $prixu1=$_POST['prixu1'];
        $qte1=$_POST['qte1'];
        
        
        $code2=$_POST['code2'];
        $prixu2=$_POST['prixu2'];
        $qte2=$_POST['qte2'];
        
        
        $code3=$_POST['code3'];
        $prixu3=$_POST['prixu3'];
        $qte3=$_POST['qte3'];
        
        
        $code4=$_POST['code4'];
        $prixu4=$_POST['prixu4'];
        $qte4=$_POST['qte4'];
        
        $code5=$_POST['code5'];
        $prixu5=$_POST['prixu5'];
        $qte5=$_POST['qte5'];
        
        $code6=$_POST['code6'];
        $prixu6=$_POST['prixu6'];
        $qte6=$_POST['qte6'];
        
        $code7=$_POST['code7'];
        $prixu7=$_POST['prixu7'];
        $qte7=$_POST['qte7'];
        
        ////
        $total=($prixu)*($qte);
        $total1=($prixu1)*($qte1);
        $total2=($prixu2)*($qte2);
        $total3=($prixu3)*($qte3);
        $total4=($prixu4)*($qte4);
        $total5=($prixu5)*($qte5);
        $total6=($prixu6)*($qte6);
        $total7=($prixu7)*($qte7);
        
        ///
        $totalt =$total+$total1+$total2+$total3+$total4+$total5+$total6+$total7;
        $Reste =$totalt-$avance;
        $a="0";
        $b="0";
        $c="0";
        $quaryy="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
VALUES ('$code',$qte,$prixu,$total,$c),
('$code1',$qte1,$prixu1,$total1,$c),
('$code2',$qte2,$prixu2,$total2,$c),
('$code3',$qte3,$prixu3,$total3,$c),
('$code4',$qte4,$prixu4,$total4,$c),
 ('$code5',$qte5,$prixu5,$total5,$c),
('$code6',$qte6,$prixu6,$total6,$c),
('$code7',$qte7,$prixu7,$total7,$c)";
        
        $qu="INSERT INTO `artbon`(`produit`, `qte`, `prixu`, `vstock`,bon)
VALUES ('$code',$qte,$prixu,$total,$c),
('$code1',$qte1,$prixu1,$total1,$c),
('$code2',$qte2,$prixu2,$total2,$c),
('$code3',$qte3,$prixu3,$total3,$c),
('$code4',$qte4,$prixu4,$total4,$c),
 ('$code5',$qte5,$prixu5,$total5,$c),
('$code6',$qte6,$prixu6,$total6,$c),
('$code7',$qte7,$prixu7,$total7,$c)";
        $re = mysqli_query($conn, $qu);
        
        $quary="INSERT INTO `article`(`bon`,date,nom, `total`, `avance`, `reste`)
VALUES ('$c','$date','$nomf',$totalt,$avance,$Reste) ";
        
        $result = mysqli_query($conn, $quary);
        
        
        
        
        $resultt = mysqli_query($conn, $quaryy);
        if ( !$result) {
            echo("<div class='alert alert-danger' role='alert'>
  <strong>Remarque : </strong>Erreur de l'insertion les informations ! <strong>
Réessaye En Coure</strong>
</div>");
        }else echo"<div class='alert alert-success ' role='alert'>
  <strong> Les Informations est Enregistre
</strong>
</div>";
        
        
        
        
        
        
        
        
        
    }ELSE if($_POST['code9']==null){
        $c=$_POST['c'];
        
        $nomf=$_POST['nomf'];
        $date =$_POST['date'];
        $avance =$_POST['avance'];
        ///
        $code=$_POST['code'];
        $prixu=$_POST['prixu'];
        $qte=$_POST['qte'];
        
        
        $code1=$_POST['code1'];
        $prixu1=$_POST['prixu1'];
        $qte1=$_POST['qte1'];
        
        
        $code2=$_POST['code2'];
        $prixu2=$_POST['prixu2'];
        $qte2=$_POST['qte2'];
        
        
        $code3=$_POST['code3'];
        $prixu3=$_POST['prixu3'];
        $qte3=$_POST['qte3'];
        
        
        $code4=$_POST['code4'];
        $prixu4=$_POST['prixu4'];
        $qte4=$_POST['qte4'];
        
        $code5=$_POST['code5'];
        $prixu5=$_POST['prixu5'];
        $qte5=$_POST['qte5'];
        
        $code6=$_POST['code6'];
        $prixu6=$_POST['prixu6'];
        $qte6=$_POST['qte6'];
        
        $code7=$_POST['code7'];
        $prixu7=$_POST['prixu7'];
        $qte7=$_POST['qte7'];
        
        $code8=$_POST['code8'];
        $prixu8=$_POST['prixu8'];
        $qte8=$_POST['qte8'];
        
        ////
        $total=($prixu)*($qte);
        $total1=($prixu1)*($qte1);
        $total2=($prixu2)*($qte2);
        $total3=($prixu3)*($qte3);
        $total4=($prixu4)*($qte4);
        $total5=($prixu5)*($qte5);
        $total6=($prixu6)*($qte6);
        $total7=($prixu7)*($qte7);
        $total8=($prixu8)*($qte8);
        
        ///
        $totalt =$total+$total1+$total2+$total3+$total4+$total5+$total6+$total7+$total8;
        $Reste =$totalt-$avance;
        $a="0";
        $b="0";
        $c="0";
        $quaryy="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
VALUES ('$code',$qte,$prixu,$total,$c),
('$code1',$qte1,$prixu1,$total1,$c),
('$code2',$qte2,$prixu2,$total2,$c),
('$code3',$qte3,$prixu3,$total3,$c),
('$code4',$qte4,$prixu4,$total4,$c),
 ('$code5',$qte5,$prixu5,$total5,$c),
('$code6',$qte6,$prixu6,$total6,$c),
('$code7',$qte7,$prixu7,$total7,$c),
('$code8',$qte8,$prixu8,$total8,$c)
";
        $qu="INSERT INTO `artbon`(`produit`, `qte`, `prixu`, `vstock`,bon)
VALUES ('$code',$qte,$prixu,$total,$c),
('$code1',$qte1,$prixu1,$total1,$c),
('$code2',$qte2,$prixu2,$total2,$c),
('$code3',$qte3,$prixu3,$total3,$c),
('$code4',$qte4,$prixu4,$total4,$c),
 ('$code5',$qte5,$prixu5,$total5,$c),
('$code6',$qte6,$prixu6,$total6,$c),
('$code7',$qte7,$prixu7,$total7,$c),
('$code8',$qte8,$prixu8,$total8,$c)
";
        
        $re = mysqli_query($conn, $qu);
        $quary="INSERT INTO `article`(`bon`,date,nom, `total`, `avance`, `reste`)
VALUES ('$c','$date','$nomf',$totalt,$avance,$Reste) ";
        
        $result = mysqli_query($conn, $quary);
        
        
        
        $resultt = mysqli_query($conn, $quaryy);
        if ( !$result) {
            echo("<div class='alert alert-danger' role='alert'>
  <strong>Remarque : </strong>Erreur de l'insertion les informations ! <strong>
Réessaye En Coure</strong>
</div>");
        }else echo"<div class='alert alert-success ' role='alert'>
  <strong> Les Informations est Enregistre
</strong>
</div>";
        
        
        
        
        
        
        
        
        
    }ELSE if($_POST['code10']==null){
        $c=$_POST['c'];
        
        $nomf=$_POST['nomf'];
        $date =$_POST['date'];
        $avance =$_POST['avance'];
        ///
        $code=$_POST['code'];
        $prixu=$_POST['prixu'];
        $qte=$_POST['qte'];
        
        
        $code1=$_POST['code1'];
        $prixu1=$_POST['prixu1'];
        $qte1=$_POST['qte1'];
        
        
        $code2=$_POST['code2'];
        $prixu2=$_POST['prixu2'];
        $qte2=$_POST['qte2'];
        
        
        $code3=$_POST['code3'];
        $prixu3=$_POST['prixu3'];
        $qte3=$_POST['qte3'];
        
        
        $code4=$_POST['code4'];
        $prixu4=$_POST['prixu4'];
        $qte4=$_POST['qte4'];
        
        $code5=$_POST['code5'];
        $prixu5=$_POST['prixu5'];
        $qte5=$_POST['qte5'];
        
        $code6=$_POST['code6'];
        $prixu6=$_POST['prixu6'];
        $qte6=$_POST['qte6'];
        
        $code7=$_POST['code7'];
        $prixu7=$_POST['prixu7'];
        $qte7=$_POST['qte7'];
        
        $code8=$_POST['code8'];
        $prixu8=$_POST['prixu8'];
        $qte8=$_POST['qte8'];
        
        $code9=$_POST['code9'];
        $prixu9=$_POST['prixu9'];
        $qte9=$_POST['qte9'];
        
        ////
        $total=($prixu)*($qte);
        $total1=($prixu1)*($qte1);
        $total2=($prixu2)*($qte2);
        $total3=($prixu3)*($qte3);
        $total4=($prixu4)*($qte4);
        $total5=($prixu5)*($qte5);
        $total6=($prixu6)*($qte6);
        $total7=($prixu7)*($qte7);
        $total8=($prixu8)*($qte8);
        $total9=($prixu9)*($qte9);
        
        ///
        $totalt =$total+$total1+$total2+$total3+$total4+$total5+$total6+$total7+$total8+$total9;
        $Reste =$totalt-$avance;
        
        $quaryy="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
VALUES ('$code',$qte,$prixu,$total,$c),
('$code1',$qte1,$prixu1,$total1,$c),
('$code2',$qte2,$prixu2,$total2,$c),
('$code3',$qte3,$prixu3,$total3,$c),
('$code4',$qte4,$prixu4,$total4,$c),
 ('$code5',$qte5,$prixu5,$total5,$c),
('$code6',$qte6,$prixu6,$total6,$c),
('$code7',$qte7,$prixu7,$total7,$c),
('$code8',$qte8,$prixu8,$total8,$c),
('$code9',$qte9,$prixu9,$total9,$c)
";
        
        
        $quary="INSERT INTO `article`(`bon`,date,nom, `total`, `avance`, `reste`)
VALUES ('$c','$date','$nomf',$totalt,$avance,$Reste) ";
        
        $result = mysqli_query($conn, $quary);
        
        
        
        $resultt = mysqli_query($conn, $quaryy);
        if ( !$result) {
            echo("<div class='alert alert-danger' role='alert'>
  <strong>Remarque : </strong>Erreur de l'insertion les informations ! <strong>
Réessaye En Coure</strong>
</div>");
        }else echo"<div class='alert alert-success ' role='alert'>
  <strong> Les Informations est Enregistre
</strong>
</div>";
        
        
        
        
        
        
        
        
        
    }else echo("<div class='alert alert-danger' role='alert'>
        
  <strong>Remarque : </strong>Erreur de l'insertion les informations ! <strong>
Ressayer en Cour ......</strong>
</div>");


}

?>
