<h2>Cadastro de Clientes</h2>
<form action="app/controllers/site/UserController.php" method="POST" class="main__page-form" >
	<input type="text" name="input-name" placeholder="Nome completo (Obrigatório)" required>
	<input type="email" name="input-email" placeholder="E-mail (Obrigatório)" required>
	<input type="text" name="input-cpf" placeholder="CPF (Obrigatório)" required>
	<input type="phone" name="input-phone" placeholder="Telefone (Opcional)">
	<button type="submit">Cadastrar</button>
</form>