<h2>Listagem de Clientes</h2>

<?php if (isset($_SESSION['flash'])): ?>
<div class="main__page-message">
	<?php foreach (getFlashMessage() as $index => $message): ?>
	<span class="<?= $index; ?>"><?= $message; ?></span>
	<?php endforeach; ?>
</div>
<?php
	endif;

	if ($user->allRecords()): ?>

<div class="main__page-table">
	<table class="table table-striped ">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Nome</th>
	      <th scope="col">Email</th>
	      <th scope="col">CPF</th>
	      <th scope="col">Telefone</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php foreach ($users as $user): ?>
	    <tr>
	      <th scope="row"><?= $user->id; ?></th>
	      <td><?= $user->name; ?></td>
	      <td><?= $user->email; ?></td>
	      <td><?= mask('###.###.###-##', $user->cpf); ?></td>
	      <td><?= mask('(##) #####-####', $user->phone) ?></td>
	      <td><a href="/editar?id=<?= $user->id; ?>" class="btn btn-primary">Editar</a></td>
	      <td><a href="/deletar?id=<?= $user->id; ?>" class="btn btn-danger">Deletar</a></td>
	    </tr>
		<?php endforeach; ?>
	  </tbody>
	</table>
</div>
<?php else: ?>
	<h6>Não há cliente registrado em nossa base de dados.</h6>
<?php endif; ?>