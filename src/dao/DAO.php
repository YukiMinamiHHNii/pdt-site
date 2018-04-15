<?php
	abstract class DAO{

		private static $db_host='localhost';
		private static $db_user='pdt-user';
		private static $db_pass='H567kil16A';
		private static $db_name='poke-data-tools';
		private static $db_charset='utf-8';
		private $connection;
		private $result;
		protected $statement;
		protected $rows= array();

		abstract protected create();
		abstract protected read();
		abstract protected update();
		abstract protected delete(); 

		private function connect(){
			$connection= new mysqli(
				self::$db_host,
				self::$db_user,
				self::$db_pass,
				self::$db_name,
			);

			try{

				if($this->$connection->connect_errno){
					throw new Exception(
						"<h2>Error while trying to connect: </h2>
						<p>$this->connection->connect_errno</p>
						<p>$this->connection->connect_error</p>"
					);
				}else{
					$this->connection->set_charset($db_charset);
				}

			}catch(Exception $e){
				echo "<h2>Error while connecting to DB - {$e}</h2>";
				die();
			}
		}

		private function disconnect(){
			$this->connection->close();
		}

		private parse_query_result($result){
			try{
				if(!$result){
					throw new Exception(
						"<h2>Unsuccessful query result: </h2>
						<p>$this->connection->errno</p>
						<p>$this->connection->error</p>
						<p>offending query: $this->statement</p>"
					);
				}
				
			}
			}catch(Exception $e){
				echo "<h2>Error while executing query - {$e}</h2>";
			}
		}

		private writeFromQuery(){
			$this->connect();
			$this->parse_query_result($this->result=$this->connection->query(parse_query_result($this->statement)));
			$this->disconnect();
		}

		private readFromQuery(){
			$this->connect();
			$this->parse_query_result($this->result=$this->connection->query(parse_query_result($this->statement)));
			while($this->rows[]=>$this->result->fetch_assoc()):
			$this->result->free();
			$this->disconnect();

			return $this->rows;

		}

	}