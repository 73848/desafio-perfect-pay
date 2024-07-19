# Desafio Perfect-Pay

Implementação do desafio proposto pela empresa Perfect-pay

## Começando

Essas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local para fins de desenvolvimento e teste.

Consulte **[Implantação](#-implanta%C3%A7%C3%A3o)** para saber como implantar o projeto.

### Pré-requisitos

```
PHP versão > 8.2
Composer
```

###  Instalação


- Instalar o php versão > 8.2;
- Instalar o gerenciador de pacotes Composer;
- Rodar o comando 
``` 
composer install
```
- Rodar os comandos no terminal da  pasta 
``` 
copy .env.example .env
```
``` 
php artisan key:generate
``` 
- Configurar o .env mudando para a conexão com db de sua escolha e rode o comando php artisan migrate
- Por fim, basta rodar o comando 
``` 
php artisan server
``` 
e utilizar a aplicação.

## ⚙️ Executando os testes

- Em desenvolvimento...

###  Analise os testes de ponta a ponta


##  Construído com

Ferramentas utilizadas no projeto

* [PHP](https://www.php.net/) - Linguagem de programção 
* [MySql](https://www.mysql.com/) - Banco de Dados  
* [Laravel](https://laravel.com/) - O framework web usado
* [Composer](https://getcomposer.or) - Gerente de Dependências



