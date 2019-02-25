## Teste Loja simples

Para o desenvolvimento  foram utilizadas as seguintes tecnologias:

PHP 7, Laravel 5.7, Mysql, Bootstrap 4 e algumas outras bibliotecas.

Ferramentas necesárias para rodar o projeto:

- PHP 7
- Composer
- NodeJS
- MySQL
 
Instalação

Baixar o repositório no diretório em que a aplicação vai rodar:
```
git clone https://github.com/fernandof1987/loja.git
```
Acessar o diretório:
```
cd loja
````
Instalar as dependências frontend:
```
npm install
```
Compilar os assets:
```
npm run production
```
Instalar as dependências backend:
```
composer install
```

Duplicar o arquivo .env.example na raiz do projeto e renomeá-lo para .env

Criar um novo banco de dados no SGBD que será utilizado.

Configurar a seguinte sessão no arquivo .env como no exemplo abaixo, substituindo pelos dados do banco a ser utilizado:

EX:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=loja
DB_USERNAME=root
DB_PASSWORD=123456
```
Gerar uma nova chave de criptografia:
```
php artisan key:generate
```
Ainda no diretório do projeto vamos gerar as migrações, digite:
```
php artisan migrate
```
O comando abaixo irá efetuar a população das tabelas com dados faker,
as tabelas populadas serão: products, categories e product_category:
```
php artisan db:seed
```
Agora para iniciar o servidor basta digitar:
```
php artisan serve
```
<b>Considerações</b>

Não há telas para cadastros de Produtos, Categorias ou tela para relaciona-los,
a população dos dados é toda feita através de seeders.

Não há usuário pré cadastro por seeders, basta clicar na barra superior em registrar-se.

Os produtos são armazenados no carrinho por session, para finalizar a compra é necessário logar-se, os produtos do carrinho são mantidos após o login.

O registro de login está no padrão do laravel basta preencher com Nome, Email e Senha.

Os dados de entrega do pedido serão solicitados ao finalizar a compra.

Ao fazer logoff o carrinho será limpo.

