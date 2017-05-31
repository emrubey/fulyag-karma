<?php
	class DBConnect{
		var $user;
		var $host;
		var $password;
		var $db;
		var $db_link;
		var $conn = false;

		function _construct() {
			$this->conn = false;
		}
		function conn($host='localhost', $user='root', $pass='', $db='fulyag_db')
		{
			// connection function
			$this->host= $host;
			$this->user= $user;
			$this->password= $pass;
			$this->db=$db;

			$this->db_link = mysql_connect($this->host, $this->user, $this->password, true);
			if (!$this->db_link) {
				return false;
			}
			else{
				$db= mysql_select_db($this->db, $this->db_link);
				if (!$db) {
					return false;
				}
				$this->conn = true;
				//echo "Success";
				return $this->db_link;
			}
		}
		function close(){
			if($this->conn){
				mysql_close($this->db_link);
				$this->conn = false;
			}
			else{
				//echo "Already Closed";
			}
		}
	}
?>
