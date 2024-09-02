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
		$TEAMNUMBER = $_POST['TEAMNUMBER'];
		$CATEGORYID = $_POST['CATEGORYID'];
		$NUMBEROFPLAYER = $_POST['NUMBEROFPLAYER'];

        $res = $teams->find_all_team($TEAMNAME);
		
		
		
			if ($res >=1) {
				message("Team Name already exist!", "error");
				redirect('index.php');
			}else{
		    // do something with $value
		        $teams->TEAMNAME = $TEAMNAME;
		        $teams->TEAMNUMBER = $TEAMNUMBER;
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
	}

	function doEdit(){
		if (isset($_POST['edit'])) {
			$user = new User();
			$UID	= $_POST['UID'];
			$USERNAME	= $_POST['USERNAME'];
			//$PASSWORD 	= $_POST['PASSWORD'];
			$TYPE 		= $_POST['TYPE'];
			if (isset($_POST['status']) =='on') {
				$STATUSACTIVE = 1;
			}else{
				$STATUSACTIVE = 0;
			}

			$DATEMODIFIED = strftime("%Y-%m-%d %H:%M:%S", time());
			$MODIFIEDBY	 = $_SESSION['UID'];
			$res = $user->find_all_user_notthis($USERNAME, $UID);
		
		
				if ($res >=1) {
					message("Username already exist!", "error");
					redirect('index.php');
				}else{		
						
				$user->USERNAME = $USERNAME;
				//$user->PASSWORD = sha1($PASSWORD);
				$user->TYPE 	= $TYPE;
				$user->STATUSACTIVE = $STATUSACTIVE;
				$user->DATEMODIFIED = $DATEMODIFIED;
				$user->MODIFIEDBY 	= $MODIFIEDBY;
				
				 
				 $istrue = $user->update($UID); 
				 if ($istrue == true){
				 	
				 	message("User account has been Updated successfully!", "success");
				 	redirect('index.php');
				 	
				 }else{
				 	message("No user account has been updated successfully!", "error");
				 	redirect('index.php');
				 }
			}
					 
		}
		
	
	}
 
?>