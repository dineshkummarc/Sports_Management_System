
    <div class="card-body">
    <h1>Single Round Robin Matches:</h1>
    <h3>Match Code: <i><?php echo $_GET['MATCHCODE']; ?></i></h3>
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Home</th>
                    <th>VS</th>
                    <th>Visitor</th>
                    <th>Game</th>
                    <th>Venue</th>
                    <th>Date</th>
                    <th>Time Range</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php

 $query = "SELECT * FROM `tblsinglematchschedule` WHERE MATCHCODE = '".$_GET['MATCHCODE']."'";
  $mydb->setQuery($query);
  $results = $mydb->loadResultList();
 foreach($results AS $resultt){
    echo "<tr>";
     echo '<td class="bg-info">'.$resultt->HOME.'</td>';
    echo '<td class="bg-gray">VS</td>';
    echo '<td class="bg-warning">'.$resultt->AWAY.'</td>';
    if($resultt->STATUS == 'SCHEDULED'){
    echo '<td class="bg-gray">'.$resultt->ROUND.'</td>';
    echo '<td class="bg-gray">'.$resultt->VENUE.'</td>';
    echo '<td class="bg-gray">'.$resultt->DATE.'</td>';
    echo '<td class="bg-gray">'.$resultt->TIMERANGE.'</td>';
    echo '<td class="bg-gray">'.$resultt->STATUS.'</td>';
    }else if ($resultt->STATUS == 'RESCHEDULED') {
    echo '<td class="bg-orange">'.$resultt->ROUND.'</td>';
    echo '<td class="bg-orange">'.$resultt->VENUE.'</td>';
    echo '<td class="bg-orange">'.$resultt->DATE.'</td>';
    echo '<td class="bg-orange">'.$resultt->TIMERANGE.'</td>';
    echo '<td class="bg-orange">'.$resultt->STATUS.'</td>';
  }elseif ($resultt->STATUS=='FINISHED') {
    echo '<td class="bg-success">'.$resultt->ROUND.'</td>';
    echo '<td class="bg-success">'.$resultt->VENUE.'</td>';
    echo '<td class="bg-success">'.$resultt->DATE.'</td>';
    echo '<td class="bg-success">'.$resultt->TIMERANGE.'</td>';
    echo '<td class="bg-success">'.$resultt->STATUS.'</td>';
    }else{
    echo '<td>'.$resultt->ROUND.'</td>';
    echo '<td>'.$resultt->VENUE.'</td>';
    echo '<td>'.$resultt->DATE.'</td>';
    echo '<td>'.$resultt->TIMERANGE.'</td>';
    echo '<td>'.$resultt->STATUS.'</td>';
  }
  ?>
<?php
                          //$query = "SELECT m.MATCHCODE, v.VENUECODE, v.VENUENAME FROM tblmatchschedule m, tblvenue v WHERE v.VENUECODE = m.VENUECODE AND v.VENUESTATUS='AVAILABLE' AND m.MATCHCODE = '".$_GET['MATCHCODE']."'  GROUP BY v.VENUECODE";
                         // $mydb->setQuery($query);
                          //$results = $mydb->loadResultList();
                          //
                          //<td>
                          //<select name="venue">
                            
                          //foreach ($results as $result) {
                          //  echo '
                            
                            //<option value="'.$result->VENUECODE.'">'.$result->VENUENAME.'</option>
                            
                            
                            
                           

                         // ';
                         // }
                         // '</select>';
                      //  '</td>';
//echo '<td>';
 //if($co<=$a
  
          //  echo "".$resultt->ROUND."";                                  
                   
                                              
//'</td>';
//echo $_REQUEST['venueid'];
/*echo '<td>';
                          $query = "SELECT m.MATCHCODE, v.AVAILABLETIME, v.VENUESTATUS FROM tblmatchschedule m, tblvenue v WHERE v.VENUECODE = m.VENUECODE AND v.VENUESTATUS='AVAILABLE' AND m.MATCHCODE = '".$_GET['MATCHCODE']."'  GROUP BY AVAILABLETIME";
                          $mydb->setQuery($query);
                          $results = $mydb->loadResultList();
                          ?>
                          <select name="time">
                            <?php
                          foreach ($results as $result) {
                            echo '
                            
                            <option value="'.$result->AVAILABLETIME.'">'.$result->AVAILABLETIME.'</option>
                            
                            
                            
                           

                          ';
                          }
                          '</select>'; */
                           if($resultt->HOME=='bi' || $resultt->AWAY=='bi'){
                            echo '<td><i style="color:orange">Waiting For Another Round</i></td>';
                          }elseif ($resultt->STATUS=='SCHEDULED' || $resultt->STATUS=='RESCHEDULED') {
                           echo '<td><button type="button" class="btn btn-sm btn-warning fa fa-edit fw-fa" data-toggle="modal" data-target="#modal-warning'.$resultt->SMATCHID.'">Edit Schedule</button>';
                           echo " ";
                           echo '<button type="button" class="btn btn-sm btn-info fa fa-edit fw-fa" data-toggle="modal" data-target="#modal-info'.$resultt->SMATCHID.'">Game Result</button></td>';
                         }elseif($resultt->STATUS=='FINISHED'){
                          echo'<td><button type="button" class="btn btn-sm btn-secondary fa fa-eye fw-fa" data-toggle="modal" data-target="#modal-secondary'.$resultt->SMATCHID.'">View Result</button></td>';
                           }else{
                         

                          echo '<td><button type="button" class="btn btn-sm btn-success fa fa-edit fw-fa" data-toggle="modal" data-target="#modal-success1'.$resultt->SMATCHID.'">Add Schedule</button></td>';
                        }
                          ?>
                          <div class="modal fade" id="modal-success1<?php echo $resultt->SMATCHID;?>">
        <div class="modal-dialog">
          <div class="modal-content bg-success">
          <form action="#" method="POST">
            <div class="modal-header">
              <h4 class="modal-title"><i style="color: yellow"><?php echo $resultt->HOME."<i style='color: #000'> VS </i>".$resultt->AWAY; ?></i></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="row">
                    <input type="hidden" value="<?php echo $resultt->SMATCHID;?>" name="SMATCHID">
                    <div class="col-sm-12">
                      <div class="form-group">
                       <label for="name"  class="col-form-label col-form-label-sm">Match Date</label>
                        <input type="date" class="form-control form-control-sm" name="DATE" required>
                      </div>
                    </div>
                    <?php
                   $query = "SELECT m.MATCHCODE,v.VENUEID, v.VENUECODE, v.VENUENAME FROM tblmatchschedule m, tblvenue v WHERE v.VENUECODE = m.VENUECODE AND v.VENUESTATUS='AVAILABLE' AND m.MATCHCODE = '".$_GET['MATCHCODE']."'  GROUP BY v.VENUECODE";
                          $mydb->setQuery($query);
                          $results = $mydb->loadResultList();

                          ?>
                    <div class="col-sm-12">
                      <div class="form-group">
                       <label for="name"  class="col-form-label col-form-label-sm">Venue</label>
                          <select name="VENUE" class="form-control">
                            <?php
                          foreach ($results as $result) {
                            echo '
                            
                            <option value="'.$result->VENUENAME.'">'.$result->VENUENAME.'</option>';
                          }?>
                         </select>
                       </div>
                     </div>
                     <?php
                   $query1 ="SELECT m.MATCHCODE,v.VENUEID, v.AVAILABLETIME, v.VENUESTATUS FROM tblmatchschedule m, tblvenue v WHERE v.VENUECODE = m.VENUECODE AND v.VENUESTATUS='AVAILABLE' AND m.MATCHCODE = '".$_GET['MATCHCODE']."'  GROUP BY AVAILABLETIME";
                          $mydb->setQuery($query1);
                          $results1 = $mydb->loadResultList();
                          ?>
                    <div class="col-sm-12">
                      <div class="form-group">
                       <label for="name"  class="col-form-label col-form-label-sm">Time Range</label>
                       <?php
                          foreach ($results1 as $res) {
                            ?>
                            <input type="hidden" name="VENUEID" value="<?php echo $res->VENUEID;?>">
                            <?php
                          }?>
                          <select name="TIMERANGE" class="form-control">
                            <?php
                          foreach ($results1 as $result1) {
                            echo '
                            
                            <option value="'.$result1->AVAILABLETIME.'">'.$result1->AVAILABLETIME.'</option>
                          ';
                          }?>
                         </select>
                       </div>
                     </div>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" name="saveSingle1" class="btn btn-outline-light">Save changes</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


      <div class="modal fade" id="modal-warning<?php echo $resultt->SMATCHID;?>">
        <div class="modal-dialog">
          <div class="modal-content bg-warning">
          <form action="#" method="POST">
            <div class="modal-header">
              <h4 class="modal-title"><i style="color: green"><?php echo $resultt->HOME."<i style='color: #000'> VS </i>".$resultt->AWAY; ?></i></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="row">
                    <input type="hidden" value="<?php echo $resultt->SMATCHID;?>" name="SMATCHID">
                    <div class="col-sm-12">
                      <div class="form-group">
                       <label for="name"  class="col-form-label col-form-label-sm">Match Date</label>
                        <input type="date" class="form-control form-control-sm" name="DATE" required>
                      </div>
                    </div>
                    <?php
                   $query = "SELECT m.MATCHCODE,v.VENUEID, v.VENUECODE, v.VENUENAME FROM tblmatchschedule m, tblvenue v WHERE v.VENUECODE = m.VENUECODE AND v.VENUESTATUS='AVAILABLE' AND m.MATCHCODE = '".$_GET['MATCHCODE']."'  GROUP BY v.VENUECODE";
                          $mydb->setQuery($query);
                          $results = $mydb->loadResultList();

                          ?>
                    <div class="col-sm-12">
                      <div class="form-group">
                       <label for="name"  class="col-form-label col-form-label-sm">Venue</label>
                          <select name="VENUE" class="form-control">
                            <?php
                          foreach ($results as $result) {
                            echo '
                            
                            <option value="'.$result->VENUENAME.'">'.$result->VENUENAME.'</option>';
                          }?>
                         </select>
                       </div>
                     </div>
                     <?php
                   $query1 ="SELECT m.MATCHCODE,v.VENUEID, v.AVAILABLETIME, v.VENUESTATUS FROM tblmatchschedule m, tblvenue v WHERE v.VENUECODE = m.VENUECODE AND v.VENUESTATUS='AVAILABLE' AND m.MATCHCODE = '".$_GET['MATCHCODE']."'  GROUP BY AVAILABLETIME";
                          $mydb->setQuery($query1);
                          $results1 = $mydb->loadResultList();
                          ?>
                    <div class="col-sm-12">
                      <div class="form-group">
                       <label for="name"  class="col-form-label col-form-label-sm">Time Range</label>
                       <?php
                          foreach ($results1 as $res) {
                            ?>
                            <input type="hidden" name="VENUEID" value="<?php echo $res->VENUEID;?>">
                            <?php
                          }?>
                          <select name="TIMERANGE" class="form-control">
                            <?php
                          foreach ($results1 as $result1) {
                            echo '
                            
                            <option value="'.$result1->AVAILABLETIME.'">'.$result1->AVAILABLETIME.'</option>
                          ';
                          }?>
                         </select>
                       </div>
                     </div>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" name="updateSingle1" class="btn btn-outline-light">Save changes</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


      <div class="modal fade" id="modal-info<?php echo $resultt->SMATCHID;?>">
        <div class="modal-dialog">
          <div class="modal-content bg-info">
          <form action="#" method="POST">
            <div class="modal-header">
              <h4 class="modal-title"><i style="color: yellow"><?php echo $resultt->HOME."<i style='color: #000'> VS </i>".$resultt->AWAY; ?></i></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="row">
                    <input type="hidden" value="<?php echo $resultt->SMATCHID;?>" name="SMATCHID">
                    <input type="hidden" value="<?php echo $_GET['MATCHCODE'];?>" name="MATCHCODE">
                    <div class="col-sm-12">
                      <div class="form-group">
                       <label for="name"  class="col-form-label col-form-label-sm">Select Winner</label>
                       <?php
                       $SingleSchedule = new SingleSchedule();
                            $single = $SingleSchedule->single_Schedule($resultt->SMATCHID);
                          ?>
                        <select name="WIN" class="form-control">
                            <?php
                          
                            echo '
                            
                            <option value="'.$single->HOME.'">'.$single->HOME.'</option>
                            <option value="'.$single->AWAY.'">'.$single->AWAY.'</option>';
                          ?>
                         </select>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" name="saveRResult" class="btn btn-outline-light">Save changes</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="modal-secondary<?php echo $resultt->SMATCHID;?>">
        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
          <form action="#" method="POST">
            <div class="modal-header">
              <h4 class="modal-title"><i style="color: yellow"><?php echo $resultt->HOME."<i style='color: #000'> VS </i>".$resultt->AWAY; ?></i></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <?php
            $Result = new Result();
            $rest = $Result->single_Result($resultt->SMATCHID);
              ?>
            <div class="modal-body">
              <div class="row">
                    <input type="hidden" value="<?php echo $resultt->SMATCHID;?>" name="SMATCHID">
                    <input type="hidden" value="<?php echo $_GET['MATCHCODE'];?>" name="MATCHCODE">
                    <div class="col-sm-12">
                      <div class="form-group">
                       <label for="name"  class="col-form-label col-form-label-sm">Winner</label>
                      <input type="text" class="form-control bg-success" readonly value="<?php echo $rest->WIN;?>" name="WIN">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                       <label for="name"  class="col-form-label col-form-label-sm">Losser</label>
                      <input type="text" class="form-control bg-danger" readonly value="<?php echo $rest->LOSS;?>" name="LOSS">
                      </div>
                    </div>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" name="saveRResult" class="btn btn-outline-light">Save changes</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
                          <?php
                                                
    echo "</tr>";

        //printf('%s vs %s<br />%s', $players[$i], $players[++$i], PHP_EOL);
    

?>
<?php
    }
