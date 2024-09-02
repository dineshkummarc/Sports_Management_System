<?php
$tournament = new Tournament();
$tour = $tournament->single_Tournament($_GET['TOURID']);
//$queryy = "SELECT * FROM tblmatchschedule WHERE MATCHCODE='".$_GET['MATCHCODE']."' GROUP BY MATCHCODE";
                          //$mydb->setQuery($queryy);
                          //$resultss = $mydb->loadSingleResult();
if($tour->TOURTYPE=='SINGLE ELIMINATION'){
  redirect('index.php?view=printsingle&MATCHCODE='.$_GET['MATCHCODE'].'&TOURNAME='.$_GET['TOURNAME'].'');
 
}else if($tour->TOURTYPE=='DOUBLE ELIMINATION'){
  //redirect('double.php');
  redirect('index.php?view=printdouble&MATCHCODE='.$_GET['MATCHCODE'].'&TOURNAME='.$_GET['TOURNAME'].'');
}else{
redirect('index.php?view=printround&MATCHCODE='.$_GET['MATCHCODE'].'&TOURNAME='.$_GET['TOURNAME'].'');
}
?>