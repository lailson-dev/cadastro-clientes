<?php

namespace app\models\database;

use app\interfaces\InterfaceConnectDatabase;

class Connection implements InterfaceConnectDatabase
{
	private $interfaceConnectDatabase;

	public function __construct(InterfaceConnectDatabase $interfaceConnectDatabase)
	{
		$this->interfaceConnectDatabase = $interfaceConnectDatabase;
	}

	public function connectDatabase()
	{
		$this->interfaceConnectDatabase->connectDatabase();
	}
}