<?php
class InfoMySql extends Connection{
	private $dbTable;
	private $dbWhere;
	private $dbParameters;
	private $dbOrder;
	
	/*Link de conex�o com o banco */
	private $connectionLink;
	
	public function __construct(){}
	
	public function __destruct(){} 
	
	public function setTable($_dbTable){
		$this->dbTable = $_dbTable;
	}
	
	public function setWhere($dbWhere){
		if (!empty($dbWhere))
			$this->dbWhere = $dbWhere;
	}
	
	public function setParameters($dbParameters){
		$this->dbParameters = $dbParameters;
	}
	
	public function setOrder($dbOrder){
		$this->dbOrder = $dbOrder;
	}
	
	public function setupParamsInsert(){
		$values = array_map('mysql_real_escape_string', array_values($this->dbParameters));
		$keys = array_keys($this->dbParameters);

		return '(`'.implode('`, `', $keys).'`) VALUES (\''.implode('\', \'', $values).'\')';		
	}
	
	public function setupParamsUpdate(){
		$return = "";
		
// 		TODO
// 		for ($i = 0; $i < sizeof($this->dbParameters); $i++) {
			
// 		}
		
		foreach((array)$this->dbParameters as $name => $value){
			if ($return != "") {
				$return .= ', ';
			}
			
			$return .= '`'.$name.'` = '.'\''.$value.'\'';
		}
		
		return $return;
	}
	
	public function setupWhere(){
		$return = "";
		
		if ($this->dbWhere == null) {
			return "";
		}
		
		foreach((array)$this->dbWhere as $name => $value){
// 			if ($return != "") {
				$return .= ' AND ';
// 			}
			
			$return .= '`'.$name.'` = '.'\''.$value.'\'';
		}
		
		return 'WHERE 1 = 1 '.$return;
	}
	
	public function sqlNative($sql){
		return mysql_query($sql);
	}
		
	public function selectDb(){
		return mysql_query("SELECT * FROM `".$this->dbTable."` ".$this->setupWhere()." ".$this->dbOrder);
	}
	
	public function updateDb(){
		mysql_query("UPDATE `".$this->dbTable."` SET ".$this->setupParamsUpdate()." ".$this->setupWhere());
		return mysql_affected_rows();
	}
	
	public function insertDb(){		
		return mysql_query("INSERT INTO `".$this->dbTable."` ".$this->setupParamsInsert());
	}	
	
	public function deleteDb(){
		mysql_query("DELETE FROM `".$this->dbTable."` ".$this->setupWhere());
		return mysql_affected_rows(); 
	}
	
	public function commit() {
		mysql("COMMIT");
	}
	
	public function numRows($query){
		if($num_rows = mysql_num_rows($query)) {
			return $num_rows;
		}
	}
	
	public function fetch($query){
		$array = array();
		
		while($value = mysql_fetch_object($query)) {
			$array[] = $value;
		}
		
		return $array;
	}
	
	public function openConnection($dbUrl, $dbDataBasePort, $dbUser, $dbPasswd, $dbDataBase){
		$this->connectionLink = mysql_connect($dbUrl, $dbUser, $dbPasswd);
		
		if($this->connectionLink && mysql_select_db($dbDataBase)) {
			return true;
		} else {
			return false;
		}
	}
	
	public function closeConnection(){
		if(mysql_close($this->connectionLink)) {
			return true;
		} else {
			return false;
		}
	}
}
/*

function mysql_insert($table, $inserts) {
    $values = array_map('mysql_real_escape_string', array_values($inserts));
    $keys = array_keys($inserts);
        
    return mysql_query('INSERT INTO `'.$table.'` (`'.implode('`,`', $keys).'`) VALUES (\''.implode('\',\'', $values).'\')');
}

INSERT INTO TABLE (ID, INPUT1, INPUT2) VALUES (1, 'VALUE11', 'VALUE12'), (2, 'VALUE21', 'VALUE22')

CREATE TABLE  `vlabs`.`TAB_TESTE` (
`COD_TESTE` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`TESTE_TITULO` VARCHAR( 255 ) NOT NULL ,
`TESTE_TEXTO` VARCHAR( 255 ) NOT NULL
) ENGINE = INNODB;
 */

?>