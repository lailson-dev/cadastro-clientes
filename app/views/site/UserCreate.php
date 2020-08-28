<h2>Cadastro de Clientes</h2>
<form action="/store" method="POST" name="user-create" class="main__page-form" novalidate>
	<input type="text" name="name" placeholder="Nome completo (Obrigatório)" required>
	<input type="email" name="email" data-js="email" placeholder="E-mail (Obrigatório)" required>
	<input type="text" name="cpf" data-js="cpf" placeholder="CPF (Obrigatório)" required>
	<input type="phone" name="phone" data-js="phone" placeholder="Telefone (Opcional)">
	<button type="submit">Cadastrar</button>
</form>