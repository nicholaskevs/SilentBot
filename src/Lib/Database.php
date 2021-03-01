<?php

namespace SilentBot\Lib;

Class Database
{
	protected $host;
	protected $username;
	protected $password;
	protected $dbname;
	protected $conn;
	
	public function __construct(string $host, string $username, string $password, string $dbname) {
		$this->host = $host;
		$this->username = $username;
		$this->password = $password;
		$this->dbname = $dbname;
	}
	
	protected function connect() {
		$this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->dbname);
		
		if(mysqli_connect_errno()) {
			echo "Failed to connect to database: " . mysqli_connect_error(), PHP_EOL;
			die();
		}
	}
	
	protected function close() {
		mysqli_close($this->conn);
	}
	
	public function execute(string $query) {
		$this->connect();
		
		$result = mysqli_query($this->conn, $query);
		$array = mysqli_fetch_all($result, MYSQLI_ASSOC);
		
		mysqli_free_result($result);
		$this->close();
		
		return $array;
	}
}