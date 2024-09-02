<?php 
require_once("../../include/initialize.php");
global $mydb;

if (isset($_POST['VENUEID'])) {
	$output = array();
	$query =	"SELECT * FROM tblvenue 
		WHERE VENUEID = '".$_POST["VENUEID"]."' 
		LIMIT 1";
	$mydb->setQuery($query);
	$result = $mydb->loadResultList();

	foreach($result as $row)
	{ 
		$output["VENUEID"] = $row->VENUEID;
		$output["VENUECODE"] = $row->VENUECODE;
		$output["VENUENAME"] = $row->VENUENAME;
		$output["AVAILABLETIME"] = $row->AVAILABLETIME;
		$output["AVAILABLEGAMEADAY"] = $row->AVAILABLEGAMEADAY;
		$output["VENUESTATUS"] = $row->VENUESTATUS;
				
	}
	echo json_encode($output);
}else{
	$output = array();
	$query = "SELECT * FROM `tblvenue` ";

	if(isset($_POST["search"]["value"]))
	{
	$query .= " where `VENUENAME` LIKE '%".$_POST["search"]["value"]."%' ";
	}
	if(isset($_POST["order"]))
	{
		$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
	}
	else
	{
		$query .= 'ORDER BY `VENUEID` DESC ';
	}
	if($_POST["length"] != -1)
	{
		$query .= " LIMIT " . $_POST['start'] . ", " . $_POST['length'] . "";
	}
	$mydb->setQuery($query);
	$cur = $mydb->loadResultList();
	$data = array();
	$filtered_rows = $mydb->num_rows();
	$i = 1;	
	foreach ($cur as $result) {
				// `UID`, `USERNAME`, `PASSWORD`, `TYPE`, `FULLNAME`, `DOB`, `AGE`, `SEX`, `ADDRESS`, `PICTURE`, `ADDEDBY`, `DATEADDED`, `MODIFIEDBY`, `DATEMODIFIED`
	$sub_array = array();
		
		$sub_array[] =$i;
		$sub_array[] = $result->VENUECODE;
		$sub_array[] = $result->VENUENAME;
		$sub_array[] = $result->AVAILABLETIME;
		$sub_array[] = $result->AVAILABLEGAMEADAY;
		$sub_array[] = $result->VENUESTATUS;
		$sub_array[] = '
		<button type="button" name="update" VENUEID="'.$result->VENUEID.'" class="btn btn-warning btn-xs editEntry"><span class="fa fa-edit fw-fa">Change Status</span></button>';
		$data[] = $sub_array;
	$i = $i + 1;		
	}
	function get_total_all_records()
	{
		global $mydb;
		$statement = "SELECT * FROM `tblvenue`";
		$mydb->setQuery($statement);
		return $mydb->num_rows();
	}

	$output = array('data' 			   => $data, 
					"recordsTotal"	   => $filtered_rows,
					"recordsFiltered"	=>	get_total_all_records() );
	echo json_encode($output);
}
?>