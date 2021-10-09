
<?php 
$y=date("Y-m-d");
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
    
    $test = preg_split ("/\./", $code); 
  
        $totalt =$total;
        $Reste =$totalt-$avance;
        
        $quaryy="INSERT INTO `vente`( `bon`, `date`, `nom`, `total`, `avance`, `reste`)
VALUES ('$c','$date','$nomf',$totalt,$avance,$Reste) ";
        $qr =$_POST['qr'];
        $pr=$_POST['pr'];
        $qqq=$_POST['w'];
        $tqr=($qqq-$qte);
        $xz=$_POST['m'];
        $v=(($qqq-$qte)*$_POST['m']);
        
        
        $quary = "SELECT count(produit)as cont ,bon FROM `stock` where produit='".$test[0]."' group by produit   ";
        $result = mysqli_query($conn, $quary);
        if (! $result) {
            die("error");
        }
        while ($row = mysqli_fetch_assoc($result)) {
            
            if($row['cont']==1){
           
                $quary="UPDATE `stock` SET `qte`=".$tqr.",prixu=".$xz.",vstock=".$v." WHERE `produit`='".$test[0]."'";
                
            }else{
                $quz = "DELETE FROM stock WHERE `produit`='".$test[0]."'";
                $rez = mysqli_query($conn, $quz);
                
                $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test[0]',$tqr,$xz,$v,'".$row['cont']."') ";
            }
            
        }
        
       
        
       
        
        
        $prixv=$prixu-$_POST['m'];
        $t=$prixv*$qte;
        $j=$qte*$prixv;
        
        $quar="INSERT INTO `rapport`(`date`, `produit`, `qt`, `prixv`,total,bon, `nom`, `prix`, prixm)
VALUES ('$y','$test[0]',$qte,$prixv,$t,$c,'$nomf',".$_POST['m'].",$prixu) ";
        
        $qu="INSERT INTO `venbon`(`date`, `produit`, `qt`, `prixv`,bon)
VALUES ('$y','$test[0]',$qte,$prixu,$c) ";
        
        $re = mysqli_query($conn, $qu);
        $resul = mysqli_query($conn, $quar);
        
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
       
       /////
       
        $test = preg_split ("/\./",$code);
        $qr =$_POST['qr'];
        $pr=$_POST['pr'];
        $qqq=$_POST['w'];
        $tqr=($qqq-$qte);
        $xz=$_POST['m'];
        $v=(($qqq-$qte)*$_POST['m']);
        
        $test1 = preg_split ("/\./",$code1);
        $qr1 =$_POST['qr1'];
        $pr1=$_POST['pr1'];
        
        $qqq1=$_POST['w1'];
        $tqr1=($qqq1-$qte1);
        $xz1=$_POST['m1'];
        $v1=(($qqq1-$qte1)*$_POST['m1']);
       
        $quaryy="INSERT INTO `vente`( `bon`, `date`, `nom`, `total`, `avance`, `reste`)
        VALUES ($c,'$date','$nomf',$totalt,$avance,$Reste) ";
        
        
        $quag = "SELECT count(produit)as cont ,bon,produit FROM `stock` where produit='".$test[0]."' or produit='".$test1[0]."'  group by produit   ";
        $resg = mysqli_query($conn, $quag);
        if (! $result) {
            die("error");
        }
        while ($row = mysqli_fetch_assoc($resg)) {
            
            if($row['cont']==1){
        $quary="UPDATE stock SET 
            qte=(case 
            when `produit`='".$test[0]."' then $tqr 
            when `produit`='".$test1[0]."' then $tqr1 
 ELSE qte
                end),prixu=(case
            when `produit`='".$test[0]."' then $xz 
            when `produit`='".$test1[0]."' then $xz1
 ELSE prixu
                end),vstock=(case
            when `produit`='".$test[0]."' then $v 
            when `produit`='".$test1[0]."' then $v1 
 ELSE vstock
                end) ";
        
            }else{
                if($row['cont']>=1 && $row['produit']==$test[0]){
                $quz = "DELETE FROM stock WHERE `produit`='".$test[0]."'  ";
                
                $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test[0]',$tqr,$xz,$v,'".$row['cont']."')";
                }else if($row['cont']>=1 && $row['produit']==$test1[0]){
                    $quz = "DELETE FROM stock WHERE `produit`='".$test1[0]."'";
                    $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test1[0]',$tqr1,$xz1,$v1,'".$row['cont']."')";
                    
                }
                
                $rez = mysqli_query($conn, $quz);
             


            }
            $rett = mysqli_query($conn, $quary);
        }
        $resg = mysqli_query($conn, $quag);
        
        $resultt = mysqli_query($conn, $quaryy);
        
        $prixv=$prixu-$_POST['m'];
        $t=$prixv*$qte;
        
        $prixv1=$prixu1-$_POST['m1'];
        $t1=$prixv1*$qte1;
        
        $quar="INSERT INTO `rapport`(`date`, `produit`, `qt`, `prixv`,total,bon, `nom`, `prix`, prixm)
VALUES ('$y','$test[0]',$qte,$prixv,$t,$c,'$nomf',".$_POST['m'].",$prixu),
('$y','$test1[0]',$qte1,$prixv1,$t1,$c,'$nomf',".$_POST['m1'].",$prixu1)
 ";
        $qu="INSERT INTO `venbon`(`date`, `produit`, `qt`, `prixv`,bon)
