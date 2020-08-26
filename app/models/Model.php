<?php

namespace app\models;

use app\models\database\PdoTypeDatabase;
use app\models\database\TypeDatabase;

class Model
{
	private $typeDatabase;

	public function __construct()
	{
		$database = new TypeDatabase(new PdoTypeDatabase);
		$this->typeDatabase = $database->getDatabase();
	}

	public function show()
	{
		$sql = "SELECT * FROM {$this->table}";
		$this->typeDatabase->prepare($sql);
		$this->typeDatabase->execute();
		
		return $this->typeDatabase->fetchAll();
	}

}