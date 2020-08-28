<h2>Tem certeza que deseja deletar o cliente <?= $userFound->name; ?>?</h2>
<form action="/delete?id=<?= $userFound->id; ?>" method="POST" class="main__page-form form-update">
	<input type="hidden" name="id" value="<?= $userFound->id; ?>">
	<div class="form-button">
		<a href="/" class="button button-no">Não</a>
		<button class="button button-yes" type="submit">Sim</button>
	</div>
</form>