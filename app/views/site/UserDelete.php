<h2>Tem certeza que deseja deletar o cliente <?= $userFound->name; ?>? <a href="/">Voltar atrás...</a></h2>
<form action="/delete?id=<?= $userFound->id; ?>" method="POST" class="main__page-form">
	<input type="hidden" name="id" value="<?= $userFound->id; ?>">
	<button type="submit">Sim</button>
</form>