<?php

 foreach($_POST['teams'] as $key) {
      $players=$key;
      }
    //$players = array('d','f','g','w','s');
    $count = count($players);
    $numberOfRounds = log($count / 2, 2);
    if (count($players)%2 != 0){
    array_push($players,"bye");
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
?>
    <div class="card-body">
    <h1>Round Robin Matches:</h1>
                <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Home</th>
                    <th>Away</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
<?php
    // Print match list.
    for ($i = 0; $i < $count; $i++) {
      //if 
      $home  = $players[$i];
      $away = $players[++$i];
      echo "<tr>";
    echo '<td>'.$home.'</td>';
    echo '<td>'.$away.'</td>';
    echo '<td><a href="save.php" type="button" name="update" class="btn btn-success btn-xs"><span class="fa fa-save">Save Single Match</span></a></td>';
    echo "</tr>";
        //printf('%s vs %s<br />%s', $players[$i], $players[++$i], PHP_EOL);
    }

?>
 </tbody>
                  
                </table>
                  <div class="btn-group">
          
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddNewEntry">Add New</button>
                 
                </div>
              </div>