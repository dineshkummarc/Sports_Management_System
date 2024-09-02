<?php
require_once(LIB_PATH.DS.'database.php');
class Venue{
	
	protected static $tbl_name = "tblvenue";
	function db_fields(){
		global $mydb;
		return $mydb->getFieldsOnOneTable(self::$tbl_name);
	}
		
	function listOfVenue(){
			global $mydb;
			$mydb->setQuery("SELECT * 
							FROM  ".self::$tbl_name);
			$cur = $mydb->loadResultList();
			return $cur;
	}

	function listOfVenueCode(){
			global $mydb;
			$mydb->setQuery("SELECT * 
							FROM  ".self::$tbl_name." GROUP BY VENUECODE");
			$cur = $mydb->loadResultList();
			return $cur;
	}

	function single_Venue($id=''){
			global $mydb;
			$mydb->setQuery("SELECT * FROM ".self::$tbl_name." Where VENUEID  = '{$id}' LIMIT 1");
			$cur = $mydb->loadSingleResult();
			return $cur;
	}
	function find_all_venue($VENUENAME="",$AVAILABLEGAMEADAY=""){
			global $mydb;
			$mydb->setQuery("SELECT * 
							FROM  ".self::$tbl_name." 
							WHERE  `VENUENAME` ='{$VENUENAME}' AND `AVAILABLEGAMEADAY` ='{$AVAILABLEGAMEADAY}'");
			$row_count = $mydb->num_rows();
			return $row_count;
	}
	function find_all_venue_name($VENUECODE="", $VENUENAME=""){
			global $mydb;
			$mydb->setQuery("SELECT * 
							FROM  ".self::$tbl_name." 
							WHERE  `VENUECODE` ='{$VENUECODE}' AND VENUENAME ='{$VENUENAME}'");
			$row_count = $mydb->num_rows();
			return $row_count;
	}

	function find_all_venue_notthis($VENUECODE="", $VENUENAME="" , $VENUEID=0){
			global $mydb;
			$mydb->setQuery("SELECT * 
							FROM  ".self::$tbl_name." 
							WHERE `VENUECODE` ='{$VENUECODE}' AND VENUENAME ='{$VENUENAME}' AND VENUEID  != ". $VENUEID . "");
			$row_count = $mydb->num_rows();
			return $row_count;
	}
	
	/*---Instantiation of Object dynamically---*/
	static function instantiate($record) {
		$object = new self;

		foreach($record as $attribute=>$value){
		  if($object->has_attribute($attribute)) {
		    $object->$attribute = $value;
		  }
		} 
		return $object;
	}
	
	/*--Cleaning the raw data before submitting to Database--*/
	private function has_attribute($attribute) {
	  // We don't care about the value, we just want to know if the key exists
	  // Will return true or false
	  return array_key_exists($attribute, $this->attributes());
	}

	protected function attributes() { 
		// return an array of attribute names and their values
	  global $mydb;
	  $attributes = array();
	  foreach($this->db_fields() as $field) {
	    if(property_exists($this, $field)) {
			$attributes[$field] = $this->$field;
		}
	  }
	  return $attributes;
	}
	
	protected function sanitized_attributes() {
	  global $mydb;
	  $clean_attributes = array();
	  // sanitize the values before submitting
	  // Note: does not alter the actual value of each attribute
	  foreach($this->attributes() as $key => $value){
	    $clean_attributes[$key] = $mydb->escape_value($value);
	  }
	  return $clean_attributes;
	}
	
	
	/*--Create,Update and Delete methods--*/
	public function save() {
	  // A new record won't have an id yet.
	  return isset($this->id) ? $this->update() : $this->create();
	}
	
	public function create() {
		global $mydb;
		// Don't forget your SQL syntax and good habits:
		// - INSERT INTO table (key, key) VALUES ('value', 'value')
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
		$sql = "INSERT INTO ".self::$tbl_name." (";
		$sql .= join(", ", array_keys($attributes));
		$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
	return  $mydb->InsertThis($sql);
	}

	public function update($id='') {
	  global $mydb;
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
		  $attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE ".self::$tbl_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE VENUEID  = '{$id}'";
	 	return  $mydb->InsertThis($sql);
	}

		
	
}
?>