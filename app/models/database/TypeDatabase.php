<?php

namespace app\models\database;

use app\interfaces\InterfaceTypeDatabase;
use app\models\database\PdoTypeDatabase;
use app\models\database\Connection;

class TypeDatabase
{
	private $interfaceTypeDatabase;

	public function __construct(InterfaceTypeDatabase $interfaceTypeDatabase)
	{
		$database = new Connection(new PdoConnection);
		$this->interfaceTypeDatabase = $database->connectDatabase();
	}

	public function getDatabase()
	{
		return $this->interfaceTypeDatabase;
	}
}