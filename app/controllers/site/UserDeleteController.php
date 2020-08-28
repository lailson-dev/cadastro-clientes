<?php

use app\models\site\User;
use app\classes\FilterInput;

$user = new User;

if (!empty($_POST)) {

	$idFilted = (new FilterInput)->filterInput($_POST);

	if($idFilted->id !== $_GET['id']) {
		flash(['message__error' => "Não foi possível deletar o cliente!"]);

		return redirect('/');
	}
	
	if($user->destroy((int)$idFilted->id)) {
		flash(['message__success' => "Cliente removido com sucesso!"]);

		return redirect('/');
	}

	flash(['message__error' => "Erro ao deletar os dados do cliente, tente novamente mais tarde!"]);

	redirect('/');
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	$userId = filter_var( $_GET['id'], FILTER_VALIDATE_INT);
	$userFound = $user->find($userId);

	return $layout->add('site/UserDelete');
}

redirect('/');