<?php

class EncoderDomain {
	
	private $xml;
	private $arrayReturn;
	
	public function __construct(){
		$this->xml = new SimpleXMLElement("../resources/Domains/Domains.xml", null, true);
		//$this->xml = new SimpleXMLElement("../resources/Domains/Domains.xml", null, true);  
  	}
  	
	public function iterateDomain($domainName, $array, $callback) {
		$this->arrayReturn = array();
		
		for ($i = 0; $i < count($this->xml); $i++) {
			$domain = $this->xml->domain[$i];
			
			if ($domain["ui"] == $domainName) {
				
				for ($j = 0; $j < count($domain->attr); $j++) {
					$attr = $domain->attr[$j];

					$this->$callback($attr, $array);
				}					
			}
		}
	}
	
	public function decodeDomainTable($domainName) {
		for ($i = 0; $i < count($this->xml); $i++) {
			$domain = $this->xml->domain[$i];
			
			if ($domain["ui"] == $domainName) {
				return $domain["db"];
			}
		}
	}
	
	public function encodeDomain($domainName, $array) {
		$this->iterateDomain($domainName, $array, "encodeDomainCallback");
		return $this->arrayReturn;
	}
	
	public function encodeDomainCallback($attr, $array) {
		$ui = $attr["ui"]."";
		$db = $attr["db"]."";
		
		$aux = @$array[$ui];
		
		if (isEmpty($aux)) {
			$aux = null;
		}
		
		$this->arrayReturn[$db] = $aux;
	}
	
	public function encodeDomainIgnoreNull($domainName, $array) {
		$this->iterateDomain($domainName, $array, "encodeDomainIgnoreNullCallback");
		return $this->arrayReturn;
	}
	
	public function encodeDomainIgnoreNullCallback($attr, $array) {
		$ui = $attr["ui"]."";
		$db = $attr["db"]."";
		
		$aux = @$array[$ui];
		
		if (!isEmpty($aux)) {
			$this->arrayReturn[$db] = $aux;
		}		
	}
	
	public function encodeDomainIgnoreTimeStamp($domainName, $array) {
		$this->iterateDomain($domainName, $array, "encodeDomainIgnoreTimeStampCallback");
		return $this->arrayReturn;
	}
	
	public function encodeDomainIgnoreTimeStampCallback($attr, $array) {
		$ui = $attr["ui"]."";
		$db = $attr["db"]."";
		$type = $attr["type"]."";
		
		if ($type != "timestamp") {
			$this->arrayReturn[$db] = $array[$ui];
		}	
	}
	
	public function decodeDomain($domainName, $array) {
		$this->iterateDomain($domainName, $array, "decodeDomainCallback");
		return $this->arrayReturn;
	}
	
	public function decodeDomainCallback($attr, $array){
		$ui = $attr["ui"]."";
		$db = $attr["db"]."";
		
		$aux = @$array[$db];
	
		if (isEmpty($aux)) {
			$aux = null;
		}
		
		$this->arrayReturn[$ui] = $aux;
	}
	
	public function decodeDomains($domainName, $array){
		$rt = array();
		
		for ($i = 0; $i < sizeof($array); $i++) {
			$k = $i."";
			
			$this->decodeDomain($domainName, (array)$array[$k]);
			$rt[] = $this->arrayReturn;;
		}
		
		return $rt;
	}
}
/*
function _main() {
	$json["id"] = "0";
	$json["titulo"] = "";
	$json["conteudo"] = "cont lol lol cont =D!";
	$json["datanoticia"] = "10/08/2012";
	
	$ed = new EncoderDomain();
	
	$ini = microtime();
	
	$array = $ed->encodeDomain("noticia", $json);
	
	echo var_dump($array);
	
	echo "<br><br>";
	
	echo var_dump($ed->decodeDomain("noticia", $array));
	
	echo "<br><br>";
	
	echo "tempo levado ".(microtime()-ini);
}
	
_main();
*/
?>