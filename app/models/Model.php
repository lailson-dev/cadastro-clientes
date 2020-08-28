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

	public function create($request)
	{
		$sql = "INSERT INTO {$this->table} (name, email, cpf, phone) VALUES (:name, :email, :cpf, :phone)";
		$this->typeDatabase->prepare($sql);
		$this->typeDatabase->bindValue(':name', $request->name);
		$this->typeDatabase->bindValue(':email', $request->email);
		$this->typeDatabase->bindValue(':cpf', clearString($request->cpf));
		$this->typeDatabase->bindValue(':phone', clearString($request->phone));

		return $this->typeDatabase->execute();
	}

}