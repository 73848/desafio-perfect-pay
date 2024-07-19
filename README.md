## Passo a passo para rodar o projeto 

# Instalar o php versão > 8.2;
# Instalar o gerenciador de pacotes Composer;
# rodar o comando composer install
# rodar os comandos no terminal da  pasta 
copy .env.example .env
php artisan key:generate

# configurar o .env mudando para a conexão com db de sua escolha e rode o comando php artisan migrate

# Por fim, basta rodar o comando php artisan server e utilizar a aplicação.


