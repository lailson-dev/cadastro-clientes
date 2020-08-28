<?php

namespace app\classes;

class FilterInput
{
	private $filted = [];

	public function filterInput($request)
	{
		foreach ($request as $key => $value) {
			$this->filted[$key] = FILTER_VAR($value, FILTER_SANITIZE_STRING);
		}

		return (object) $this->filted;
	}
}