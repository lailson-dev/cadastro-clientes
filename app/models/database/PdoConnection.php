<?php

namespace app\models\database;

use app\interfaces\InterfaceConnectDatabase;
use PDO;

class PdoConnection implements InterfaceConnectDatabase
{
	private $pdo;

	public function __construct()
	{
		try {
			$this->pdo = new PDO('mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
			$this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		} catch (PDOException $exception) {
			throw new \Exception("Could not connect to the database: {$exception}");									
		}
	}

	public function connectDatabase()
	{
		return $this->pdo;
	}

}