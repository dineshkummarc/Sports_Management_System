<?php 
require_once("../../include/initialize.php");
global $mydb;

if (isset($_POST['CATEGORYID'])) {
	$output = array();
	$query =	"SELECT * FROM tblcategory 
		WHERE CATEGORYID = '".$_POST["CATEGORYID"]."' 
		LIMIT 1";
	$mydb->setQuery($query);
	$result = $mydb->loadResultList();

	foreach($result as $row)
	{ 
		$output["CATEGORYID"] = $row->CATEGORYID;
		$output["CATEGORYTYPE"] = $row->CATEGORYTYPE;
				
	}
	echo json_encode($output);
}else{
	$output = array();
	$query = "SELECT * FROM `tblcategory` ";

	if(isset($_POST["search"]["value"]))
	{
	$query .= " where `CATEGORYTYPE` LIKE '%".$_POST["search"]["value"]."%' ";
	}
	if(isset($_POST["order"]))
	{
		$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
	}
	else
	{
		$query .= 'ORDER BY `CATEGORYID` DESC ';
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
	$sub_array = array();
		
		$sub_array[] =$i;
		$sub_array[] = $result->CATEGORYTYPE;
		$sub_array[] = '
		<button type="button" name="update" CATEGORYID="'.$result->CATEGORYID.'" class="btn btn-warning btn-xs editEntry"><span class="fa fa-edit fw-fa"></span></button>';
		$data[] = $sub_array;
	$i = $i + 1;		
	}
	function get_total_all_records()
	{
		global $mydb;
		$statement = "SELECT * FROM `tblcategory`";
		$mydb->setQuery($statement);
		return $mydb->num_rows();
	}

	$output = array('data' 			   => $data, 
					"recordsTotal"	   => $filtered_rows,
					"recordsFiltered"	=>	get_total_all_records() );
	echo json_encode($output);
}
?>