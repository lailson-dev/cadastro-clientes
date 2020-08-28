<h2>Dados cadastrais de <?= $userFound->name; ?></h2>
<form action="/update?id=<?= $userFound->id; ?>" method="POST" class="main__page-form">
	<input type="hidden" name="id" value="<?= $userFound->id; ?>">
	<input type="text" name="name" data-js="name" value="<?= $userFound->name; ?>">
	<input type="email" name="email" data-js="email" value="<?= $userFound->email; ?>">
	<input type="text" name="cpf" data-js="cpf" value="<?= mask('###.###.###-##', $userFound->cpf); ?>">
	<input type="text" name="phone" data-js="phone" value="<?= mask('(##) #####-####', $userFound->phone); ?>">
	<button type="submit">Atualizar</button>
</form>