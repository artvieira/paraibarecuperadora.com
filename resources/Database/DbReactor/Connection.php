<?php

class Connection {
	public $instanceToUseHere;
	
	private $configXml;
	
	private $dbSqlType;
	
	private $dbName;
	private $dbUrl;
	private $dbUser;
	private $dbPasswd;
	private $dbDataBase;
	private $dbDataBasePort;
	private $connectionLink;
	
	public function __construct($_dbName){
		$this->configXml = simplexml_load_file("../resources/Database/DbReactor/Config/ConfigFile.xml");
		$this->selectDb($_dbName);
  	}
  
	public function selectDb($dbName){
		if($this->configXml->MultiDb=="true"){
	  		foreach ($this->configXml->DbConfig->DataBase as $test){
	  			if(utf8_decode($test->nameDatabase)==$dbName){
					$this->dbSqlType		= utf8_decode($test->sqlLang);
					$this->dbUrl			= utf8_decode($test->url);
					$this->dbDataBasePort	= utf8_decode($test->port);
					$this->dbDataBase		= utf8_decode($test->dataBase);
					$this->dbUser			= utf8_decode($test->user);
					$this->dbPasswd			= utf8_decode($test->passwd);
					break;
				}
	  		}
  		} else {
  			$this->dbSqlType		= utf8_decode($this->configXml->DbConfig->DataBase->sqlLang);
  			$this->dbName			= utf8_decode($this->configXml->DbConfig->DataBase->nameDatabase);
			$this->dbUrl			= utf8_decode($this->configXml->DbConfig->DataBase->url);
			$this->dbDataBase		= utf8_decode($this->configXml->DbConfig->DataBase->dataBase);
			$this->dbDataBasePort	= utf8_decode($this->configXml->DbConfig->DataBase->port);	
			$this->dbUser			= utf8_decode($this->configXml->DbConfig->DataBase->user);
			$this->dbPasswd			= utf8_decode($this->configXml->DbConfig->DataBase->passwd);
  		}
	}
	
	public function callQueryDb() {
		if ($this->instanceToUseHere == null) {
			if ($this->dbSqlType=="mysql") {
				include_once '../resources/Database/DbReactor/InfoMySql.php';
				$this->instanceToUseHere = new InfoMySql();
			} elseif ($this->dbSqlType=="postgres") {
				include_once '../resources/Database/DbReactor/InfoPostgreSql.php';
				$this->instanceToUseHere = new InfoPostgreSql();
			}
		}
		return $this->instanceToUseHere;
	}
	
	public function openConnection(){	
		return $this->instanceToUseHere->openConnection($this->dbUrl, $this->dbDataBasePort, $this->dbUser, $this->dbPasswd, $this->dbDataBase);
	}
	
	public function closeConnection(){
		return $this->instanceToUseHere->closeConnection();
	}
}
?>