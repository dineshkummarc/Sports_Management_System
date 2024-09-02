 <section class="content">
      <div class="container-fluid">
         <?php check_message(); ?>
        <div class="row">
          <div class="col-12">
          
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Venue(s)</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tblvenue" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>CODE</th>
                    <th>Name</th>
                    <th>Available Time</th>
                    <th>Available Day</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  </tbody>
                  <tfoot>
                  
                  </tfoot>
                </table>
                  <div class="btn-group">
          
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddNewEntry">Add New</button>
                 
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

<!-----START of Add Form---->
     <div class="modal fade" id="AddNewEntry">
        <div class="modal-dialog">
        <form action="controller.php?action=add" enctype="multipart/form-data" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add new Venue</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                         
              <!-- /.card-header -->
              <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                       <label for="name"  class="col-form-label col-form-label-sm">Venue Code</label>
                        <?php
                            $Autocode = new Autocode();
                            $newid = $Autocode->single_Autocode('VENUE');

                           echo '<input type="text" readonly class="form-control form-control-sm" name="VENUECODE" id="VENUECODE" value="'.$newid->NEXTNO.'" required>';
                           ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                       <label for="name"  class="col-form-label col-form-label-sm">Venue Name</label>
                        <input type="text" class="form-control form-control-sm" name="VENUENAME" placeholder="Enter Name" required>
                      </div>
                    </div>
                   
                  </div>
                

                   <div class="row">
                   <div class="col-sm-6">
                      <div class="form-group">
                       <label for="labs"  class="col-form-label col-form-label">Available Time</label>
                        <?php
                          $query = "SELECT * FROM `available_day_time` WHERE AVAILTYPE='Time'";
                          $mydb->setQuery($query);
                          $results = $mydb->loadResultList();
                          foreach ($results as $result) {
                            echo '<div class="icheck-success">
                            <input checked type="checkbox" value="'.$result->DESCRIPTION.'" id="'.$result->DESCRIPTION.'" name=time_'.$result->DESCRIPTION.' >
                            <label for="'.$result->DESCRIPTION.'">
                              '.$result->DESCRIPTION.'
                            </label>
                          </div> ';
                          }
                        ?>                                 
                        </div>
                     </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                       <label>Available Day</label>
                        <?php
                          $query = "SELECT * FROM `available_day_time` WHERE AVAILTYPE='Day' ORDER BY `DESCRIPTION` ASC";
                          $mydb->setQuery($query);
                          $results = $mydb->loadResultList();
                            echo '<select name="day" class="form-control">';
                            foreach ($results as $result) {
                            echo '<option value='.$result->DESCRIPTION.'>'.$result->DESCRIPTION.'</option>';
                          }
                          echo '</select>';
                          
                        ?>     
                                                    
                        </div>
                     </div>
                    
                   </div>
                <!-- /.card-body -->
           
              <!-- /.card-body -->
           
            </div>
            <div class="modal-footer justify-content-between">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary" name="save" type="submit">Save changes</button>
             
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

<!-----End of Add Form---->
<!-----Start of edit Form---->
    <div class="modal fade" id="editEntry">
        <div class="modal-dialog">
        <form action="controller.php?action=edit" enctype="multipart/form-data" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Modify Venue Status</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                         
              <!-- /.card-header -->
              <div class="row">
                    <input type="hidden" name="VENUEID" id="VENUEID">
                     <div class="col-sm-12">
                         <label for="customSwitch3"  class="col-form-label col-form-label-sm">Status</label>
                          <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">

                            <input type="checkbox" name="status1" class="custom-control-input" id="customSwitch3">
                            <label class="custom-control-label" for="customSwitch3">Slide to Change Status</label>
                          </div> 
                       
                     </div>
                    
                    
                   </div>
                   
                         
                <!-- /.card-body -->
               
              <!-- /.card-body -->
           
            </div>
            <div class="modal-footer justify-content-between">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary swalDefaultSuccesss" name="edit" type="submit">Save changes</button>
             
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <!-----Start of edit password Form---->
    <div class="modal fade" id="changepass">
        <div class="modal-dialog">
        <form action="controller.php?action=editpass" enctype="multipart/form-data" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Change User Password</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                         
              <!-- /.card-header -->
              <div class="row">
                    <input type="hidden" name="UID" id="UIDpas">
                    <div class="col-sm-12">
                      <div class="form-group">
                       <label for="name"  class="col-form-label col-form-label-sm">Display Name</label>
                        <input type="text" class="form-control form-control-sm" name="FULLNAME"
                        id="dNAME" placeholder="Enter Complete Name" readonly>
                      </div>
                    </div>
                   
                  </div>
                               
                                    
                  <div class="row">
                 
                      <div class="col-sm-6">
                        <div class="form-group" >
                           <label for="username" class="col-form-label col-form-label-sm">Username</label>
                           <input type="text" class="form-control form-control-sm" id="UNAME" name="USERNAME" placeholder="Enter Username" readonly>
                        </div>
                      </div>
                     <div class="col-sm-6">
                        <div class="form-group" >
                           <label for="Password" class="col-form-label col-form-label-sm">Password</label>
                           <input type="password" name="PASSWORD" class="form-control form-control-sm" id="Password" required>
                        </div>
                      </div>
                     
                    
                   </div>
                   
                  <div class="row">
                   
                    <div class="col-sm-6">
                       <label for="TYPE"  class="col-form-label col-form-label-sm">User Type</label>
                         <select class="form-control form-control-sm" name="TYPE" id="TYPE" disabled>
                          <?php
                            $Usertype = new Usertype();
                            $cur = $Usertype->listOfUserTypes();
                            foreach ($cur as $m) {
                              echo '<option value="'. $m->USERTYPE .'">'. $m->USERTYPE .'</option>';
                            }

                            ?>
                        </select> 
                     </div>
                     <div class="col-sm-6">
                         <label for="customSwitch3"  class="col-form-label col-form-label-sm">Status</label>
                          <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">

                            <input type="checkbox" name="status" class="custom-control-input" id="customSwitch3" disabled>
                            <label class="custom-control-label" for="customSwitch3">Slide to Change Status</label>
                          </div> 
                       
                     </div>
                    
                    
                   </div>
                   
                         
                <!-- /.card-body -->
               
              <!-- /.card-body -->
           
            </div>
            <div class="modal-footer justify-content-between">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary swalDefaultSuccesss" name="editpass" type="submit">Save changes</button>
             
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


<?php


?>