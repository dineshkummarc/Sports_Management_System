<?php 
require_once("../../include/initialize.php");
global $mydb;

if (isset($_POST['RESULTID'])) {
	$output = array();
	$query =	"SELECT * FROM tblgameresult 
		WHERE RESULTID = '".$_POST["RESULTID"]."' 
		LIMIT 1";
	$mydb->setQuery($query);
	$result = $mydb->loadResultList();

	foreach($result as $row)
	{ 
		$output["RESULTID"] = $row->RESULTID;
		$output["MATCHCODE"] = $row->MATCHCODE;
		$output["TEAMID"] = $row->WIN;
		$output["FINALSCORE"] = $row->LOSS;
		$output["RESULTDATE"] = $row->RESULTDATE;
				
	}
	echo json_encode($output);
}else{
	$output = array();
	$query = "SELECT * FROM `tblgameresult`";

	if(isset($_POST["search"]["value"]))
	{
	$query .= " where `MATCHCODE` LIKE '%".$_POST["search"]["value"]."%'";
	}
	if(isset($_POST["order"]))
	{
		$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
	}
	else
	{
		$query .= 'ORDER BY `MATCHCODE` DESC ';
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
		$sub_array[] = $result->RESULTID;
		$sub_array[] = $result->MATCHCODE;
		$sub_array[] = $result->WIN;
		$sub_array[] = $result->LOSS;
		$sub_array[] = $result->RESULTDATE;
		$data[] = $sub_array;
	$i = $i + 1;		
	}
	function get_total_all_records()
	{
		global $mydb;
		$statement = "SELECT * FROM tblgameresult";
		$mydb->setQuery($statement);
		return $mydb->num_rows();
	}

	$output = array('data' 			   => $data, 
					"recordsTotal"	   => $filtered_rows,
					"recordsFiltered"	=>	get_total_all_records() );
	echo json_encode($output);
}
?>