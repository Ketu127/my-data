<?php
	class Database{
		private $host = DB_HOST;
		private $user = DB_USER;
		private $pass = DB_PASS;
		private $dbname = DB_NAME;
		
		private $dbh;
		private $error;
		private $stmt;
		
		public function __construct(){
			//set DNS
			$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
			//set Options
			$options = array(
				PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			);
			//create new PDO Instance
			try{
				$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
			}//catch any error
			catch(PDOException $e){
				$this->error = $e->getMessage();
			}
		}
		
		public function query($query){
			$this->stmt = $this->dbh->prepare($query);
		}
		
		public function bind($param, $value, $type = null){
			if(is_null( $type )){
				switch(true){
					case is_int( $value ) :
						$type = PDO::PARAM_INT;	
						break;
					case is_bool( $value ) :
						$type = PDO::PARAM_BOOL;	
						break;
					case is_null( $value ) :
						$type = PDO::PARAM_NULL;	
						break;
					default :
						$type = PDO::PARAM_STR;
					
				}
			}
			$this->stmt->bindValue( $param, $value, $type );
		}
		
		public function execute(){
			return $this->stmt->execute();
		}
		
		
		public function resultset(){
			$this->execute();
			return $this->stmt->fetchAll(PDO::FETCH_OBJ);
		}
		public function single(){
			$this->execute();
			return $this->stmt->fetch(PDO::FETCH_OBJ);
		}
		
		
		public function  rowCount(){
        return $this->stmt->rowCount();
    }
		
		public function lastInsertId(){
			return $this->dbh->lastInsertId();
		}
		
		public function beingTransaction(){
			return $this->dbh->beingTransaction();
		}
		
		public function endTransaction(){
			return $this->dbh->commit();
		}
		
		
		public function cancelTransaction(){
			return $this->dbh->rallBack();
		}
	}
?>