<?php

class Connection{
	private $user;
	private $host;
	private $pass;
	private $db;

	public function __construct()
	{
		$this->user = "root";
		$this->host = "localhost";
		$this->pass = "";
		$this->db	= "costa_de_salina";
	}

	public function connect()
	{
		$link = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
		return $link;
	}

	public function close($link)
	{
		mysqli_close($link);
	}
}
?>