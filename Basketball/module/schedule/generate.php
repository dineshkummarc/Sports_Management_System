<?php


$schedule = new schedule();
    
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
        $schedule->MATCHCODE = $MATCHCODE;
        $schedule->TOURID   = $TOURID;
        $schedule->CATEGORYID = $CATEGORYID;
        $schedule->VENUECODE = $key1;
        $schedule->TOURNAME = $TOURNAME;
        $schedule->TEAMID = $value;
        $Scheduleistrue = $schedule->create();  
        if ($Scheduleistrue == true) {
            $auto = new Autocode();
                      $oldcode = $auto->single_Autocode('MATCH');
                      $auto->NEXTNO = $oldcode->NEXTNO + 1;
            $autoistrue = $auto->update("MATCH");
                   if ($autoistrue == true){
                    
                    message("New Match [". $TOURNAME ."] has been created successfully!", "success");
                    redirect('index.php');
                    }else{
                    message("No Venue has been created successfully!", "error");
                    redirect('index.php');
                   }
          }else{
          message("No Venue has been created successfully!", "error");
          redirect('index.php');
         }
       }

      }
    }


function scheduler($teams){
  // Check for even number or add a bye
  if (count($teams)%2 != 0){
    array_push($teams,"bi");
  }
  // Splitting the teams array into two arrays
  $away = array_splice($teams,(count($teams)/2));
  $home = $teams;
  // The actual scheduling based on round robin
  for ($i=0; $i < count($home)+count($away)-1; $i++){
    for ($j=0; $j<count($home); $j++){
      $round[$i][$j]["Home"]=$home[$j];
      $round[$i][$j]["Away"]=$away[$j];
    }
    // Check if total numbers of teams is > 2 otherwise shifting the arrays is not neccesary
    if(count($home)+count($away)-1 > 2){
      $array_splice = array_splice($home,1,1);
      array_unshift($away,array_shift($array_splice));
      array_push($home,array_pop($away));
    }
  }
  return $round;
}
// $venue = array("4-5 PM","5-6 PM","6-7 PM");
//$members[] = $_POST['team_'];
$members = array();
//$count =0;
$query = "SELECT t.TEAMNAME FROM tblmatchschedule s,tblteams t WHERE t.TEAMID = s.TEAMID AND s.MATCHCODE = '".$_POST['MATCHCODE']."' GROUP BY s.TEAMID";
  $mydb->setQuery($query);
  $results = $mydb->loadResultList();
  foreach ($results as $result) {

 $members[] = $result->TEAMNAME;
  } 

//foreach($_POST as $key => $value) {
   //   $pos = strpos($key , "teams_");
     // if ($pos === 0){
      //  $members[] = $value;
        //print_r($members);
     // }else{ 
//
      //}
     // }
//$members = implode(" OR ",$memberss);

$all_games = array();
$storage = array();
$schedule = scheduler($members);

function add(&$arr1, $arr2) {
  foreach ($arr2 as $a2) {
    if(!in_array($a2, $arr1)) {
      $arr1[] = $a2;
    }
  }
}
                    
foreach($schedule AS $round => $games){
  //echo "Round: ".($round+1)."<br>";
  foreach($games AS $play){
    $home = $play["Home"];
    $away = $play["Away"];
    
                          
    //echo $home." [VS] ".$away."<br>";
   // if ($home != "bye" and $away != "bye") {
    //  $game = "(".$home." - ".$away.")";
    //  $storage[$home][] = $game;
    //  $storage[$away][] = $game;
    //  add($storage[$home],$storage[$away]);
   //   add($storage[$away],$storage[$home]);
   //   $all_games[] = $game;
   // }

$SingleSched = new SingleSchedule();


        $SingleSched->MATCHCODE = $_POST['MATCHCODE'];
        $SingleSched->HOME   = $home;
        $SingleSched->AWAY = $away;
        $SingleSched->ROUND = ($round+1);
       // $SingleSched->DATE = $_POST['venue'];
       // $SingleSched->TIMERANGE = $_POST['time'];
        $SingleSchedistrue = $SingleSched->create();  
        
                   if ($SingleSchedistrue == true){
                    redirect('index.php?view=viewround&MATCHCODE='.$_POST['MATCHCODE'].'');
                    }else{
                    redirect('index.php?view=viewround&MATCHCODE='.$_POST['MATCHCODE'].'');
                   }

  }
  echo "\n";
}
?>  