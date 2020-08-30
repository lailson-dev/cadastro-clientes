<?php

namespace app\models;

use app\models\database\PdoTypeDatabase;
use app\models\database\TypeDatabase;

abstract class Model
{
	protected $typeDatabase;

	public function __construct()
	{
		$database = new TypeDatabase(new PdoTypeDatabase);
		$this->typeDatabase = $database->getDatabase();
	}

	abstract protected function create($sql, $request);

	abstract protected function update($sql, $request);

	abstract public function save($request);

	public function show()
	{
		$sql = "SELECT * FROM {$this->table}";
		$this->typeDatabase->prepare($sql);
		$this->typeDatabase->execute();
		
		return $this->typeDatabase->fetchAll();
	}

	public function find($field, $value)
	{
		$sql = "SELECT * FROM {$this->table} WHERE {$field} = :{$field}";
		$this->typeDatabase->prepare($sql);
		$this->typeDatabase->bindValue(":{$field}", $value);
		$this->typeDatabase->execute();
		
		return $this->typeDatabase->fetch();
	}

	public function rowCount()
	{
		$sql = "SELECT * FROM {$this->table}";
		$this->typeDatabase->prepare($sql);
		$this->typeDatabase->execute();
		
		return $this->typeDatabase->rowCount();
	}	

	public function destroy($id)
	{
		$sql = "DELETE FROM {$this->table} WHERE id = :id";
		$this->typeDatabase->prepare($sql);
		$this->typeDatabase->bindValue(':id', $id);

		return $this->typeDatabase->execute();
	}

}