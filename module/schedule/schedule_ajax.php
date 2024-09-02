<?php 
require_once("../../include/initialize.php");
global $mydb;

if (isset($_POST['MATCHID'])) {
	$output = array();
	$query =	"SELECT * FROM tblmatchschedule 
		WHERE MATCHID = '".$_POST["MATCHID"]."' 
		LIMIT 1";
	$mydb->setQuery($query);
	$result = $mydb->loadResultList();

	foreach($result as $row)
	{ 
		$output["MATCHID"] = $row->MATCHID;
		$output["MATCHCODE"] = $row->MATCHCODE;
		$output["TEAMID"] = $row->AWAY;
		$output["CATEGORYID"] = $row->CATEGORYID;
		$output["TOURID"] = $row->TOURID;
		$output["VENUECODE"] = $row->VENUECODE;
		$output["MATCHSTATUS"] = $row->MATCHSTATUS;
				
	}
	echo json_encode($output);
}else{
	$output = array();
	$query = "SELECT m.MATCHID,m.MATCHCODE,tm.TEAMNAME,c.CATEGORYTYPE,m.TOURNAME,t.TOURID,t.TOURTYPE,v.VENUENAME FROM tblmatchschedule m LEFT JOIN tblteams tm ON tm.TEAMID = m.TEAMID LEFT JOIN tblcategory c ON c.CATEGORYID = m.CATEGORYID LEFT JOIN tbltournament t oN t.TOURID = m.TOURID LEFT JOIN tblvenue v ON v.VENUECODE = m.VENUECODE";

	if(isset($_POST["search"]["value"]))
	{
	$query .= " where m.`MATCHCODE` LIKE '%".$_POST["search"]["value"]."%' GROUP BY m.MATCHCODE ";
	}
	if(isset($_POST["order"]))
	{
		$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].'';
	}
	else
	{
		$query .= 'ORDER BY `MATCHCODE` DESC';
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
		$sub_array[] = $result->MATCHCODE;
		$sub_array[] = $result->TOURNAME;
		$sub_array[] = $result->TOURTYPE;
		$sub_array[] = $result->CATEGORYTYPE;
		//$sub_array[] = $result->VENUENAME;
		$sub_array[] = '
		<a href="index.php?view=viewmatch&MATCHCODE='.$result->MATCHCODE.'&TOURID='.$result->TOURID.'" type="button" name="update" class="btn btn-success btn-xs"><span class="fa fa-eye fw-fa">View/Edit</span></a>
		<a href="index.php?view=print&MATCHCODE='.$result->MATCHCODE.'&TOURID='.$result->TOURID.'&TOURNAME='.$result->TOURNAME.'" type="button" name="update" class="btn btn-warning btn-xs"><span class="fa fa-print fw-fa">View/Print Schedule</span></a>
		';
		$data[] = $sub_array;
	$i = $i + 1;		
	}
	function get_total_all_records()
	{
		global $mydb;
		$statement = "SELECT m.MATCHID,m.MATCHCODE,tm.TEAMNAME,c.CATEGORYTYPE,m.TOURNAME,t.TOURTYPE,v.VENUENAME FROM tblmatchschedule m LEFT JOIN tblteams tm ON tm.TEAMID = m.TEAMID LEFT JOIN tblcategory c ON c.CATEGORYID = m.CATEGORYID LEFT JOIN tbltournament t oN t.TOURID = m.TOURID LEFT JOIN tblvenue v ON v.VENUECODE = m.VENUECODE";
		$mydb->setQuery($statement);
		return $mydb->num_rows();
	}

	$output = array('data' 			   => $data, 
					"recordsTotal"	   => $filtered_rows,
					"recordsFiltered"	=>	get_total_all_records() );
	echo json_encode($output);
}
?>