<img alt="Cadastro de Clientes" src="https://i.imgur.com/3hsQKSK.jpg" />

<h3 align="center">
  PHP | Desafio 1 - Cadastro de clientes
</h3>

## 🐘 Sobre o desafio

Neste desafio, desenvolvi uma aplicação para gestão de clientes, pondo em prática minha experiência com PHP junto ao MySQL(MariaDB). Pude também, aplicar
um pouco os conceitos de **SOLID** e **Object Calisthenics**, conceitos **S-O-I-D do SOLID, Only One Level Of Indentation Per Method, Don’t use “Else” keyword, Don’t Abbreviate e No Getters/Setters do Object Calisthenics, Tell, Don't Ask e Fail Fast. Além das PSR-3 e PSR-4, para Logs e Autoloads.**

Utilizei também a arquitetura **MVC - Model, View, Controller** para melhor estrutura da aplicação.

Essa aplicação tem a finalidade de gerir clientes de  uma pequena empresa. É possível a criação, listagem, deleção e atualização de registros.


## Tecnologias utilizadas :memo:

- [PHP](https://www.php.net/)
- [MVC](https://pt.wikipedia.org/wiki/MVC)
- [MySQL](https://www.mysql.com/)
- [Composer](https://getcomposer.org/)
- [Bootstrap](https://getbootstrap.com.br/)
- [Dotenv](https://github.com/vlucas/phpdotenv)
- [Monolog](https://github.com/Seldaek/monolog)

## Como utilizar 🤔

Primeiramente clone este repositório.

```
git clone https://github.com/lailson-dev/cadastro-clientes.git
```
Entre na pasta `cadastro-clientes` e rode o comando `composer install`, para instalar as dependências do projeto.

Em seguida, rode o comando `php -S localhost:8080` para iniciar o servidor embutido do PHP.

```
importe o arquivo app_crud.sql que está na pasta database para o banco de dados
renomeie o arquivo .env-example para .env na raiz do projeto e configure as variáveis
de conexão com o banco de dados
```

Agora é só testar :smile:
