<?php 
require_once("../../include/initialize.php");
global $mydb;

if (isset($_POST['TEAMID'])) {
	$output = array();
	$query =	"SELECT * FROM tblteams 
		WHERE TEAMID = '".$_POST["TEAMID"]."' 
		LIMIT 1";
	$mydb->setQuery($query);
	$result = $mydb->loadResultList();

	foreach($result as $row)
	{ 
		$output["TEAMID"] = $row->TEAMID;
		$output["TEAMNUMBER"] = $row->TEAMID;
		$output["TEAMNAME"] = $row->TEAMNAME;
		$output["CATEGORYID"] = $row->CATEGORYID;
		$output["NUMBEROFPLAYER"] = $row->NUMBEROFPLAYER;
				
	}
	echo json_encode($output);
}else{
	$output = array();
	$query = "SELECT t.TEAMID,t.TEAMNUMBER,t.TEAMNAME,c.CATEGORYTYPE,t.NUMBEROFPLAYER FROM `tblteams` t JOIN `tblcategory` c ON c.CATEGORYID = t.CATEGORYID";

	if(isset($_POST["search"]["value"]))
	{
	$query .= " where `TEAMNAME` LIKE '%".$_POST["search"]["value"]."%' ";
	}
	if(isset($_POST["order"]))
	{
		$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
	}
	else
	{
		$query .= 'ORDER BY `TEAMID` DESC ';
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
		$sub_array[] = $result->TEAMNAME;
		$sub_array[] = $result->TEAMNUMBER;
		$sub_array[] = $result->CATEGORYTYPE;
		$sub_array[] = $result->NUMBEROFPLAYER;
		$sub_array[] = '
		<a href="index.php?view=printsched&TEAMNAME='.$result->TEAMNAME.'" type="button" name="update" class="btn btn-info btn-xs"><span class="fa fa-eye fw-fa">View Schedule(s)</span></a>';
		$data[] = $sub_array;
	$i = $i + 1;		
	}
	function get_total_all_records()
	{
		global $mydb;
		$statement = "SELECT t.TEAMID,t.TEAMNAME,c.CATEGORYTYPE,t.NUMBEROFPLAYER FROM `tblteams` t JOIN `tblcategory` c ON c.CATEGORYID = t.CATEGORYID ";
		$mydb->setQuery($statement);
		return $mydb->num_rows();
	}

	$output = array('data' 			   => $data, 
					"recordsTotal"	   => $filtered_rows,
					"recordsFiltered"	=>	get_total_all_records() );
	echo json_encode($output);
}
?>