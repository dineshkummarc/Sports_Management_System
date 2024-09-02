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
	
	case 'delete' :
	doDelete();
	break;

	
 
	}
    
	function doInsert(){
 	
					 
		$Usertype = new Usertype();
		$USERTYPE	= $_POST['usertype'];
		
		$res = $Usertype->find_all_usertype($USERTYPE);
		
		
			if ($res >=1) {
				message("Username already exist!", "error");
				redirect('index.php');
			}else{
				
				$Usertype->USERTYPE = $USERTYPE;
				 
				 $istrue = $Usertype->create(); 
				 if ($istrue == true){
				 	
				 	message("New User [". $USERTYPE ."] has been created successfully!", "success");
				 	redirect('index.php');
				 	
				 }else{
				 	message("No user type has been created successfully!", "error");
				 	redirect('index.php');
				 }
			}	 

	}
		

		

	function doEdit(){
		if (isset($_POST['edit'])) {
			$Usertype = new Usertype();
			$TYPEID	= $_POST['TYPEID'];
			$USERTYPE	= $_POST['USERTYPE'];
						
			
			$Usertype->USERTYPE = $USERTYPE;
							 
			 $istrue = $Usertype->update($TYPEID); 
			 if ($istrue == true){
			 	
			 	message("User Type [". $USERTYPE ."] has been Updated successfully!", "success");
			 	redirect('index.php');
			 	
			 }else{
			 	message("No user type has been updated successfully!", "error");
			 	redirect('index.php');
			 }
					 
		}
		
	
	}

?>