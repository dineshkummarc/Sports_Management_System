<?php
$tournament = new Tournament();
$tour = $tournament->single_Tournament($_GET['TOURID']);
//$queryy = "SELECT * FROM tblmatchschedule WHERE MATCHCODE='".$_GET['MATCHCODE']."' GROUP BY MATCHCODE";
                          //$mydb->setQuery($queryy);
                          //$resultss = $mydb->loadSingleResult();
if($tour->TOURTYPE=='SINGLE ELIMINATION'){
  redirect('index.php?view=viewsing&MATCHCODE='.$_GET['MATCHCODE'].'');
 
}else if($tour->TOURTYPE=='DOUBLE ELIMINATION'){
  //redirect('double.php');
  redirect('index.php?view=viewdouble&MATCHCODE='.$_GET['MATCHCODE'].'');
}else{
redirect('index.php?view=viewround&MATCHCODE='.$_GET['MATCHCODE'].'');
}
?>