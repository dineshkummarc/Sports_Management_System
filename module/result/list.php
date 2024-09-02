 <section class="content">
      <div class="container-fluid">
         <?php check_message(); ?>
        <div class="row">
          <div class="col-12">
          
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Team(s)</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tblresult" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Result ID</th>
                    <th>Match Code</th>
                    <th class="bg-success">WINNER</th>
                    <th class="bg-danger">LOSSER</th>
                    <th>Result Date</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  </tbody>
                  <tfoot>
                  
                  </tfoot>
                </table>
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
              <h4 class="modal-title">Add new Team</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                         
              <!-- /.card-header -->
              <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                       <label for="name"  class="col-form-label col-form-label-sm">Team Name</label>
                        <input type="text" class="form-control form-control-sm" name="TEAMNAME" placeholder="Enter Name" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                       <label for="name"  class="col-form-label col-form-label-sm"># of Players</label>
                        <input type="number" value="5" class="form-control form-control-sm" name="NUMBEROFPLAYER" placeholder="Enter Number" required>
                      </div>
                    </div>
                   <div class="col-sm-6">
                      <div class="form-group">
                       <label for="name"  class="col-form-label col-form-label-sm">Category</label>
                        <select class="form-control form-control-sm" name="CATEGORYID">
                         <?php
                            $category = new Category();
                            $cat = $category->listOfCategory();
                            foreach ($cat as $c) {
                              echo '<option value="'. $c->CATEGORYID.'">'.$c->CATEGORYTYPE .'</option>';
                            }

                            ?>
                        </select>
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
              <h4 class="modal-title">Modify User Account</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                         
              <!-- /.card-header -->
              <div class="row">
                    <input type="hidden" name="UID" id="UID">
                    <div class="col-sm-12">
                      <div class="form-group">
                       <label for="name"  class="col-form-label col-form-label-sm">Display Name</label>
                        <input type="text" class="form-control form-control-sm" name="FULLNAME"
                        id="FULLNAME" placeholder="Enter Complete Name" readonly>
                      </div>
                    </div>
                   
                  </div>
                               
                                    
                  <div class="row">
                 
                      <div class="col-sm-6">
                        <div class="form-group" >
                           <label for="username" class="col-form-label col-form-label-sm">Username</label>
                           <input type="text" class="form-control form-control-sm" id="USERNAME" name="USERNAME" placeholder="Enter Username" required>
                        </div>
                      </div>
                     <div class="col-sm-6">
                        <div class="form-group" >
                           <label for="Password" class="col-form-label col-form-label-sm">Password</label>
                           <input type="password" name="PASSWORD" class="form-control form-control-sm" id="Password" readonly>
                        </div>
                      </div>
                     
                    
                   </div>
                   
                  <div class="row">
                   
                    <div class="col-sm-6">
                       <label for="TYPE"  class="col-form-label col-form-label-sm">User Type</label>
                         <select class="form-control form-control-sm" name="TYPE" id="TYPE">
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

                            <input type="checkbox" name="status" class="custom-control-input" id="customSwitch3">
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