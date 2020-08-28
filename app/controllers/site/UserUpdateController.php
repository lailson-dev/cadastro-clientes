<?php

use app\classes\FilterInput;
use app\classes\Validate;
use app\models\site\User;

$user = new User;

if (!empty($_POST)) {	
	$postArray = filter_input_array(INPUT_POST, FILTER_DEFAULT);

	$filted = (new FilterInput)->filterInput($_POST);
	$validated = Validate::validate($filted);

	if($filted->id !== $_GET['id']) {
		flash(['message__error' => "Não foi possível atualizar os dados do cliente!"]);

		return redirect('/');
	}
	
	if($validated) {
		$user->save($filted);
		flash(['message__success' => "Os dados do cliente {$filted->name} foram alterados com sucesso!"]);

		return redirect('/');
	}

	flash(['message__error' => "Erro ao atualizar os dados do cliente, tente novamente mais tarde!"]);

	redirect('/');
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	$userId = filter_var( $_GET['id'], FILTER_VALIDATE_INT);
	$userFound = $user->find($userId);

	return $layout->add('site/UserUpdate');
}

redirect('/');