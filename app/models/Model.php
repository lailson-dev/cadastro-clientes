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

	public function find($id)
	{
		$sql = "SELECT * FROM {$this->table} WHERE id = :id";
		$this->typeDatabase->prepare($sql);
		$this->typeDatabase->bindValue(':id', $id);
		$this->typeDatabase->execute();
		
		return $this->typeDatabase->fetch();
	}

	private function rowCount($id)
	{
		$sql = "SELECT * FROM {$this->table} WHERE cpf = :cpf";
		$this->typeDatabase->prepare($sql);
		$this->typeDatabase->bindValue(':cpf', $cpf);
		$this->typeDatabase->execute();
		
		return $this->typeDatabase->rowCount();
	}

	public function hasUser($id)
	{
		return $this->rowCount($id);
	}

	private function create($sql, $request)
	{
		$this->typeDatabase->prepare($sql);
		$this->typeDatabase->bindValue(':name', $request->name);
		$this->typeDatabase->bindValue(':email', $request->email);
		$this->typeDatabase->bindValue(':cpf', clearString($request->cpf));
		$this->typeDatabase->bindValue(':phone', clearString($request->phone));

		return $this->typeDatabase->execute();
	}

	private function update($sql, $request)
	{
		$this->typeDatabase->prepare($sql);
		$this->typeDatabase->bindValue(':id', $request->id);
		$this->typeDatabase->bindValue(':name', $request->name);
		$this->typeDatabase->bindValue(':email', $request->email);
		$this->typeDatabase->bindValue(':cpf', clearString($request->cpf));
		$this->typeDatabase->bindValue(':phone', clearString($request->phone));

		return $this->typeDatabase->execute();
	}

	public function save($request)
	{
		$sql = "UPDATE {$this->table} SET name = :name, email = :email, cpf = :cpf, phone = :phone WHERE id = :id";

		if(!$request->id) {
			$sql = "INSERT INTO {$this->table} (name, email, cpf, phone) VALUES (:name, :email, :cpf, :phone)";
			return $this->create($sql, $request);
		}

		return $this->update($sql, $request);
	}

	public function destroy($id)
	{
		$sql = "DELETE FROM {$this->table} WHERE id = :id";
		$this->typeDatabase->prepare($sql);
		$this->typeDatabase->bindValue(':id', $id);

		return $this->typeDatabase->execute();
	}

}