?>
 </tbody>
                  
                </table>
          </div>
          <?php
//require_once("../../include/config.php");
//require_once("../../include/initialize.php");
if (isset($_POST['saveSingle1'])) {

$query1 ="SELECT * FROM `tblsinglematchschedule` WHERE '".$_POST['DATE']."' IN (SELECT DATE FROM `tblsinglematchschedule`) AND '".$_POST['VENUE']."' IN (SELECT VENUE FROM `tblsinglematchschedule`) AND '".$_POST['TIMERANGE']."' IN (SELECT TIMERANGE FROM `tblsinglematchschedule`) AND DATE = '".$_POST['DATE']."' AND VENUE='".$_POST['VENUE']."' AND TIMERANGE='".$_POST['TIMERANGE']."'";
$res = $mydb->setQuery($query1);
$num_rows = $mydb->num_rows($res);
if($num_rows>0){
  ?>
  <script>
    alert('Date and Timerange Are Already Assigned!');
  </script>
  <?php
  redirect('index.php?view=viewround&MATCHCODE='.$_GET['MATCHCODE'].'');
}else{

    $SingleSchedule = new SingleSchedule(); 
    $SMATCHID = $_POST['SMATCHID'];
    $DATE = $_POST['DATE'];
    $VENUE = $_POST['VENUE'];
    $TIMERANGE = $_POST['TIMERANGE'];

    $SingleSchedule->DATE = $DATE;
    $SingleSchedule->VENUE = $VENUE;
    $SingleSchedule->TIMERANGE = $TIMERANGE;
    $SingleSchedule->STATUS = 'SCHEDULED';

    $istrue = $SingleSchedule->update($SMATCHID); 

    //$query1 ="UPDATE `tblvenue` SET VENUESTATUS = 'SCHEDULED' WHERE AVAILABLETIME = '".$TIMERANGE."'";
                        //  $mydb->setQuery($query1);
                          //$results1 = $mydb->update();

    if ($istrue == true){
      redirect('index.php?view=viewround&MATCHCODE='.$_GET['MATCHCODE'].'');

    }else{
      redirect('index.php?view=viewround&MATCHCODE='.$_GET['MATCHCODE'].'');
    }
    }
  }


  if (isset($_POST['updateSingle1'])) {

$query1 ="SELECT * FROM `tblsinglematchschedule` WHERE '".$_POST['DATE']."' IN (SELECT DATE FROM `tblsinglematchschedule`) AND '".$_POST['VENUE']."' IN (SELECT VENUE FROM `tblsinglematchschedule`) AND '".$_POST['TIMERANGE']."' IN (SELECT TIMERANGE FROM `tblsinglematchschedule`) AND DATE = '".$_POST['DATE']."' AND VENUE='".$_POST['VENUE']."' AND TIMERANGE='".$_POST['TIMERANGE']."' AND SMATCHID != '".$_POST['SMATCHID']."'";
$res = $mydb->setQuery($query1);
$num_rows = $mydb->num_rows($res);
if($num_rows>0){
  ?>
  <script>
    alert('Date and Timerange Are Already Assigned!');
  </script>
  <?php
  redirect('index.php?view=viewround&MATCHCODE='.$_GET['MATCHCODE'].'');
}else{

    $SingleSchedule = new SingleSchedule(); 
    $SMATCHID = $_POST['SMATCHID'];
    $DATE = $_POST['DATE'];
    $VENUE = $_POST['VENUE'];
    $TIMERANGE = $_POST['TIMERANGE'];

    $SingleSchedule->DATE = $DATE;
    $SingleSchedule->VENUE = $VENUE;
    $SingleSchedule->TIMERANGE = $TIMERANGE;
    $SingleSchedule->STATUS = 'RESCHEDULED';

    $istrue = $SingleSchedule->update($SMATCHID); 

    //$query1 ="UPDATE `tblvenue` SET VENUESTATUS = 'SCHEDULED' WHERE AVAILABLETIME = '".$TIMERANGE."'";
                        //  $mydb->setQuery($query1);
                          //$results1 = $mydb->update();

    if ($istrue == true){
      redirect('index.php?view=viewround&MATCHCODE='.$_GET['MATCHCODE'].'');

    }else{
      redirect('index.php?view=viewround&MATCHCODE='.$_GET['MATCHCODE'].'');
    }
    }
  }

  //require_once('../../include/initialize.php');
if(isset($_POST['saveRResult'])){

$Single = new SingleSchedule();
$results1 = $Single->single_Schedule($_POST['SMATCHID']);

  if($_POST['WIN']==$results1->HOME){
    $loss = $results1->AWAY;
  }else{
    $loss = $results1->HOME;
  }

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
      redirect('index.php?view=viewround&MATCHCODE='.$_GET['MATCHCODE'].'');

    }else{
      redirect('index.php?view=viewround&MATCHCODE='.$_GET['MATCHCODE'].'');
    }
  }

          ?>