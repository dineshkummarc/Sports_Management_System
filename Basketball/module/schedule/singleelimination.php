<?php
require_once("../../include/initialize.php");
$schedule = new Schedule();
    
$MATCHCODE = $_POST['MATCHCODE'];
$TOURID = $_POST['TOURTYPE'];
$CATEGORYID = $_POST['CATEGORYID'];
//$VENUECODE = $_POST['VENUECODE'];
$TOURNAME = $_POST['TOURNAME'];

        $res = $schedule->find_all_schedule($MATCHCODE);
    // insert labtestrequest
    foreach($_POST as $key => $value) {
      foreach($_POST['venue'] as $key1) {
      $pos = strpos($key , "teams");
      if ($pos === 0){
        // do something with $value
        $schedule->VENUECODE = $key1;
        $schedule->MATCHCODE = $MATCHCODE;
        $schedule->TOURID   = $TOURID;
        $schedule->CATEGORYID = $CATEGORYID;
        $schedule->TOURNAME = $TOURNAME;
        $schedule->TEAMID = $value;
      
        $Scheduleistrue = $schedule->create();  
        if ($Scheduleistrue == true) {
            $auto = new Autocode();
                      $oldcode = $auto->single_Autocode('MATCH');
                      $auto->NEXTNO = $oldcode->NEXTNO + 1;
            $autoistrue = $auto->update("MATCH");
          }else{
          message("No Venue has been created successfully!", "error");
          redirect('index.php');
         }
           }

      }
    }

$query = "SELECT t.TEAMNAME FROM tblmatchschedule s,tblteams t WHERE t.TEAMID = s.TEAMID AND s.MATCHCODE = '".$_POST['MATCHCODE']."' GROUP BY s.TEAMID";
  $mydb->setQuery($query);
  $results = $mydb->loadResultList();
  foreach ($results as $result) {

 $players[] = $result->TEAMNAME;
  }    
    //$players = array('d','f','g','w','s');
    $count = count($players);
    $numberOfRounds = log($count / 2, 2);
    if (count($players)%2 != 0){
    array_push($players,"bi");
    }
    // Order players.
    for ($i = 0; $i < $numberOfRounds; $i++) {
        $out = array();
        $splice = pow(2, $i); 

        while (count($players) > 0) {

            $out = array_merge($out, array_splice($players, 0, $splice));
            $out = array_merge($out, array_splice($players, -$splice));

        }            

        $players = $out;
    }
    $Tournament = new Tournament();
    $type = $Tournament->single_Tournament($_POST['TOURTYPE']);
    
    // Print match list.
$pla = count($players)/2;
 $co = 1;
 for ($a = 1; $a <= $pla;$a) {
    for ($i = 0; $i < $count; $i++) {
      //if

      $home  = $players[$i];
      $away = $players[++$i];

$SingleSched = new SingleSchedule();


        $SingleSched->MATCHCODE = $_POST['MATCHCODE'];
        $SingleSched->HOME   = $home;
        $SingleSched->AWAY = $away;
        $SingleSched->ROUND = $a++;
       // $SingleSched->DATE = $_POST['venue'];
       // $SingleSched->TIMERANGE = $_POST['time'];
        $SingleSchedistrue = $SingleSched->create();  
        
                   if ($SingleSchedistrue == true){
                    redirect('index.php?view=viewsing&MATCHCODE='.$_POST['MATCHCODE'].'');
                    }else{
                    redirect('index.php?view=viewsing&MATCHCODE='.$_POST['MATCHCODE'].'');
                   }
         
}
      }

          ?>