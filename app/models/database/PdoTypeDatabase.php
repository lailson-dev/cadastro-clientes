<?php

namespace app\models\database;

use app\interfaces\InterfaceTypeDatabase;
use app\models\database\PdoConnection;
use app\models\database\Connection;

class PdoTypeDatabase implements  InterfaceTypeDatabase
{
	private $pdo;
	private $objectPdo;

	public function __construct()
	{
		$connection = new Connection(new PdoConnection);
		$this->pdo  = $connection->connectDatabase(); 
	}

	public function prepare($sql)
	{
		$this->objectPdo = $this->pdo->prepare($sql);
	}

	public function bindValue($key, $value)
	{
		$this->objectPdo->bindValue($key, $value);
	}

	public function execute()
	{
		$this->objectPdo->execute();
	}

	public function rowCount()
	{
		return $this->objectPdo->rowCount();
	}

	public function fetch()
	{
		return $this->objectPdo->fetch();
	}

	public function fetchAll()
	{
		return $this->objectPdo->fetchAll();
	}
}