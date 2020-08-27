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

			$this->log->writeLog($exception->getCode());			
		}
	}

	public function connectDatabase()
	{
		return $this->pdo;
	}
}