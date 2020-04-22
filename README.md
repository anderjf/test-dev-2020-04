## Sobre o projeto

Projeto com fim de facilitar o controle de turmas e alunos de uma instituição, tendo a possibilidade de fazer o cadastro de turmas e seus alunos. 

## Objetivo do projeto

O intuito deste teste é avaliar a capacidade do candidato em relação aos seguintes critérios:

- Clareza e padronização do código-fonte;
- Organização da distribuição da lógica de acordo com os padrões estabelecidos para o framework Laravel;
- Uso de recursos e arquitetura do Laravel;
- Soluções aplicadas para os problemas apresentados;

## Requisitos

- PHP >= 7.2
- Composer
- NPM
- MySQL >= 5.7

## Fork

Fork realizado do projeto `https://github.com/SujithJr/laravel-auth-custom` por conter a lógica de autenticação.

## Comandos à serem executados após baixar o projeto

### Instalar Packages
`composer install`

### Adicionar Bootstrap
`npm install && npm run dev`

### Migrate DB
`php artisan migrate`

### Executar inserts necessários
`php artisan db:seed`

### Iniciar o servidor de desenvolvimento
`php artisan serve`