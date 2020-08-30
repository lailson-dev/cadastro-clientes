<?php

use app\classes\FilterInput;
use app\classes\Validate;
use app\models\site\User;

if (!empty($_POST)) {
	$postArray = filter_input_array(INPUT_POST, FILTER_DEFAULT);

	$filterInput = new FilterInput;	
	$filted = $filterInput->filterInput($_POST);

	$validated = Validate::validate($filted);
	$user = new User;

	if($validated) {
		if ($user->hasUser($filted->cpf) > 0) {
			flash(['message__info' => "O CPF {$filted->cpf} já está cadastrado em nossa base de dados!"]);

			return redirect('/');
		}

		$user->save($filted);
		flash(['message__success' => "O cliente {$filted->name} foi cadastrado com sucesso!"]);

		return redirect('/');
	}

	flash(['message__error' => "Erro ao cadastrar o cliente, tente novamente mais tarde!"]);

	redirect('/');
}

$layout->add('site/UserCreate');