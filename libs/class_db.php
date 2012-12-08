<?php
class MysqlDatabase{
	public $connection;
	function __construct(){$this->open_connection();}
		
	public function open_connection(){
                $this->connection =  mysql_connect(DB_SERVER,DB_USER,DB_PASS) or die("DB connection error");
                mysql_select_db(DB_NAME,$this->connection) or die("DB table selection errror");}
	
	public function close_connection() {
		if(isset($this->connection)) {
			mysql_close($this->connection);
			unset ($this->connection);
		}
	}
	public function query($sql){
		$result = mysql_query($sql,$this->connection);
		return $result;
	}
	public function secure_string($string){return htmlentities(mysql_real_escape_string($string,$this->connection),ENT_QUOTES);}
}
$db = new MysqlDatabase();
?>