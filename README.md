## Sobre o projeto

Projeto com fim de facilitar o controle de turmas e alunos de uma instituição, tendo a possibilidade de fazer o cadastro de turmas e seus alunos. 

## Objetivo do projeto

O intuito deste teste é avaliar a capacidade do candidato em relação aos seguintes critérios:

- Clareza e padronização do código-fonte;
- Organização da distribuição da lógica de acordo com os padrões estabelecidos para o framework Laravel;
- Uso de recursos e arquitetura do Laravel;
- Soluções aplicadas para os problemas apresentados;

## Requisitos do projeto

Link para os detalhes solicitados para o projeto: `https://bussola.slite.com/p/note/PDHkHu6AoiJ8ZTxewLuq9d`

## Requisitos técnicos

- PHP >= 7.2
- Composer
- NPM
- MySQL >= 5.7
- Criar base de dados e alterar os dados nas configurações do Laravel

## Fork

Fork realizado do projeto `https://github.com/SujithJr/laravel-auth-custom` por conter a lógica de autenticação.

## Comandos à serem executados após baixar o projeto

### Instalar Packages
`composer install`

### Migrate DB
`php artisan migrate`

### Executar inserts necessários
`php artisan db:seed`

### Iniciar o servidor de desenvolvimento
`php artisan serve`

## Dados para realizar o login na aplicação

Usuário: `test@test.com`
Senha: `123456`

## Melhorias futuras

- Adicionar filtro de busca nas listagens
- Adicionar controle de `transaction` nos `inserts`, `updates` e `deletes`
- Adicionar logs na aplicação
- Adicionar todos os textos nos arquivos de tradução