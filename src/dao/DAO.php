<?php
	abstract class DAO{

		private static $db_host='localhost';
		private static $db_user='pdt-user';
		private static $db_pass='H567kil16A';
		private static $db_name='poke_data_tools';
		private static $db_charset='utf-8';
		private $connection;

		abstract protected function create();
		abstract protected function read();
		abstract protected function update();
		abstract protected function delete();

		protected function connect(){

			error_reporting(E_ERROR);

			$this->connection= new mysqli(
				self::$db_host,
				self::$db_user,
				self::$db_pass,
				self::$db_name
			);

			try {
				if(!$this->connection->connect_error){
					$this->connection->set_charset(self::$db_charset);
				}else{
					throw new Exception("Error Processing Request", 1);
				}
				return $this->connection;
			} catch (Exception $e) {
				// die("{$e->getMessage()} ({$this->connection->connect_errno})
				// 		{$this->connection->connect_error}");
				//die() finishes completely the execution of the program
				return null;
			}

		}

		protected function disconnect(){
			$this->connection->close();
		}

	}
