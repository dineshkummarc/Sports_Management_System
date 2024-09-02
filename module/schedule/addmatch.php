<?php
$tournament = new Tournament();
$tour = $tournament->single_Tournament($_POST['TOURID']);
$query = "SELECT * FROM `tblmatchschedule` WHERE TOURNAME='".$_POST['TOURNAME']."' AND CATEGORYID = '".$_POST['CATEGORYID']."' AND TOURID = '".$_POST['TOURID']."' ";
$mydb->setQuery($query);
$results = $mydb->num_rows();
if($results>0){
message("This Tournament Match Has Already Exist!", "error");
redirect('index.php');
}else{
if($tour->TOURTYPE=='SINGLE ELIMINATION'){
  ?>
  <div class="col-md-12">
            <div class="card">
           <!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  
                  <!-- /.tab-pane -->
              <form action="singleelimination.php" enctype="multipart/form-data" method="POST">
                      <div class="row">
                      <div class="col-sm-4">
                      <div class="form-group">
                      <label for="name"  class="col-form-label col-form-label-sm">Match Code</label>
                        <?php
                            $Autocode = new Autocode();
                            $newid = $Autocode->single_Autocode('MATCH');

                           echo '<input type="text" readonly class="form-control form-control-sm" name="MATCHCODE" id="MATCHCODE" value="'.$newid->NEXTNO.'" required>';
                           ?>
                      </div>
                    </div>
                      <div class="col-sm-4">
                      <div class="form-group">
                       <label for="name"  class="col-form-label col-form-label-sm">Tournament Type</label>
                        <?php
                            $Tournament = new Tournament();
                            $tour = $Tournament->single_Tournament($_POST['TOURID']);

                           echo '<input type="text" readonly class="form-control form-control-sm" value="'.$tour->TOURTYPE.'" name="TOURID">
                           <input type="hidden" class="form-control form-control-sm" name="TOURTYPE" id="PATID" value="'.$tour->TOURID.'" required>';
                           ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-4">
                      <label for="name"  class="col-form-label col-form-label-sm">Category</label>
                        <?php
                            $Category = new Category();
                            $category = $Category->single_Category($_POST['CATEGORYID']);

                           echo '<input type="text" readonly class="form-control form-control-sm" value="'.$category->CATEGORYTYPE.'">
                           <input type="hidden" class="form-control form-control-sm" name="CATEGORYID" id="PATID" value="'.$category->CATEGORYID.'" required>
                           <input type="hidden" class="form-control form-control-sm" name="TOURNAME" id="PATID" value="'.$_POST['TOURNAME'].'" required>';
                           ?>
                      </div>
                        <div class="col-sm-4">
                      <div class="form-group"  class="col-form-label col-form-label-sm">
                        <label for="username">Select Venue(s)</label>
                         <?php
                          $query = "SELECT * FROM tblvenue WHERE VENUESTATUS='AVAILABLE' GROUP BY VENUECODE";
                          $mydb->setQuery($query);
                          $results = $mydb->loadResultList();
                          foreach ($results as $result) {
                            echo '<div class="icheck-success">
                            <input type="checkbox" value="'.$result->VENUECODE.'" id="'.$result->VENUECODE.'" name=venue[]'.$result->VENUECODE.' >
                            <label for="'.$result->VENUECODE.'">
                              '.$result->VENUENAME.'
                            </label>
                            <i>('.$result->AVAILABLEGAMEADAY.')</i>
                          </div> 

                          ';
                          }
                        ?> 
                      </div>
                    </div>
                  </div>
                     <div class="col-sm-4">
                      <div class="form-group"  class="col-form-label col-form-label-sm">
                        <label for="username">Teams Participants</label>
                         <?php
                          $query = "SELECT * FROM tblteams WHERE CATEGORYID='".$_POST['CATEGORYID']."' ORDER BY `TEAMNUMBER` ASC";
                          $mydb->setQuery($query);
                          $results = $mydb->loadResultList();
                          foreach ($results as $result) {
                            echo '<div class="icheck-success">
                            <input type="checkbox" checked value="'.$result->TEAMID.'" id="'.$result->TEAMNUMBER.'" name=teams_'.$result->TEAMID.' >
                            <label for="'.$result->TEAMNUMBER.'">
                              '.$result->TEAMNUMBER.'
                            </label>
                            '.$result->TEAMNAME.'
                          </div> 

                          ';
                          }
                        ?> 
                      </div>
                    </div>
                    
                    </div>
                  
                  <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-success" name="save" type="submit">Generate Match</button>
            </div>
          </form>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
  <?php
}else if($tour->TOURTYPE=='DOUBLE ELIMINATION'){
  //redirect('double.php');
  ?>
  <div class="col-md-12">
            <div class="card">
           <!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  
                  <!-- /.tab-pane -->
              <form action="double.php" enctype="multipart/form-data" method="POST">
                      <div class="row">
                      <div class="col-sm-4">
                      <div class="form-group">
                      <label for="name"  class="col-form-label col-form-label-sm">Match Code</label>
                        <?php
                            $Autocode = new Autocode();
                            $newid = $Autocode->single_Autocode('MATCH');

                           echo '<input type="text" readonly class="form-control form-control-sm" name="MATCHCODE" id="MATCHCODE" value="'.$newid->NEXTNO.'" required>';
                           ?>
                      </div>
                    </div>
                      <div class="col-sm-4">
                      <div class="form-group">
                       <label for="name"  class="col-form-label col-form-label-sm">Tournament Type</label>
                        <?php
                            $Tournament = new Tournament();
                            $tour = $Tournament->single_Tournament($_POST['TOURID']);

                           echo '<input type="text" readonly class="form-control form-control-sm" value="'.$tour->TOURTYPE.'" name="TOURID">
                           <input type="hidden" class="form-control form-control-sm" name="TOURTYPE" id="PATID" value="'.$tour->TOURID.'" required>';
                           ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-4">
                      <label for="name"  class="col-form-label col-form-label-sm">Category</label>
                        <?php
                            $Category = new Category();
                            $category = $Category->single_Category($_POST['CATEGORYID']);

                           echo '<input type="text" readonly class="form-control form-control-sm" value="'.$category->CATEGORYTYPE.'">
                           <input type="hidden" class="form-control form-control-sm" name="CATEGORYID" id="PATID" value="'.$category->CATEGORYID.'" required>
                           <input type="hidden" class="form-control form-control-sm" name="TOURNAME" id="PATID" value="'.$_POST['TOURNAME'].'" required>';
                           ?>
                      </div>
                      <div class="col-sm-4">
                      <div class="form-group"  class="col-form-label col-form-label-sm">
                        <label for="username">Select Venue(s)</label>
                         <?php
                          $query = "SELECT * FROM tblvenue WHERE VENUESTATUS='AVAILABLE' GROUP BY VENUECODE";
                          $mydb->setQuery($query);
                          $results = $mydb->loadResultList();
                          foreach ($results as $result) {
                            echo '<div class="icheck-success">
                            <input type="checkbox" value="'.$result->VENUECODE.'" id="'.$result->VENUECODE.'" name=venue[]'.$result->VENUECODE.' >
                            <label for="'.$result->VENUECODE.'">
                              '.$result->VENUENAME.'
                            </label>
                            <i>('.$result->AVAILABLEGAMEADAY.')</i>
                          </div> 

                          ';
                          }
                        ?> 
                      </div>
                    </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-4">
                      <div class="form-group"  class="col-form-label col-form-label-sm">
                        <label for="username">Teams Participants</label>
                         <?php
                          $query = "SELECT * FROM tblteams WHERE CATEGORYID='".$_POST['CATEGORYID']."' ORDER BY `TEAMNUMBER` ASC";
                          $mydb->setQuery($query);
                          $results = $mydb->loadResultList();
                          foreach ($results as $result) {
                            echo '<div class="icheck-success">
                            <input type="checkbox" checked value="'.$result->TEAMID.'" id="'.$result->TEAMNUMBER.'" name=teams_'.$result->TEAMID.' >
                            <label for="'.$result->TEAMNUMBER.'">
                              '.$result->TEAMNUMBER.'
                            </label>
                            '.$result->TEAMNAME.'
                          </div> 

                          ';
                          }
                        ?> 
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <!-- radio -->
                      <div class="form-group">
                        <label for="username">Bracket Type</label>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio1" value="Winner's Bracket" name="type">
                          <label for="customRadio1" class="custom-control-label">Winner's Bracket</label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input class="custom-control-input" type="radio" id="customRadio2" value="Losser's Bracket" name="type">
                          <label for="customRadio2" class="custom-control-label">Losser's Bracket</label>
                        </div>
                      </div>
                    </div>
                    </div>
                  
                  <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-success" name="save" type="submit">Generate Match</button>
            </div>
          </form>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <?php
}else{
?>
<div class="col-md-12">
            <div class="card">
           <!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  
                  <!-- /.tab-pane -->
              <form action="index.php?view=generate" enctype="multipart/form-data" method="POST">
                      <div class="row">
                      <div class="col-sm-4">
                      <div class="form-group">
                      <label for="name"  class="col-form-label col-form-label-sm">Match Code</label>
                        <?php
                            $Autocode = new Autocode();
                            $newid = $Autocode->single_Autocode('MATCH');

                           echo '<input type="text" readonly class="form-control form-control-sm" name="MATCHCODE" id="MATCHCODE" value="'.$newid->NEXTNO.'" required>';
                           ?>
                      </div>
                    </div>
                      <div class="col-sm-4">
                      <div class="form-group">
                       <label for="name"  class="col-form-label col-form-label-sm">Tournament Type</label>
                        <?php
                            $Tournament = new Tournament();
                            $tour = $Tournament->single_Tournament($_POST['TOURID']);

                           echo '<input type="text" readonly class="form-control form-control-sm" value="'.$tour->TOURTYPE.'" name="TOURID">
                           <input type="hidden" class="form-control form-control-sm" name="TOURTYPE" id="PATID" value="'.$tour->TOURID.'" required>';
                           ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-4">
                      <label for="name"  class="col-form-label col-form-label-sm">Category</label>
                        <?php
                            $Category = new Category();
                            $category = $Category->single_Category($_POST['CATEGORYID']);

                           echo '<input type="text" readonly class="form-control form-control-sm" value="'.$category->CATEGORYTYPE.'">
                           <input type="hidden" class="form-control form-control-sm" name="CATEGORYID" id="CATEGORYID" value="'.$category->CATEGORYID.'" required>
                           <input type="hidden" class="form-control form-control-sm" name="TOURNAME" id="PATID" value="'.$_POST['TOURNAME'].'" required>';
                           ?>
                      </div>
                      <div class="col-sm-4">
                      <div class="form-group"  class="col-form-label col-form-label-sm">
                        <label for="username">Select Venue(s)</label>
                         <?php
                          $query = "SELECT * FROM tblvenue WHERE VENUESTATUS='AVAILABLE' GROUP BY VENUECODE";
                          $mydb->setQuery($query);
                          $results = $mydb->loadResultList();
                          foreach ($results as $result) {
                            echo '<div class="icheck-success">
                            <input type="checkbox" value="'.$result->VENUECODE.'" id="'.$result->VENUECODE.'" name=venue[]'.$result->VENUECODE.' >
                            <label for="'.$result->VENUECODE.'">
                              '.$result->VENUENAME.'
                            </label>
                            <i>('.$result->AVAILABLEGAMEADAY.')</i>
                          </div> 

                          ';
                          }
                        ?> 
                      </div>
                    </div>
                  </div>
                     <div class="col-sm-4">
                      <div class="form-group"  class="col-form-label col-form-label-sm">
                        <label for="username">Teams Participants</label>
                         <?php
                          $query = "SELECT * FROM tblteams WHERE CATEGORYID='".$_POST['CATEGORYID']."' ORDER BY `TEAMNUMBER` ASC";
                          $mydb->setQuery($query);
                          $results = $mydb->loadResultList();
                          foreach ($results as $result) {
                            echo '<div class="icheck-success">
                            <input type="checkbox" checked value="'.$result->TEAMID.'" id="'.$result->TEAMNUMBER.'" name=teams_'.$result->TEAMID.' >
                            <label for="'.$result->TEAMNUMBER.'">
                              '.$result->TEAMNUMBER.'
                            </label>
                            '.$result->TEAMNAME.'
                          </div> 

                          ';
                          }
                        ?> 
                      </div>
                    </div>
                    
                    </div>
                  
                  <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-success" name="save" type="submit">Generate Match</button>
            </div>
          </form>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
<?php
}
}
?>