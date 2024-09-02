<?php
require_once('../../include/initialize.php');
if(isset($_POST['saveRResult'])){

/*$query1 ="SELECT * FROM `tblsinglematchschedule` WHERE SMATCHID = '".$SMATCHID."'";
    $up = $mydb->setQuery($query1);
    $results1 = $mydb->num_rows($up);

  if($WIN==$results1->HOME){
    $loss = $results1->AWAY;
  }else{
    $loss = $results1->HOME;
  }*/

  $Resulta = new Result();

  $MATCHCODE = $_POST['MATCHCODE'];
  $SMATCHID = $_POST['SMATCHID'];
  $WIN = $_POST['WIN'];
  //$RESULTDATE = ;
    $Resulta->MATCHCODE = $MATCHCODE;
    $Resulta->SMATCHID = $SMATCHID;
    $Resulta->WIN = $WIN;
    $Resulta->LOSS = $loss;

    $true = $Resulta->create();

    $update ="UPDATE `tblsinglematchschedule` SET STATUS = 'FINISHED' WHERE SMATCHID = '".$SMATCHID."'";
    $mydb->setQuery($update);

    if ($true == true){
      redirect('index.php?view=viewround&MATCHCODE='.$_POST['MATCHCODE'].'');

    }else{
      redirect('index.php?view=viewround&MATCHCODE='.$_POST['MATCHCODE'].'');
    }
  }
  ?>