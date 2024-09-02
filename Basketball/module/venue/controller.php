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
		
	 	$venue = new Venue();
		
		$VENUECODE = $_POST['VENUECODE'];
		$VENUENAME = $_POST['VENUENAME'];
		$AVAILABLEGAMEADAY = $_POST['day'];
		$STATUS = "AVAILABLE";

        $res = $venue->find_all_venue($VENUENAME,$AVAILABLEGAMEADAY);
		if ($res >=1) {
				message("Venue already exist!", "error");
				redirect('index.php');
		}else{
		foreach($_POST as $key => $value) {
		  $pos = strpos($key , "time_");
		  if ($pos === 0){
		    // do something with $value
		        $venue->VENUECODE = $VENUECODE;
				$venue->VENUENAME 	= $VENUENAME;
				$venue->AVAILABLETIME = $value;
				$venue->AVAILABLEGAMEADAY = $AVAILABLEGAMEADAY;
				$venue->VENUESTATUS = $STATUS;
				$Venueistrue = $venue->create(); 
				if ($Venueistrue == true) {
				 		$auto = new Autocode();
	                    $oldcode = $auto->single_Autocode('VENUE');
	                    $auto->NEXTNO = $oldcode->NEXTNO + 1;
					 	$autoistrue = $auto->update("VENUE");
									 if ($autoistrue == true){
									 	
									 	message("New Venue [". $VENUENAME ."] has been created successfully!", "success");
									 	redirect('index.php');
									 	}else{
									 	message("No Venue has been created successfully!", "error");
									 	redirect('index.php');
									 }
					}else{
				 	message("No Venue has been created successfully!", "error");
				 	redirect('index.php');
				 }
				//$venue->VENUENAME 	= $VENUENAME;
		 }else{

		  }
		}
	}
	}

	function doEdit(){
		if (isset($_POST['edit'])) {
			$venue = new Venue();
			$VENUEID	= $_POST['VENUEID'];
			//$TYPE 		= $_POST['TYPE'];
			if (isset($_POST['status1']) =='on' ) {
				$VENUESTATUS = "AVAILABLE";
			}else{
				$VENUESTATUS = "UNAVAILABLE";
			}
;
			
			$venue->VENUESTATUS = $VENUESTATUS;
			
			
			 
			 $istrue = $venue->update($VENUEID); 
			 if ($istrue == true){
			 	
			 	message("Venue has been Updated successfully!", "success");
			 	redirect('index.php');
			 	
			 }else{
			 	message("No Venue has been updated successfully!", "error");
			 	redirect('index.php');
			 }
					 
		}
		
	
	}
?>