VALUES ('$y','$test[0]',$qte,$prixu,$c),
('$y','$test1[0]',$qte1,$prixu1,$c)
 ";
        $re = mysqli_query($conn, $qu);
        $resul = mysqli_query($conn, $quar);
        
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
       
        
        $test = preg_split ("/\./",$code);
        $qr =$_POST['qr'];
        $pr=$_POST['pr'];
        
        $qqq=$_POST['w'];
        $tqr=($qqq-$qte);
        $xz=$_POST['m'];
        $v=(($qqq-$qte)*$_POST['m']);
        
        $test1 = preg_split ("/\./",$code1);
        $qr1 =$_POST['qr1'];
        $pr1=$_POST['pr1'];
        
        $qqq1=$_POST['w1'];
        $tqr1=($qqq1-$qte1);
        $xz1=$_POST['m1'];
        $v1=(($qqq1-$qte1)*$_POST['m1']);
        
        $test2 = preg_split ("/\./",$code2);
        $qr2 =$_POST['qr2'];
        $pr2=$_POST['pr2'];
        $tqr2=($qqq2-$qte2);
        $xz2=$_POST['m2'];
        $v2=(($qqq2-$qte2)*$_POST['m2']);
        
        $quaryy="INSERT INTO `vente`( `bon`, `date`, `nom`, `total`, `avance`, `reste`)
        VALUES ('$c','$date','$nomf',$totalt,$avance,$Reste) ";
        
        
        
        $quag = "SELECT count(produit)as cont ,bon,produit FROM `stock` where produit='".$test[0]."'
 or produit='".$test1[0]."'or produit='".$test2[0]."'  group by produit   ";
        $resg = mysqli_query($conn, $quag);
        if (! $result) {
            die("error");
        }
        while ($row = mysqli_fetch_assoc($resg)) {
            
            if($row['cont']==1){
        $quary="UPDATE stock SET
            qte=(case
            when `produit`='".$test[0]."' then $tqr
            when `produit`='".$test1[0]."' then $tqr1
             when `produit`='".$test2[0]."' then $tqr2
 ELSE qte
                end),prixu=(case
            when `produit`='".$test[0]."' then $xz 
            when `produit`='".$test1[0]."' then $xz1
  when `produit`='".$test2[0]."' then $xz2
 ELSE prixu
                end),vstock=(case
            when `produit`='".$test[0]."' then $v
            when `produit`='".$test1[0]."' then $v1
            when `produit`='".$test2[0]."' then $v2
 ELSE vstock
                end) ";
        
            }else{
                if($row['cont']>=1 && $row['produit']==$test[0]){
                    $quz = "DELETE FROM stock WHERE `produit`='".$test[0]."'  ";
                    
                    $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test[0]',$tqr,$xz,$v,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test1[0]){
                    $quz = "DELETE FROM stock WHERE `produit`='".$test1[0]."'";
                    $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test1[0]',$tqr1,$xz1,$v1,'".$row['cont']."')";
                    
                }else
                    if($row['cont']>=1 && $row['produit']==$test2[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test2[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test2[0]',$tqr2,$xz2,$v2,'".$row['cont']."')";
                    }
                
                $rez = mysqli_query($conn, $quz);
                
                
                }
                $rett = mysqli_query($conn, $quary);
            }
            $resg = mysqli_query($conn, $quag);
            
        
        $prixv=$prixu-$_POST['m'];
        $t=$prixv*$qte;
        
        $prixv1=$prixu1-$_POST['m1'];
        $t1=$prixv1*$qte1;
        
        $prixv2=$prixu2-$_POST['m2'];
        $t2=$prixv2*$qte2;
        
        $quar="INSERT INTO `rapport`(`date`, `produit`, `qt`, `prixv`,total,bon, `nom`, `prix`, prixm)
VALUES ('$y','$test[0]',$qte,$prixv,$t,$c,'$nomf',".$_POST['m'].",$prixu),
('$y','$test1[0]',$qte1,$prixv1,$t1,$c,'$nomf',".$_POST['m1'].",$prixu1),
('$y','$test2[0]',$qte2,$prixv2,$t2,$c,,'$nomf',".$_POST['m2'].",$prixu2)

 ";
        $qu="INSERT INTO `venbon`(`date`, `produit`, `qt`, `prixv`,bon)
VALUES ('$y','$test[0]',$qte,$prixu,$c),
('$y','$test1[0]',$qte1,$prixu1,$c),
('$y','$test2[0]',$qte2,$prixu2,$c)

 ";
        $re = mysqli_query($conn, $qu);
        $resul = mysqli_query($conn, $quar);
        
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
       
        
        $test = preg_split ("/\./",$code);
        $qr =$_POST['qr'];
        $pr=$_POST['pr'];
        $tqr=($qqq-$qte);
        $xz=$_POST['m'];
        $v=(($qqq-$qte)*$_POST['m']);
        
        $test1 = preg_split ("/\./",$code1);
        $qr1 =$_POST['qr1'];
        $pr1=$_POST['pr1'];
        $tqr1=($qqq1-$qte1);
        $xz1=$_POST['m1'];
        $v1=(($qqq1-$qte1)*$_POST['m1']);
        
        $test2 = preg_split ("/\./",$code2);
        $qr2 =$_POST['qr2'];
        $pr2=$_POST['pr2'];
        $tqr2=($qqq2-$qte2);
        $xz2=$_POST['m2'];
        $v2=(($qqq2-$qte2)*$_POST['m2']);
        
        
        $test3 = preg_split ("/\./",$code3);
        $qr3 =$_POST['qr3'];
        $pr3=$_POST['pr3'];
        $tqr3=($qqq3-$qte3);
        $xz3=$_POST['m3'];
        $v3=(($qqq3-$qte3)*$_POST['m3']);
        
        $quaryy="INSERT INTO `vente`( `bon`, `date`, `nom`, `total`, `avance`, `reste`)
        VALUES ('$c','$date','$nomf',$totalt,$avance,$Reste) ";
        $quag = "SELECT count(produit)as cont ,bon,produit FROM `stock` where produit='".$test[0]."' or produit='".$test1[0]."' 
or produit='".$test2[0]."'or produit='".$test3[0]."' group by produit   ";
        $resg = mysqli_query($conn, $quag);
        if (! $result) {
            die("error");
        }
        while ($row = mysqli_fetch_assoc($resg)) {
            
            if($row['cont']==1){
        $quary="UPDATE stock SET
            qte=(case
            when `produit`='".$test[0]."' then $tqr
            when `produit`='".$test1[0]."' then $tqr1
             when `produit`='".$test2[0]."' then $tqr2
                when `produit`='".$test3[0]."' then $tqr3
 ELSE qte
                end),prixu=(case
            when `produit`='".$test[0]."' then $xz 
            when `produit`='".$test1[0]."' then $xz1
  when `produit`='".$test2[0]."' then $xz2
when `produit`='".$test3[0]."' then $xz3
 ELSE prixu
                end),vstock=(case
            when `produit`='".$test[0]."' then $v
            when `produit`='".$test1[0]."' then $v1
            when `produit`='".$test2[0]."' then $v2
            when `produit`='".$test3[0]."' then $v3
 ELSE vstock
                end) ";
        
        
            }else{
                if($row['cont']>=1 && $row['produit']==$test[0]){
                    $quz = "DELETE FROM stock WHERE `produit`='".$test[0]."'  ";
                    
                    $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test[0]',$tqr,$xz,$v,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test1[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test1[0]."'";
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test1[0]',$tqr1,$xz1,$v1,'".$row['cont']."')";
                        
                }else
                    if($row['cont']>=1 && $row['produit']==$test2[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test2[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test2[0]',$tqr2,$xz2,$v2,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test3[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test3[0]."'";
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test3[0]',$tqr3,$xz3,$v3,'".$row['cont']."')";
                        
                }
                
            }
            $rett = mysqli_query($conn, $quary);
        }
        $resg = mysqli_query($conn, $quag);
        
        
        
        $prixv=$prixu-$_POST['m'];
        $t=$prixv*$qte;
        
        $prixv1=$prixu1-$_POST['m1'];
        $t1=$prixv1*$qte1;
        
        $prixv2=$prixu2-$_POST['m2'];
        $t2=$prixv2*$qte2;
        
        $prixv3=$prixu3-$_POST['m3'];
        $t3=$prixv3*$qte3;
        
        
        $quar="INSERT INTO `rapport`(`date`, `produit`, `qt`, `prixv`,total,bon, `nom`, `prix`, prixm)
VALUES ('$y','$test[0]',$qte,$prixv,$t,$c,'$nomf',".$_POST['m'].",$prixu),
('$y','$test1[0]',$qte1,$prixv1,$t1,$c,'$nomf',".$_POST['m1'].",$prixu1),
('$y','$test2[0]',$qte2,$prixv2,$t2,$c,'$nomf',".$_POST['m2'].",$prixu2),
('$y','$test3[0]',$qte3,$prixv3,$t3,$c,'$nomf',".$_POST['m3'].",$prixu3)

 ";
        $qu="INSERT INTO `venbon`(`date`, `produit`, `qt`, `prixv`,bon)
VALUES ('$y','$test[0]',$qte,$prixu,$c),
('$y','$test1[0]',$qte1,$prixu1,$c),
('$y','$test2[0]',$qte2,$prixu2,$c),
('$y','$test3[0]',$qte3,$prixu3,$c)

 ";
        $re = mysqli_query($conn, $qu);
        $resul = mysqli_query($conn, $quar);
        
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
       
        
        
        $test = preg_split ("/\./",$code);
        $qr =$_POST['qr'];
        $pr=$_POST['pr'];
        $qr =$_POST['qr'];
        $pr=$_POST['pr'];
        $tqr=($qqq-$qte);
        $xz=$_POST['m'];
        $v=(($qqq-$qte)*$_POST['m']);
        
        $test1 = preg_split ("/\./",$code1);
        $qr1 =$_POST['qr1'];
        $pr1=$_POST['pr1'];
        $tqr1=($qqq1-$qte1);
        $xz1=$_POST['m1'];
        $v1=(($qqq1-$qte1)*$_POST['m1']);
        
        $test2 = preg_split ("/\./",$code2);
        $qr2 =$_POST['qr2'];
        $pr2=$_POST['pr2'];
        $tqr2=($qqq2-$qte2);
        $xz2=$_POST['m2'];
        $v2=(($qqq2-$qte2)*$_POST['m2']);
        
        $test3 = preg_split ("/\./",$code3);
        $qr3 =$_POST['qr3'];
        $pr3=$_POST['pr3'];
        $tqr3=($qqq3-$qte3);
        $xz3=$_POST['m3'];
        $v3=(($qqq3-$qte3)*$_POST['m3']);
        
        $test4 = preg_split ("/\./",$code4);
        $qr4 =$_POST['qr4'];
        $pr4=$_POST['pr4'];
        $tqr4=($qqq4-$qte4);
        $xz4=$_POST['m4'];
        $v4=(($qqq4-$qte4)*$_POST['m4']);
        
        $quaryy="INSERT INTO `vente`( `bon`, `date`, `nom`, `total`, `avance`, `reste`)
        VALUES ('$c','$date','$nomf',$totalt,$avance,$Reste) ";
        
        
        $quag = "SELECT count(produit)as cont ,bon,produit FROM `stock` where produit='".$test[0]."' or produit='".$test1[0]."'
or produit='".$test2[0]."'or produit='".$test3[0]."'or produit='".$test4[0]."' group by produit   ";
        $resg = mysqli_query($conn, $quag);
        if (! $result) {
            die("error");
        }
        while ($row = mysqli_fetch_assoc($resg)) {
            
            if($row['cont']==1){
        $quary="UPDATE stock SET
            qte=(case
            when `produit`='".$test[0]."' then $tqr
            when `produit`='".$test1[0]."' then $tqr1
             when `produit`='".$test2[0]."' then $tqr2
                when `produit`='".$test3[0]."' then $tqr3
 when `produit`='".$test4[0]."' then $tqr4
 ELSE qte
                end),prixu=(case
            when `produit`='".$test[0]."' then $xz 
            when `produit`='".$test1[0]."' then $xz1
  when `produit`='".$test2[0]."' then $xz2
when `produit`='".$test3[0]."' then $xz3
when `produit`='".$test4[0]."' then $xz4
 ELSE prixu
                end),vstock=(case
            when `produit`='".$test[0]."' then $v
            when `produit`='".$test1[0]."' then $v1
            when `produit`='".$test2[0]."' then $v2
            when `produit`='".$test3[0]."' then $v3
    when `produit`='".$test4[0]."' then $v4
 ELSE vstock
                end) ";
        
        
        
            }else{
                if($row['cont']>=1 && $row['produit']==$test[0]){
                    $quz = "DELETE FROM stock WHERE `produit`='".$test[0]."'  ";
                    
                    $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test[0]',$tqr,$xz,$v,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test1[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test1[0]."'";
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test1[0]',$tqr1,$xz1,$v1,'".$row['cont']."')";
                        
                }else
                    if($row['cont']>=1 && $row['produit']==$test2[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test2[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test2[0]',$tqr2,$xz2,$v2,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test3[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test3[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test3[0]',$tqr3,$xz3,$v3,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test4[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test4[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test4[0]',$tqr4,$xz4,$v4,'".$row['cont']."')";
                }
            }
            $rett = mysqli_query($conn, $quary);
        }
        $resg = mysqli_query($conn, $quag);
        
        $prixv=$prixu-$_POST['m'];
        $t=$prixv*$qte;
        
        $prixv1=$prixu1-$_POST['m1'];
        $t1=$prixv1*$qte1;
        
        $prixv2=$prixu2-$_POST['m2'];
        $t2=$prixv2*$qte2;
        
        $prixv3=$prixu3-$_POST['m3'];
        $t3=$prixv3*$qte3;
        
        $prixv4=$prixu4-$_POST['m4'];
        $t4=$prixv4*$qte4;
        
       
        
        $quar="INSERT INTO `rapport`(`date`, `produit`, `qt`, `prixv`,total,bon, `nom`, `prix`, prixm)
VALUES ('$y','$test[0]',$qte,$prixv,$t,$c,'$nomf',".$_POST['m'].",$prixu),
('$y','$test1[0]',$qte1,$prixv1,$t1,$c,'$nomf',".$_POST['m1'].",$prixu1),
('$y','$test2[0]',$qte2,$prixv2,$t2,$c,'$nomf',".$_POST['m2'].",$prixu2),
('$y','$test3[0]',$qte3,$prixv3,$t3,$c,'$nomf',".$_POST['m3'].",$prixu3),
'$y','$test4[0]',$qte4,$prixv4,$t4,$c,'$nomf',".$_POST['m4'].",$prixu4)

 ";
        
        $qu="INSERT INTO `venbon`(`date`, `produit`, `qt`, `prixv`,bon)
VALUES ('$y','$test[0]',$qte,$prixu,$c),
('$y','$test1[0]',$qte1,$prixu1,$c),
('$y','$test2[0]',$qte2,$prixu2,$c),
('$y','$test3[0]',$qte3,$prixu3,$c),
'$y','$test4[0]',$qte4,$prixu4,$c)

 ";
        $re = mysqli_query($conn, $qu);
        $resul = mysqli_query($conn, $quar);
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
       
        
        
        $test = preg_split ("/\./",$code);
        $qr =$_POST['qr'];
        $pr=$_POST['pr'];
        $tqr=($qqq-$qte);
        $xz=$_POST['m'];
        $v=(($qqq-$qte)*$_POST['m']);
        
        $test1 = preg_split ("/\./",$code1);
        $qr1 =$_POST['qr1'];
        $pr1=$_POST['pr1'];
        $tqr1=($qqq1-$qte1);
        $xz1=$_POST['m1'];
        $v1=(($qqq1-$qte1)*$_POST['m1']);
        
        $test2 = preg_split ("/\./",$code2);
        $qr2 =$_POST['qr2'];
        $pr2=$_POST['pr2'];
        $tqr2=($qqq2-$qte2);
        $xz2=$_POST['m2'];
        $v2=(($qqq2-$qte2)*$_POST['m2']);
        
        $test3 = preg_split ("/\./",$code3);
        $qr3 =$_POST['qr3'];
        $pr3=$_POST['pr3'];
        $tqr3=($qqq3-$qte3);
        $xz3=$_POST['m3'];
        $v3=(($qqq3-$qte3)*$_POST['m3']);
        
        $test4 = preg_split ("/\./",$code4);
        $qr4 =$_POST['qr4'];
        $pr4=$_POST['pr4'];
        $tqr4=($qqq4-$qte4);
        $xz4=$_POST['m4'];
        $v4=(($qqq4-$qte4)*$_POST['m4']);
        
        $test5 = preg_split ("/\./",$code5);
        $qr5 =$_POST['qr5'];
        $pr5=$_POST['pr5'];
        $tqr5=($qqq5-$qte5);
        $xz5=$_POST['m5'];
        $v5=(($qqq5-$qte5)*$_POST['m5']);
        
        $quaryy="INSERT INTO `vente`( `bon`, `date`, `nom`, `total`, `avance`, `reste`)
        VALUES ('$c','$date','$nomf',$totalt,$avance,$Reste) ";
        
        
        
        $quag = "SELECT count(produit)as cont ,bon,produit FROM `stock` where produit='".$test[0]."' or produit='".$test1[0]."'
or produit='".$test2[0]."'or produit='".$test3[0]."'or produit='".$test4[0]."'or produit='".$test5[0]."' group by produit   ";
        $resg = mysqli_query($conn, $quag);
        if (! $result) {
            die("error");
        }
        while ($row = mysqli_fetch_assoc($resg)) {
            
            if($row['cont']==1){
        $quary="UPDATE stock SET
            qte=(case
            when `produit`='".$test[0]."' then $tqr
            when `produit`='".$test1[0]."' then $tqr1
             when `produit`='".$test2[0]."' then $tqr2
                when `produit`='".$test3[0]."' then $tqr3
 when `produit`='".$test4[0]."' then $tqr4
 when `produit`='".$test5[0]."' then $tqr5
 ELSE qte
                end),prixu=(case
            when `produit`='".$test[0]."' then $xz 
            when `produit`='".$test1[0]."' then $xz1
  when `produit`='".$test2[0]."' then $xz2
when `produit`='".$test3[0]."' then $xz3
when `produit`='".$test4[0]."' then $xz4
when `produit`='".$test5[0]."' then $xz5
 ELSE prixu
                end),vstock=(case
            when `produit`='".$test[0]."' then $v
            when `produit`='".$test1[0]."' then $v1
            when `produit`='".$test2[0]."' then $v2
            when `produit`='".$test3[0]."' then $v3
    when `produit`='".$test4[0]."' then $v4
    when `produit`='".$test5[0]."' then $v5
 ELSE vstock
                end) ";
        
        
            }else{
                if($row['cont']>=1 && $row['produit']==$test[0]){
                    $quz = "DELETE FROM stock WHERE `produit`='".$test[0]."'  ";
                    
                    $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test[0]',$tqr,$xz,$v,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test1[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test1[0]."'";
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test1[0]',$tqr1,$xz1,$v1,'".$row['cont']."')";
                        
                }else
                    if($row['cont']>=1 && $row['produit']==$test2[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test2[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test2[0]',$tqr2,$xz2,$v2,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test3[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test3[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test3[0]',$tqr3,$xz3,$v3,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test4[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test4[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test4[0]',$tqr4,$xz4,$v4,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test5[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test5[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test5[0]',$tqr5,$xz5,$v5,'".$row['cont']."')";
                }
            }
            $rett = mysqli_query($conn, $quary);
        }
        $resg = mysqli_query($conn, $quag);
        
        
        
        $prixv=$prixu-$_POST['m'];
        $t=$prixv*$qte;
        
        $prixv1=$prixu1-$_POST['m1'];
        $t1=$prixv1*$qte1;
        
        $prixv2=$prixu2-$_POST['m2'];
        $t2=$prixv2*$qte2;
        
        $prixv3=$prixu3-$_POST['m3'];
        $t3=$prixv3*$qte3;
        
        $prixv4=$prixu4-$_POST['m4'];
        $t4=$prixv4*$qte4;
        
        $prixv5=$prixu5-$_POST['m5'];
        $t5=$prixv5*$qte5;
        
      
        
       
        
        $quar="INSERT INTO `rapport`(`date`, `produit`, `qt`, `prixv`,total,bon, `nom`, `prix`, prixm)
VALUES ('$y','$test[0]',$qte,$prixv,$t,$c,'$nomf',".$_POST['m'].",$prixu),
('$y','$test1[0]',$qte1,$prixv1,$t1,$c,'$nomf',".$_POST['m1'].",$prixu1),
('$y','$test2[0]',$qte2,$prixv2,$t2,$c,'$nomf',".$_POST['m2'].",$prixu2),
('$y','$test3[0]',$qte3,$prixv3,$t3,$c,'$nomf',".$_POST['m3'].",$prixu3),
('$y','$test4[0]',$qte4,$prixv4,$t4,$c,'$nomf',".$_POST['m4'].",$prixu4),
'$y','$test5[0]',$qte5,$prixv5,$t5,$c,'$nomf',".$_POST['m5'].",$prixu5)

 ";
        
        $qu="INSERT INTO `venbon`(`date`, `produit`, `qt`, `prixv`,bon)
VALUES ('$y','$test[0]',$qte,$prixu,$c),
('$y','$test1[0]',$qte1,$prixu1,$c),
('$y','$test2[0]',$qte2,$prixu2,$c),
('$y','$test3[0]',$qte3,$prixu3,$c),
('$y','$test4[0]',$qte4,$prixu4,$c),
'$y','$test5[0]',$qte5,$prixu5,$c)

 ";
        $re = mysqli_query($conn, $qu);
        $resul = mysqli_query($conn, $quar);
        
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
       
        
        $test = preg_split ("/\./",$code);
        $qr =$_POST['qr'];
        $pr=$_POST['pr'];
        $tqr=($qqq-$qte);
        $xz=$_POST['m'];
        $v=(($qqq-$qte)*$_POST['m']);
        
        $test1 = preg_split ("/\./",$code1);
        $qr1 =$_POST['qr1'];
        $pr1=$_POST['pr1'];
        $tqr1=($qqq1-$qte1);
        $xz1=$_POST['m1'];
        $v1=(($qqq1-$qte1)*$_POST['m1']);
        
        $test2 = preg_split ("/\./",$code2);
        $qr2 =$_POST['qr2'];
        $pr2=$_POST['pr2'];
        $tqr2=($qqq2-$qte2);
        $xz2=$_POST['m2'];
        $v2=(($qqq2-$qte2)*$_POST['m2']);
        
        $test3 = preg_split ("/\./",$code3);
        $qr3 =$_POST['qr3'];
        $pr3=$_POST['pr3'];
        $tqr3=($qqq3-$qte3);
        $xz3=$_POST['m3'];
        $v3=(($qqq3-$qte3)*$_POST['m3']);
        
        $test4 = preg_split ("/\./",$code4);
        $qr4 =$_POST['qr4'];
        $pr4=$_POST['pr4'];
        $tqr4=($qqq4-$qte4);
        $xz4=$_POST['m4'];
        $v4=(($qqq4-$qte4)*$_POST['m4']);
        
        $test5 = preg_split ("/\./",$code5);
        $qr5 =$_POST['qr5'];
        $pr5=$_POST['pr5'];
        $tqr5=($qqq5-$qte5);
        $xz5=$_POST['m5'];
        $v5=(($qqq5-$qte5)*$_POST['m5']);
        
        $test6 = preg_split ("/\./",$code6);
        $qr6 =$_POST['qr6'];
        $pr6=$_POST['pr6'];
        $tqr6=($qqq6-$qte6);
        $xz6=$_POST['m6'];
        $v6=(($qqq6-$qte6)*$_POST['m6']);
        
        $quaryy="INSERT INTO `vente`( `bon`, `date`, `nom`, `total`, `avance`, `reste`)
        VALUES ('$c','$date','$nomf',$totalt,$avance,$Reste) ";
        
        $quag = "SELECT count(produit)as cont ,bon,produit FROM `stock` where produit='".$test[0]."' or produit='".$test1[0]."'
or produit='".$test2[0]."'or produit='".$test3[0]."'or produit='".$test4[0]."'or produit='".$test5[0]."'
 or produit='".$test6[0]."' group by produit   ";
        $resg = mysqli_query($conn, $quag);
        if (! $result) {
            die("error");
        }
        while ($row = mysqli_fetch_assoc($resg)) {
            
            if($row['cont']==1){
        $quary="UPDATE stock SET
            qte=(case
            when `produit`='".$test[0]."' then $tqr
            when `produit`='".$test1[0]."' then $tqr1
             when `produit`='".$test2[0]."' then $tqr2
                when `produit`='".$test3[0]."' then $tqr3
 when `produit`='".$test4[0]."' then $tqr4
 when `produit`='".$test5[0]."' then $tqr5
 when `produit`='".$test6[0]."' then $tqr6
 ELSE qte
                end),prixu=(case
            when `produit`='".$test[0]."' then $xz 
            when `produit`='".$test1[0]."' then $xz1
  when `produit`='".$test2[0]."' then $xz2
when `produit`='".$test3[0]."' then $xz3
when `produit`='".$test4[0]."' then $xz4
when `produit`='".$test5[0]."' then $xz5
when `produit`='".$test6[0]."' then $xz6
 ELSE prixu
                end),vstock=(case
            when `produit`='".$test[0]."' then $v
            when `produit`='".$test1[0]."' then $v1
            when `produit`='".$test2[0]."' then $v2
            when `produit`='".$test3[0]."' then $v3
    when `produit`='".$test4[0]."' then $v4
    when `produit`='".$test5[0]."' then $v5
   when `produit`='".$test6[0]."' then $v6
 ELSE vstock
                end) ";
        
        
            }else{
                if($row['cont']>=1 && $row['produit']==$test[0]){
                    $quz = "DELETE FROM stock WHERE `produit`='".$test[0]."'  ";
                    
                    $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test[0]',$tqr,$xz,$v,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test1[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test1[0]."'";
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test1[0]',$tqr1,$xz1,$v1,'".$row['cont']."')";
                        
                }else
                    if($row['cont']>=1 && $row['produit']==$test2[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test2[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test2[0]',$tqr2,$xz2,$v2,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test3[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test3[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test3[0]',$tqr3,$xz3,$v3,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test4[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test4[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test4[0]',$tqr4,$xz4,$v4,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test5[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test5[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test5[0]',$tqr5,$xz5,$v5,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test6[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test6[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test6[0]',$tqr6,$xz6,$v6,'".$row['cont']."')";
                }
            }
            $rett = mysqli_query($conn, $quary);
        }
        $resg = mysqli_query($conn, $quag);
        
        $prixv=$prixu-$_POST['m'];
        $t=$prixv*$qte;
        
        $prixv1=$prixu1-$_POST['m1'];
        $t1=$prixv1*$qte1;
        
        $prixv2=$prixu2-$_POST['m2'];
        $t2=$prixv2*$qte2;
        
        $prixv3=$prixu3-$_POST['m3'];
        $t3=$prixv3*$qte3;
        
        $prixv4=$prixu4-$_POST['m4'];
        $t4=$prixv4*$qte4;
        
        $prixv5=$prixu5-$_POST['m5'];
        $t5=$prixv5*$qte5;
        
        $prixv6=$prixu6-$_POST['m6'];
        $t6=$prixv6*$qte6;
        
   
        
        $quar="INSERT INTO `rapport`(`date`, `produit`, `qt`, `prixv`,total,bon, `nom`, `prix`, prixm)
VALUES ('$y','$test[0]',$qte,$prixv,$t,$c,'$nomf',".$_POST['m'].",$prixu),
('$y','$test1[0]',$qte1,$prixv1,$t1,$c,'$nomf',".$_POST['m1'].",$prixu1),
('$y','$test2[0]',$qte2,$prixv2,$t2,$c,'$nomf',".$_POST['m2'].",$prixu2),
('$y','$test3[0]',$qte3,$prixv3,$t3,$c,'$nomf',".$_POST['m3'].",$prixu3),
('$y','$test4[0]',$qte4,$prixv4,$t4,$c,'$nomf',".$_POST['m4'].",$prixu4),
('$y','$test5[0]',$qte5,$prixv5,$t5,$c,'$nomf',".$_POST['m5'].",$prixu5),
'$y','$test6[0]',$qte6,$prixv6,$t6,$c,'$nomf',".$_POST['m6'].",$prixu6)

 ";      $qu="INSERT INTO `venbon`(`date`, `produit`, `qt`, `prixv`,bon)
VALUES ('$y','$test[0]',$qte,$prixu,$c),
('$y','$test1[0]',$qte1,$prixu1,$c),
('$y','$test2[0]',$qte2,$prixu2,$c),
('$y','$test3[0]',$qte3,$prixu3,$c),
('$y','$test4[0]',$qte4,$prixu4,$c),
('$y','$test5[0]',$qte5,$prixu5,$c),
'$y','$test6[0]',$qte6,$prixu6,$c)

 ";
        $re = mysqli_query($conn, $qu);
        $resul = mysqli_query($conn, $quar);
        
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
       
 
        $test = preg_split ("/\./",$code);
        $qr =$_POST['qr'];
        $pr=$_POST['pr'];
        $tqr=($qqq-$qte);
        $xz=$_POST['m'];
        $v=(($qqq-$qte)*$_POST['m']);
        
        $test1 = preg_split ("/\./",$code1);
        $qr1 =$_POST['qr1'];
        $pr1=$_POST['pr1'];
        $tqr1=($qqq1-$qte1);
        $xz1=$_POST['m1'];
        $v1=(($qqq1-$qte1)*$_POST['m1']);
        
        $test2 = preg_split ("/\./",$code2);
        $qr2 =$_POST['qr2'];
        $pr2=$_POST['pr2'];
        $tqr2=($qqq2-$qte2);
        $xz2=$_POST['m2'];
        $v2=(($qqq2-$qte2)*$_POST['m2']);
        
        $test3 = preg_split ("/\./",$code3);
        $qr3 =$_POST['qr3'];
        $pr3=$_POST['pr3'];
        $tqr3=($qqq3-$qte3);
        $xz3=$_POST['m3'];
        $v3=(($qqq3-$qte3)*$_POST['m3']);
        
        $test4 = preg_split ("/\./",$code4);
        $qr4 =$_POST['qr4'];
        $pr4=$_POST['pr4'];
        $tqr4=($qqq4-$qte4);
        $xz4=$_POST['m4'];
        $v4=(($qqq4-$qte4)*$_POST['m4']);
        
        $test5 = preg_split ("/\./",$code5);
        $qr5 =$_POST['qr5'];
        $pr5=$_POST['pr5'];
        $tqr5=($qqq5-$qte5);
        $xz5=$_POST['m5'];
        $v5=(($qqq5-$qte5)*$_POST['m5']);
        
        $test6 = preg_split ("/\./",$code6);
        $qr6 =$_POST['qr6'];
        $pr6=$_POST['pr6'];
        $tqr6=($qqq6-$qte6);
        $xz6=$_POST['m6'];
        $v6=(($qqq6-$qte6)*$_POST['m6']);
        
        $test7 = preg_split ("/\./",$code7);
        $qr7 =$_POST['qr7'];
        $pr7=$_POST['pr7'];
        $tqr7=($qqq7-$qte7);
        $xz7=$_POST['m7'];
        $v7=(($qqq7-$qte7)*$_POST['m7']);
        
        $quaryy="INSERT INTO `vente`( `bon`, `date`, `nom`, `total`, `avance`, `reste`)
        VALUES ('$c','$date','$nomf',$totalt,$avance,$Reste) ";
        
        $quag = "SELECT count(produit)as cont ,bon,produit FROM `stock` where produit='".$test[0]."' or produit='".$test1[0]."'
or produit='".$test2[0]."'or produit='".$test3[0]."'or produit='".$test4[0]."'or produit='".$test5[0]."'
 or produit='".$test6[0]."' or produit='".$test6[0]."'or produit='".$test7[0]."' group by produit   ";
        $resg = mysqli_query($conn, $quag);
        if (! $result) {
            die("error");
        }
        while ($row = mysqli_fetch_assoc($resg)) {
            
            if($row['cont']==1){
        $quary="UPDATE stock SET
            qte=(case
            when `produit`='".$test[0]."' then $tqr
            when `produit`='".$test1[0]."' then $tqr1
             when `produit`='".$test2[0]."' then $tqr2
                when `produit`='".$test3[0]."' then $tqr3
 when `produit`='".$test4[0]."' then $tqr4
 when `produit`='".$test5[0]."' then $tqr5
 when `produit`='".$test6[0]."' then $tqr6
 when `produit`='".$test7[0]."' then $tqr7
 ELSE qte
                end),prixu=(case
            when `produit`='".$test[0]."' then $xz 
            when `produit`='".$test1[0]."' then $xz1
  when `produit`='".$test2[0]."' then $xz2
when `produit`='".$test3[0]."' then $xz3
when `produit`='".$test4[0]."' then $xz4
when `produit`='".$test5[0]."' then $xz5
when `produit`='".$test6[0]."' then $xz6
when `produit`='".$test7[0]."' then $xz7
 ELSE prixu
                end),vstock=(case
            when `produit`='".$test[0]."' then $v
            when `produit`='".$test1[0]."' then $v1
            when `produit`='".$test2[0]."' then $v2
            when `produit`='".$test3[0]."' then $v3
    when `produit`='".$test4[0]."' then $v4
    when `produit`='".$test5[0]."' then $v5
   when `produit`='".$test6[0]."' then $v6
  when `produit`='".$test7[0]."' then $v7
 ELSE vstock
                end) ";
        
        
            }else{
                if($row['cont']>=1 && $row['produit']==$test[0]){
                    $quz = "DELETE FROM stock WHERE `produit`='".$test[0]."'  ";
                    
                    $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test[0]',$tqr,$xz,$v,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test1[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test1[0]."'";
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test1[0]',$tqr1,$xz1,$v1,'".$row['cont']."')";
                        
                }else
                    if($row['cont']>=1 && $row['produit']==$test2[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test2[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test2[0]',$tqr2,$xz2,$v2,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test3[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test3[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test3[0]',$tqr3,$xz3,$v3,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test4[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test4[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test4[0]',$tqr4,$xz4,$v4,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test5[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test5[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test5[0]',$tqr5,$xz5,$v5,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test6[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test6[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test6[0]',$tqr6,$xz6,$v6,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test7[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test7[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test7[0]',$tqr7,$xz7,$v7,'".$row['cont']."')";
                }
            }
            $rett = mysqli_query($conn, $quary);
        }
        $resg = mysqli_query($conn, $quag);
        
        
        
        $prixv=$prixu-$_POST['m'];
        $t=$prixv*$qte;
        
        $prixv1=$prixu1-$_POST['m1'];
        $t1=$prixv1*$qte1;
        
        $prixv2=$prixu2-$_POST['m2'];
        $t2=$prixv2*$qte2;
        
        $prixv3=$prixu3-$_POST['m3'];
        $t3=$prixv3*$qte3;
        
        $prixv4=$prixu4-$_POST['m4'];
        $t4=$prixv4*$qte4;
        
        $prixv5=$prixu5-$_POST['m5'];
        $t5=$prixv5*$qte5;
        
        $prixv6=$prixu6-$_POST['m6'];
        $t6=$prixv6*$qte6;
        
        $prixv7=$prixu7-$_POST['m7'];
        $t7=$prixv7*$qte7;
    
        
        $quar="INSERT INTO `rapport`(`date`, `produit`, `qt`, `prixv`,total,bon, `nom`, `prix`, prixm)
VALUES ('$y','$test[0]',$qte,$prixv,$t,$c,'$nomf',".$_POST['m'].",$prixu),
('$y','$test1[0]',$qte1,$prixv1,$t1,$c,'$nomf',".$_POST['m1'].",$prixu1),
('$y','$test2[0]',$qte2,$prixv2,$t2,$c,'$nomf',".$_POST['m2'].",$prixu2),
('$y','$test3[0]',$qte3,$prixv3,$t3,$c,'$nomf',".$_POST['m3'].",$prixu3),
('$y','$test4[0]',$qte4,$prixv4,$t4,$c,'$nomf',".$_POST['m4'].",$prixu4),
('$y','$test5[0]',$qte5,$prixv5,$t5,$c,'$nomf',".$_POST['m5'].",$prixu5),
('$y','$test6[0]',$qte6,$prixv6,$t6,$c,'$nomf',".$_POST['m6'].",$prixu6),
'$y','$test7[0]',$qte7,$prixv7,$t7,$c,'$nomf',".$_POST['m7'].",$prixu7)

 ";
        $qu="INSERT INTO `venbon`(`date`, `produit`, `qt`, `prixv`,bon)
VALUES ('$y','$test[0]',$qte,$prixu,$c),
('$y','$test1[0]',$qte1,$prixu1,$c),
('$y','$test2[0]',$qte2,$prixu2,$c),
('$y','$test3[0]',$qte3,$prixu3,$c),
('$y','$test4[0]',$qte4,$prixu4,$c),
('$y','$test5[0]',$qte5,$prixu5,$c),
('$y','$test6[0]',$qte6,$prixu6,$c),
'$y','$test7[0]',$qte7,$prixu7,$c)

 ";
        $re = mysqli_query($conn, $qu);
        $resul = mysqli_query($conn, $quar);
        
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
       
        
        $test = preg_split ("/\./",$code);
        $qr =$_POST['qr'];
        $pr=$_POST['pr'];
        $tqr=($qqq-$qte);
        $xz=$_POST['m'];
        $v=(($qqq-$qte)*$_POST['m']);
        
        $test1 = preg_split ("/\./",$code1);
        $qr1 =$_POST['qr1'];
        $pr1=$_POST['pr1'];
        $tqr1=($qqq1-$qte1);
        $xz1=$_POST['m1'];
        $v1=(($qqq1-$qte1)*$_POST['m1']);
        
        $test2 = preg_split ("/\./",$code2);
        $qr2 =$_POST['qr2'];
        $pr2=$_POST['pr2'];
        $tqr2=($qqq2-$qte2);
        $xz2=$_POST['m2'];
        $v2=(($qqq2-$qte2)*$_POST['m2']);
        
        $test3 = preg_split ("/\./",$code3);
        $qr3 =$_POST['qr3'];
        $pr3=$_POST['pr3'];
        $tqr3=($qqq3-$qte3);
        $xz3=$_POST['m3'];
        $v3=(($qqq3-$qte3)*$_POST['m3']);
        
        $test4 = preg_split ("/\./",$code4);
        $qr4 =$_POST['qr4'];
        $pr4=$_POST['pr4'];
        $tqr4=($qqq4-$qte4);
        $xz4=$_POST['m4'];
        $v4=(($qqq4-$qte4)*$_POST['m4']);
        
        $test5 = preg_split ("/\./",$code5);
        $qr5 =$_POST['qr5'];
        $pr5=$_POST['pr5'];
        $tqr5=($qqq5-$qte5);
        $xz5=$_POST['m5'];
        $v5=(($qqq5-$qte5)*$_POST['m5']);
        
        $test6 = preg_split ("/\./",$code6);
        $qr6 =$_POST['qr6'];
        $pr6=$_POST['pr6'];
        $tqr6=($qqq6-$qte6);
        $xz6=$_POST['m6'];
        $v6=(($qqq6-$qte6)*$_POST['m6']);
        
        $test7 = preg_split ("/\./",$code7);
        $qr7 =$_POST['qr7'];
        $pr7=$_POST['pr7'];
        $tqr7=($qqq7-$qte7);
        $xz7=$_POST['m7'];
        $v7=(($qqq7-$qte7)*$_POST['m7']);
        
        $test8 = preg_split ("/\./",$code8);
        $qr8 =$_POST['qr8'];
        $pr8=$_POST['pr8'];
        $tqr8=($qqq8-$qte8);
        $xz8=$_POST['m8'];
        $v8=(($qqq8-$qte8)*$_POST['m8']);
        
        $quaryy="INSERT INTO `vente`( `bon`, `date`, `nom`, `total`, `avance`, `reste`)
        VALUES ('$c','$date','$nomf',$totalt,$avance,$Reste) ";
        
        $quag = "SELECT count(produit)as cont ,bon,produit FROM `stock` where produit='".$test[0]."' or produit='".$test1[0]."'
or produit='".$test2[0]."'or produit='".$test3[0]."'or produit='".$test4[0]."'or produit='".$test5[0]."'
 or produit='".$test6[0]."'or produit='".$test7[0]."' or produit='".$test8[0]."' group by produit   ";
        $resg = mysqli_query($conn, $quag);
        if (! $result) {
            die("error");
        }
        while ($row = mysqli_fetch_assoc($resg)) {
            
            if($row['cont']==1){
        $quary="UPDATE stock SET
            qte=(case
            when `produit`='".$test[0]."' then $tqr
            when `produit`='".$test1[0]."' then $tqr1
             when `produit`='".$test2[0]."' then $tqr2
                when `produit`='".$test3[0]."' then $tqr3
 when `produit`='".$test4[0]."' then $tqr4
 when `produit`='".$test5[0]."' then $tqr5
 when `produit`='".$test6[0]."' then $tqr6
 when `produit`='".$test7[0]."' then $tqr7
 when `produit`='".$test8[0]."' then $tqr8
 ELSE qte
                end),prixu=(case
            when `produit`='".$test[0]."' then $xz 
            when `produit`='".$test1[0]."' then $xz1
  when `produit`='".$test2[0]."' then $xz2
when `produit`='".$test3[0]."' then $xz3
when `produit`='".$test4[0]."' then $xz4
when `produit`='".$test5[0]."' then $xz5
when `produit`='".$test6[0]."' then $xz6
when `produit`='".$test7[0]."' then $xz7
when `produit`='".$test8[0]."' then $xz8
 ELSE prixu
                end),vstock=(case
            when `produit`='".$test[0]."' then $v
            when `produit`='".$test1[0]."' then $v1
            when `produit`='".$test2[0]."' then $v2
            when `produit`='".$test3[0]."' then $v3
    when `produit`='".$test4[0]."' then $v4
    when `produit`='".$test5[0]."' then $v5
   when `produit`='".$test6[0]."' then $v6
  when `produit`='".$test7[0]."' then $v7
  when `produit`='".$test8[0]."' then $v8
 ELSE vstock
                end) ";
        
        
            }else{
                if($row['cont']>=1 && $row['produit']==$test[0]){
                    $quz = "DELETE FROM stock WHERE `produit`='".$test[0]."'  ";
                    
                    $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test[0]',$tqr,$xz,$v,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test1[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test1[0]."'";
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test1[0]',$tqr1,$xz1,$v1,'".$row['cont']."')";
                        
                }else
                    if($row['cont']>=1 && $row['produit']==$test2[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test2[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test2[0]',$tqr2,$xz2,$v2,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test3[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test3[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test3[0]',$tqr3,$xz3,$v3,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test4[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test4[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test4[0]',$tqr4,$xz4,$v4,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test5[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test5[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test5[0]',$tqr5,$xz5,$v5,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test6[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test6[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test6[0]',$tqr6,$xz6,$v6,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test7[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test7[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test7[0]',$tqr7,$xz7,$v7,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test8[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test8[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test8[0]',$tqr8,$xz8,$v8,'".$row['cont']."')";
                }
            }
            $rett = mysqli_query($conn, $quary);
        }
        $resg = mysqli_query($conn, $quag);
        
        
        $prixv=$prixu-$_POST['m'];
        $t=$prixv*$qte;
        
        $prixv1=$prixu1-$_POST['m1'];
        $t1=$prixv1*$qte1;
        
        $prixv2=$prixu2-$_POST['m2'];
        $t2=$prixv2*$qte2;
        
        $prixv3=$prixu3-$_POST['m3'];
        $t3=$prixv3*$qte3;
        
        $prixv4=$prixu4-$_POST['m4'];
        $t4=$prixv4*$qte4;
        
        $prixv5=$prixu5-$_POST['m5'];
        $t5=$prixv5*$qte5;
        
        $prixv6=$prixu6-$_POST['m6'];
        $t6=$prixv6*$qte6;
        
        $prixv7=$prixu7-$_POST['m7'];
        $t7=$prixv7*$qte7;
        
        $prixv8=$prixu8-$_POST['m8'];
        $t8=$prixv8*$qte8;
    
        
        $quar="INSERT INTO `rapport`(`date`, `produit`, `qt`, `prixv`,total,bon, `nom`, `prix`, prixm)
VALUES ('$y','$test[0]',$qte,$prixv,$t,$c,'$nomf',".$_POST['m'].",$prixu),
('$y','$test1[0]',$qte1,$prixv1,$t1,$c,'$nomf',".$_POST['m1'].",$prixu1),
('$y','$test2[0]',$qte2,$prixv2,$t2,$c,'$nomf',".$_POST['m2'].",$prixu2),
('$y','$test3[0]',$qte3,$prixv3,$t3,$c,'$nomf',".$_POST['m3'].",$prixu3),
('$y','$test4[0]',$qte4,$prixv4,$t4,$c,'$nomf',".$_POST['m4'].",$prixu4),
('$y','$test5[0]',$qte5,$prixv5,$t5,$c,'$nomf',".$_POST['m5'].",$prixu5),
('$y','$test6[0]',$qte6,$prixv6,$t6,$c,'$nomf',".$_POST['m6'].",$prixu6),
('$y','$test7[0]',$qte7,$prixv7,$t7,$c,'$nomf',".$_POST['m7'].",$prixu7),
'$y','$test8[0]',$qte8,$prixv8,$t8,$c,'$nomf',".$_POST['m8'].",$prixu8)

 ";
        $qu="INSERT INTO `venbon`(`date`, `produit`, `qt`, `prixv`,bon)
VALUES ('$y','$test[0]',$qte,$prixu,$c),
('$y','$test1[0]',$qte1,$prixu1,$c),
('$y','$test2[0]',$qte2,$prixu2,$c),
('$y','$test3[0]',$qte3,$prixu3,$c),
('$y','$test4[0]',$qte4,$prixu4,$c),
('$y','$test5[0]',$qte5,$prixu5,$c),
('$y','$test6[0]',$qte6,$prixu6,$c),
('$y','$test7[0]',$qte7,$prixu7,$c),
'$y','$test8[0]',$qte8,$prixu8,$c)

 ";
        $re = mysqli_query($conn, $qu);
        $resul = mysqli_query($conn, $quar);
        
        
        
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
        $a="0";
        $b="0";
       
        $test = preg_split ("/\./",$code);
        $qr =$_POST['qr'];
        $pr=$_POST['pr'];
        $tqr=($qqq-$qte);
        $xz=$_POST['m'];
        $v=(($qqq-$qte)*$_POST['m']);
        
        $test1 = preg_split ("/\./",$code1);
        $qr1 =$_POST['qr1'];
        $pr1=$_POST['pr1'];
        $tqr1=($qqq1-$qte1);
        $xz1=$_POST['m1'];
        $v1=(($qqq1-$qte1)*$_POST['m1']);
        
        $test2 = preg_split ("/\./",$code2);
        $qr2 =$_POST['qr2'];
        $pr2=$_POST['pr2'];
        $tqr2=($qqq2-$qte2);
        $xz2=$_POST['m2'];
        $v2=(($qqq2-$qte2)*$_POST['m2']);
        
        $test3 = preg_split ("/\./",$code3);
        $qr3 =$_POST['qr3'];
        $pr3=$_POST['pr3'];
        $tqr3=($qqq3-$qte3);
        $xz3=$_POST['m3'];
        $v3=(($qqq3-$qte3)*$_POST['m3']);
        
        $test4 = preg_split ("/\./",$code4);
        $qr4 =$_POST['qr4'];
        $pr4=$_POST['pr4'];
        $tqr4=($qqq4-$qte4);
        $xz4=$_POST['m4'];
        $v4=(($qqq4-$qte4)*$_POST['m4']);
        
        $test5 = preg_split ("/\./",$code5);
        $qr5 =$_POST['qr5'];
        $pr5=$_POST['pr5'];
        $tqr5=($qqq5-$qte5);
        $xz5=$_POST['m5'];
        $v5=(($qqq5-$qte5)*$_POST['m5']);
        
        $test6 = preg_split ("/\./",$code6);
        $qr6 =$_POST['qr6'];
        $pr6=$_POST['pr6'];
        $tqr6=($qqq6-$qte6);
        $xz6=$_POST['m6'];
        $v6=(($qqq6-$qte6)*$_POST['m6']);
        
        $test7 = preg_split ("/\./",$code7);
        $qr7 =$_POST['qr7'];
        $pr7=$_POST['pr7'];
        $tqr7=($qqq7-$qte7);
        $xz7=$_POST['m7'];
        $v7=(($qqq7-$qte7)*$_POST['m7']);
        
        $test8 = preg_split ("/\./",$code8);
        $qr8 =$_POST['qr8'];
        $pr8=$_POST['pr8'];
        $tqr8=($qqq8-$qte8);
        $xz8=$_POST['m8'];
        $v8=(($qqq8-$qte8)*$_POST['m8']);
        
        $test9 = preg_split ("/\./",$code9);
        $qr9 =$_POST['qr9'];
        $pr9=$_POST['pr9'];
        $tqr9=($qqq9-$qte9);
        $xz9=$_POST['m9'];
        $v9=(($qqq9-$qte9)*$_POST['m9']);
        
        $quaryy="INSERT INTO `vente`( `bon`, `date`, `nom`, `total`, `avance`, `reste`)
        VALUES ('$c','$date','$nomf',$totalt,$avance,$Reste) ";
        
        $quag = "SELECT count(produit)as cont ,bon,produit FROM `stock` where produit='".$test[0]."' or produit='".$test1[0]."'
or produit='".$test2[0]."'or produit='".$test3[0]."'or produit='".$test4[0]."'or produit='".$test5[0]."'
 or produit='".$test6[0]."' or produit='".$test7[0]."' or produit='".$test8[0]."' or produit='".$test9[0]."' group by produit   ";
        $resg = mysqli_query($conn, $quag);
        if (! $result) {
            die("error");
        }
        while ($row = mysqli_fetch_assoc($resg)) {
            
            if($row['cont']==1){
        $quary="UPDATE stock SET
            qte=(case
            when `produit`='".$test[0]."' then $tqr
            when `produit`='".$test1[0]."' then $tqr1
             when `produit`='".$test2[0]."' then $tqr2
                when `produit`='".$test3[0]."' then $tqr3
 when `produit`='".$test4[0]."' then $tqr4
 when `produit`='".$test5[0]."' then $tqr5
 when `produit`='".$test6[0]."' then $tqr6
 when `produit`='".$test7[0]."' then $tqr7
 when `produit`='".$test8[0]."' then $tqr8
 when `produit`='".$test9[0]."' then $tqr9
 ELSE qte
                end),prixu=(case
            when `produit`='".$test[0]."' then $xz 
            when `produit`='".$test1[0]."' then $xz1
  when `produit`='".$test2[0]."' then $xz2
when `produit`='".$test3[0]."' then $xz3
when `produit`='".$test4[0]."' then $xz4
when `produit`='".$test5[0]."' then $xz5
when `produit`='".$test6[0]."' then $xz6
when `produit`='".$test7[0]."' then $xz7
when `produit`='".$test8[0]."' then $xz8
when `produit`='".$test9[0]."' then $xz9
 ELSE prixu
                end),vstock=(case
            when `produit`='".$test[0]."' then $v
            when `produit`='".$test1[0]."' then $v1
            when `produit`='".$test2[0]."' then $v2
            when `produit`='".$test3[0]."' then $v3
    when `produit`='".$test4[0]."' then $v4
    when `produit`='".$test5[0]."' then $v5
   when `produit`='".$test6[0]."' then $v6
  when `produit`='".$test7[0]."' then $v7
  when `produit`='".$test8[0]."' then $v8
  when `produit`='".$test9[0]."' then $v9
 ELSE vstock
                end) ";
        
        
        
            }else{
                if($row['cont']>=1 && $row['produit']==$test[0]){
                    $quz = "DELETE FROM stock WHERE `produit`='".$test[0]."'  ";
                    
                    $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test[0]',$tqr,$xz,$v,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test1[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test1[0]."'";
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test1[0]',$tqr1,$xz1,$v1,'".$row['cont']."')";
                        
                }else
                    if($row['cont']>=1 && $row['produit']==$test2[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test2[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test2[0]',$tqr2,$xz2,$v2,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test3[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test3[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test3[0]',$tqr3,$xz3,$v3,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test4[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test4[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test4[0]',$tqr4,$xz4,$v4,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test5[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test5[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test5[0]',$tqr5,$xz5,$v5,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test6[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test6[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test6[0]',$tqr6,$xz6,$v6,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test7[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test7[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test7[0]',$tqr7,$xz7,$v7,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test8[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test8[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test8[0]',$tqr8,$xz8,$v8,'".$row['cont']."')";
                }else
                    if($row['cont']>=1 && $row['produit']==$test9[0]){
                        $quz = "DELETE FROM stock WHERE `produit`='".$test9[0]."'  ";
                        
                        $quary="INSERT INTO `stock`(`produit`, `qte`, `prixu`, `vstock`,bon)
                VALUES ('$test9[0]',$tqr9,$xz9,$v9,'".$row['cont']."')";
                }
            }
            $rett = mysqli_query($conn, $quary);
        }
        $resg = mysqli_query($conn, $quag);
        
        
        
        
        
        $prixv=$prixu-$_POST['m'];
        $t=$prixv*$qte;
        
        $prixv1=$prixu1-$_POST['m1'];
        $t1=$prixv1*$qte1;
        
        $prixv2=$prixu2-$_POST['m2'];
        $t2=$prixv2*$qte2;
        
        $prixv3=$prixu3-$_POST['m3'];
        $t3=$prixv3*$qte3;
        
        $prixv4=$prixu4-$_POST['m4'];
        $t4=$prixv4*$qte4;
        
        $prixv5=$prixu5-$_POST['m5'];
        $t5=$prixv5*$qte5;
        
        $prixv6=$prixu6-$_POST['m6'];
        $t6=$prixv6*$qte6;
        
        $prixv7=$prixu7-$_POST['m7'];
        $t7=$prixv7*$qte7;
        
        $prixv8=$prixu8-$_POST['m8'];
        $t8=$prixv8*$qte8;
        
        $prixv9=$prixu9-$_POST['m9'];
        $t9=$prixv9*$qte9;
        
        $quar="INSERT INTO `rapport`(`date`, `produit`, `qt`, `prixv`,total,bon, `nom`, `prix`, prixm)
VALUES ('$y','$test[0]',$qte,$prixv,$t,$c,'$nomf',".$_POST['m'].",$prixu),
('$y','$test1[0]',$qte1,$prixv1,$t1,$c,'$nomf',".$_POST['m1'].",$prixu1),
('$y','$test2[0]',$qte2,$prixv2,$t2,$c,'$nomf',".$_POST['m2'].",$prixu2),
('$y','$test3[0]',$qte3,$prixv3,$t3,$c,'$nomf',".$_POST['m3'].",$prixu3),
('$y','$test4[0]',$qte4,$prixv4,$t4,$c,'$nomf',".$_POST['m4'].",$prixu4),
('$y','$test5[0]',$qte5,$prixv5,$t5,$c,'$nomf',".$_POST['m5'].",$prixu5),
('$y','$test6[0]',$qte6,$prixv6,$t6,$c,'$nomf',".$_POST['m6'].",$prixu6),
('$y','$test7[0]',$qte7,$prixv7,$t7,$c,'$nomf',".$_POST['m7'].",$prixu7),
('$y','$test8[0]',$qte8,$prixv8,$t8,$c,'$nomf',".$_POST['m8'].",$prixu8),
('$y','$test9[0]',$qte9,$prixv9,$t9,$c,'$nomf',".$_POST['m9'].",$prixu9)

 ";
        $qu="INSERT INTO `venbon`(`date`, `produit`, `qt`, `prixv`,bon)
uALUES ('$y','$test[0]',$qte,$prixu,$c),
('$y','$test1[0]',$qte1,$prixu1,$c),
('$y','$test2[0]',$qte2,$prixu2,$c),
('$y','$test3[0]',$qte3,$prixu3,$c),
('$y','$test4[0]',$qte4,$prixu4,$c),
('$y','$test5[0]',$qte5,$prixu5,$c),
('$y','$test6[0]',$qte6,$prixu6,$c),
('$y','$test7[0]',$qte7,$prixu7,$c),
('$y','$test8[0]',$qte8,$prixu8,$c),
('$y','$test9[0]',$qte9,$prixu9,$c)

 ";
 $re = mysqli_query($conn, $qu);
        $resul = mysqli_query($conn, $quar);
        
        
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
