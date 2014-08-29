<?php
	
	/**
	* This class allows you to connect to the database and close him.
	* Esta clase permite conectarse a la base de datos y cerrar la conexion.
	*/
	class Connect {
		
		// atributos //host //usuario //pass //database //puerto //connection //estado
		private $host, $port, $dbname, $user, $password, $connection, $status;

		/**
		* Constructor que recibe los datos para la conexion.
		* The constructor receives the data for connecting to the database.
		*/
		function Connect($shost, $sport, $sdbname, $suser, $spass){

			$this->host = $shost;
			$this->port = $sport;
			$this->dbname = $sdbname;
			$this->user = $suser;
			$this->password = $spass;

		}

		public function conn() {

			$this->connection = pg_connect("host='$this->host' port='$this->port' dbname='$this->dbname' user='$this->user' password='$this->password'") 
			or die ("Error no se pudo conectar".pg_last_error());	

			$this->status = pg_connection_status($this->connection);

			if ($this->status === PGSQL_CONNECTION_OK){
	
				echo "Conexión exitosa.<br><br>";

			} else {
   	
				echo "<br><br>Conexión fallida.<br><br>";	

			//printf("Conexión fallida: %s\n",pg_last_error($connection));   
   			 	exit(); 
			}

		}

		public function close() {
				
			return pg_close($this->connection)."<br><br>\tConexion cerrada.<br><br>";
			
		}
	}	
		/*$con = new Connect("localhost", "5432", "PLANCHETAS", "postgres", "database");
		echo "holaaaaaaaaaaaaaaaaa";
		$ret = $con->conn();*/
	
?> 