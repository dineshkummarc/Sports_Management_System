
    <div class="card-body">
    <span id="divToPrint" style="width: 100%;">
      <center><h1><?php echo $_GET['TOURNAME']; ?></h1></center>
    <center><h2>Double Elimination Matches</h2>
    <h3>Match Code: <i><?php echo $_GET['MATCHCODE']; ?></i></h3></center><br>
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Home</th>
                    <th>VS</th>
                    <th>Visitor</th>
                    <th>Game</th>
                    <th>Venue</th>
                    <th>Bracket Type</th>
                    <th>Date</th>
                    <th>Time Range</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php

 $query = "SELECT * FROM `tblsinglematchschedule` WHERE MATCHCODE = '".$_GET['MATCHCODE']."'";
  $mydb->setQuery($query);
  $results = $mydb->loadResultList();
 foreach($results AS $resultt){
    echo "<tr>";
    echo '<td>'.$resultt->HOME.'</td>';
    echo '<td>VS</td>';
    echo '<td>'.$resultt->AWAY.'</td>';
    echo '<td>'.$resultt->ROUND.'</td>';
    echo '<td>'.$resultt->VENUE.'</td>';
    echo '<td>'.$resultt->BRACKETTYPE.'</td>';
    echo '<td>'.$resultt->DATE.'</td>';
    echo '<td>'.$resultt->TIMERANGE.'</td>';
    echo '<td>'.$resultt->STATUS.'</td>';
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
                                       
    echo "</tr>";

        //printf('%s vs %s<br />%s', $players[$i], $players[++$i], PHP_EOL);
    

?>
<?php
    }
?>
 </tbody>
                  
                </table>
                </span>
              <br>
              <center>
                <div style="float: center;">    
               <a href="#" type="button" class="btn btn-lg btn-success" value="print" onclick="PrintDiv();"><span class="fa fa-print fw-fa">Print Schedule</span></a>
             </div> 
             </center>         
        <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=800,height=800');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
          </div>