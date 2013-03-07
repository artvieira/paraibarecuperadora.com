<?php
require_once '../resources/Database/DbReactor/Connection.php';

class ConnectionFactory {

	private $session;
	
	private $cnx;
	
	public function __destruct() {
		//$this->cnx->closeConnection();
		//$this->cnx->__destruct();
	}
	
	public function openConnection($_dataBase, $_table) {
		$this->cnx = new Connection($_dataBase);
		$this->session = $this->cnx->callQueryDb();
		
		if($this->cnx->openConnection()) {
			$this->session->setTable($_table);
		} else {
			echo "Sem conexão com o banco!";
		}
	}
	
	public function getSession() {
		return $this->session;
	}
}
?>