<?php

namespace app\models\database;

use app\interfaces\InterfaceTypeDatabase;

class TypeDatabase
{
	private $interfaceTypeDatabase;

	public function __construct(InterfaceTypeDatabase $interfaceTypeDatabase)
	{
		$this->interfaceTypeDatabase = $interfaceTypeDatabase;
	}

	public function getDatabase()
	{
		return $this->interfaceTypeDatabase;
	}
}