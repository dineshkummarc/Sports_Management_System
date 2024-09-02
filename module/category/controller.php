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
		
	 	$category = new Category();
		
		$CATEGORYTYPE = $_POST['CATEGORYTYPE'];

        $res = $category->find_all_category($CATEGORYTYPE);
		
		
			if ($res >=1) {
				message("Category already exist!", "error");
				redirect('index.php');
			}else{
		        $category->CATEGORYTYPE = $CATEGORYTYPE;
				
				$Categoryistrue = $category->create(); 
				if ($Categoryistrue == true) {
									 	
				message("New Category [". $CATEGORYTYPE ."] has been created successfully!", "success");
				redirect('index.php');
				}else{
				message("No Category has been created successfully!", "error");
				redirect('index.php');
			}
		}
	}

	function doEdit(){
		if (isset($_POST['edit'])) {
			$category = new Category();
			$CATEGORYID	= $_POST['CATEGORYID'];
			$CATEGORYTYPE	= $_POST['CATEGORYTYPE'];
			
			//$category->VENUESTATUS = $VENUESTATUS;
			$category->CATEGORYTYPE = $CATEGORYTYPE;
			
			
			 
			 $istrue = $category->update($CATEGORYID); 
			 if ($istrue == true){
			 	
			 	message("Category has been Updated successfully!", "success");
			 	redirect('index.php');
			 	
			 }else{
			 	message("No Category has been updated successfully!", "error");
			 	redirect('index.php');
			 }
					 
		}
		
	
	}
?>