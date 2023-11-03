# Rockets-Low-Costs

O projeto Rockets Low Costs tem como objetivo principal a implementação de um CRUD de usuários, proporcionando autenticação de usuário por meio de middlewares. Além disso, o sistema permite a criação de cotações, incluindo imagens de foguetes e dados gerais associados a esse CRUD. Há também a funcionalidade de um CRUD para o lançamento de foguetes, onde é possível definir a data exata de lançamento.

Projeto em Produção Hospedagem: Hostoo.
https://kqc6um8j.srv-108-181-92-67.webserverhost.top/login

Como instalar o projeto
Faça o download do ZIP do projeto.
Instale o XAMPP, PHP e Composer.
Coloque o arquivo .env na raiz do projeto.
No terminal do projeto, execute: composer install.
No terminal do projeto, inicie o servidor com o comando: php artisan serve.
Após a instalação do XAMPP, inicie o MySQL.
No PHPMyAdmin, crie um banco de dados chamado rocket_database.
Na raiz do projeto, execute: php artisan migrate para criar as tabelas no banco de dados.
Versão do PHP utilizada: PHP 8.2.11
Tecnologias Utilizadas
PHP 8
Laravel 10
Middleware
Autenticação de Usuário (Breeze)
Bootstrap v5.3
HTML
Toastr (notificações e alertas)
InputMask para máscara de dinheiro
Arquivo .env
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:2jHxuK7Q7WuVwcs9sJmanRgF/1pRlNGQx3vvA058jkI=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rocket_database
DB_USERNAME=root
DB_PASSWORD=


BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_APP_NAME="${APP_NAME}"
VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
