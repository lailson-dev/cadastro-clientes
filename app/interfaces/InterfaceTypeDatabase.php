<?php

namespace app\interfaces;

interface InterfaceTypeDatabase
{
	public function prepare($sql);
	public function bindValue($key, $value);
	public function execute();
	public function rowCount();
	public function fetch();
	public function fetchAll();
}