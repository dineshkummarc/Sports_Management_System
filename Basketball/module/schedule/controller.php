<?php
require_once ("../../include/initialize.php");
	  if (!isset($_SESSION['ACCOUNT_ID'])){
     // redirect(web_root."admin/index.php");
     }

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'editpass' :
	dochangepass();
	break;
	 
	}
    
	function doInsert(){  
		
	 	$teams = new Teams();
		
		$TEAMNAME = $_POST['TEAMNAME'];
		$CATEGORYID = $_POST['CATEGORYID'];
		$NUMBEROFPLAYER = $_POST['NUMBEROFPLAYER'];

        $res = $teams->find_all_team($TEAMNAME);
		// insert labtestrequest
		
		    // do something with $value
		        $teams->TEAMNAME = $TEAMNAME;
				$teams->CATEGORYID 	= $CATEGORYID;
				$teams->NUMBEROFPLAYER 	= $NUMBEROFPLAYER;
				
				$Teamistrue = $teams->create(); 
				if ($Teamistrue == true) {
									 	
				message("New Team [". $TEAMNAME ."] has been created successfully!", "success");
				redirect('index.php');
				}else{
				message("No Team has been created successfully!", "error");
				redirect('index.php');
			}
		}

?>