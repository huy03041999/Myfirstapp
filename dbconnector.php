<?php
class DBconnector{
	public $host = 'localhost';
	public $dbname = 'ass2webdesign';
	public $un = 'root';
	public $pw = '';
	public function runQuery($sql)
	{
		$conn = new mysqli($this->host,$this->un,$this->pw,$this->dbname);
		$result = $conn -> query($sql); 
		$rows = mysqli_fetch_all($result,MYSQLI_ASSOC); 
		$conn -> close(); 
		return $rows;
	}
	public function execStatement($sql)
	{
		$conn = new mysqli($this->host, $this->un, $this->pw, $this->dbname);
		//hchay cautruy van
		$result = $conn->query($sql);
		//dong ket noi
		$conn->close();
	}
}
?>