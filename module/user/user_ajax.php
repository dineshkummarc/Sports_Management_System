<?php 
require_once("../../include/initialize.php");
global $mydb;

if (isset($_POST['USERID'])) {
	$output = array();
	$query =	"SELECT * FROM tbluser 
		WHERE USERID = '".$_POST["USERID"]."' 
		LIMIT 1";
	$mydb->setQuery($query);
	$result = $mydb->loadResultList();

	foreach($result as $row)
	{ 
		$output["USERID"] = $row->USERID;
		$output["NAME"] = $row->DISPLAYNAME;
		$output["USERNAME"] = $row->USERNAME;
		$output["TYPE"] = $row->TYPE;
				
	}
	echo json_encode($output);
}else{
	$output = array();
	$query = "SELECT * FROM `tbluser` ";

	if(isset($_POST["search"]["value"]))
	{
	$query .= " where `USERNAME` LIKE '%".$_POST["search"]["value"]."%' ";
	}
	if(isset($_POST["order"]))
	{
		$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
	}
	else
	{
		$query .= 'ORDER BY `USERID` DESC ';
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
		$sub_array[] = $result->TYPEID;
		$sub_array[] = $result->NAME;
		$sub_array[] = $result->USERNAME;
		$sub_array[] = $result->TYPE;
		$data[] = $sub_array;
	$i = $i + 1;		
	}
	function get_total_all_records()
	{
		global $mydb;
		$statement = "SELECT * FROM `tbluser`";
		$mydb->setQuery($statement);
		return $mydb->num_rows();
	}

	$output = array('data' 			   => $data, 
					"recordsTotal"	   => $filtered_rows,
					"recordsFiltered"	=>	get_total_all_records() );
	echo json_encode($output);
}
?>