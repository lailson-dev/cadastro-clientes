<h2>Listagem de Clientes</h2>
<div class="main__page-table">
	<table class="table">
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
	      <th scope="row">1</th>
	      <td><?= $user->name; ?></td>
	      <td><?= $user->email; ?></td>
	      <td><?= $user->cpf; ?></td>
	      <td><?= $user->phone; ?></td>
	      <td><a href="/editar?id=<?= $user->id; ?>">Editar</a></td>
	      <td><a href="/deletar?id=<?= $user->id; ?>">Deletar</a></td>
	    </tr>
		<?php endforeach; ?>
	  </tbody>
	</table>
</div>