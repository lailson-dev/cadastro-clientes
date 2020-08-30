<?php

namespace app\models\site;

use app\models\Model;

class User extends Model
{
	protected $table = 'clients';

	final protected function create($sql, $request)
	{
		$this->typeDatabase->prepare($sql);
		$this->typeDatabase->bindValue(':name', $request->name);
		$this->typeDatabase->bindValue(':email', $request->email);
		$this->typeDatabase->bindValue(':cpf', clearString($request->cpf));
		$this->typeDatabase->bindValue(':phone', clearString($request->phone));

		return $this->typeDatabase->execute();
		
	}

	final protected function update($sql, $request)
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

	public function hasUser($cpf)
	{
		return $this->find('cpf', $cpf);
	}
}