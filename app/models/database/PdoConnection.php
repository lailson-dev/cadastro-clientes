<?php

namespace app\models\database;

use app\services\Log;
use app\interfaces\InterfaceConnectDatabase;
use PDO;

class PdoConnection implements InterfaceConnectDatabase
{
	private $pdo;
	private $log;

	public function __construct()
	{
		try {
			$this->pdo = new PDO('mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
			$this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		} catch (\PDOException $exception) {
			$this->log = new Log('database');

			$this->writeLog($exception->getCode());			
		}
	}

	public function connectDatabase()
	{
		return $this->pdo;
	}

	private function writeLog($code)
	{
		switch ($code) {
			case '1049':
				$this->log->fileStreamHandler("Unknown database 'client'");
				break;

			case '1045':
				$this->log->fileStreamHandler("Access denied for user");
				break;
			
			case '2002':
				$this->log->fileStreamHandler("No connections could be made because the target machine actively refused them");
				break;
		}
	}

}