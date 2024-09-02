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
    
		
	 	$tournament = new Tournament();
	
		$TOURTYPE = $_POST['TOURTYPE'];

        $res = $tournament->find_all_tournament($TOURTYPE);
		
		
			if ($res >=1) {
				message("Tournament already exist!", "error");
				redirect('index.php');
			}else{
		
				$tournament->TOURTYPE 	= $TOURTYPE;
				
				$Tournamentistrue = $tournament->create(); 
				if ($Tournamentistrue == true) {
									 	
				message("New Tournament [". $TOURTYPE ."] has been created successfully!", "success");
				redirect('index.php');
				}else{
				message("No Tournament has been created successfully!", "error");
				redirect('index.php');
			}
		}
	}

?>