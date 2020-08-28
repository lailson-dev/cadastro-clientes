<?php

namespace app\classes;

class Validate
{
	public static function validate($postArray)
	{
		if (self::checkPost($postArray))
			flash(['message__info' => 'Preencha os campos marcados como obrigatório!']);

		if (self::hasName($postArray->name)) {
			flash(['message__info' => 'O nome do cliente não pode estar em branco']);
			return false;
		}

		if (!self::hasEmail($postArray->email)) {
			flash(['message__info' => 'O e-mail não é válido!']);
			return false;
		}

		if (!self::hasCpf($postArray->cpf)) {
			flash(['message__info' => 'Por favor, digite um CPF válido.']);
			return false;
		}

		return true;
	}

	private static function checkPost($postArray)
	{
		return (empty($postArray->email) || empty($postArray->cpf));
	}

	private static function hasName($name)
	{
		return empty($name);
	}

	private static function hasEmail($email)
	{
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	private static function hasCpf($cpf)
	{
		return isValidCpf($cpf);
	}
}