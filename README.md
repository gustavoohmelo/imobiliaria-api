Pré-requisitos
Antes de começar, verifique se você tem instalado:

✅ PHP 8.1+ (recomendado 8.2)
✅ Composer (gerenciador de dependências PHP)
✅ MySQL 8.0+ (ou MariaDB 10.3+)
✅ Git (opcional, para clonar o projeto)

Ferramentas Recomendadas
1. Postman (Melhor para testes avançados)
Download: https://www.postman.com/downloads/


2. Insomnia (Alternativa ao Postman)
Download: https://insomnia.rest/download
Interface amigável para testar endpoints


3. Navegador Web (Apenas para requisições GET)
Simplesmente acesse:

http://localhost:8000/api/proprietarios
http://localhost:8000/api/imoveis

--------------------------------------------------------------------------
 
# 🚀 Passo 1: Clonar o Projeto 

Abra o terminal e execute:

git clone https://github.com/seu-usuario/imobiliaria-api.git
cd imobiliaria-api

# 🔧 Passo 2: Configurar o Ambiente
Instale o Laravel Sail

composer require laravel/sail --dev

Configure o ambiente
Copie o arquivo de ambiente de exemplo e gere a chave da aplicação:

cp .env.example .env
php artisan key:generate

# 🐳 Passo 3: Iniciando os Containers
Instale e configure o Sail

php artisan sail:install
Durante a instalação, selecione os serviços necessários (normalmente MySQL, Redis e Mailhog).

Inicie os containers

./vendor/bin/sail up -d

# ⚙️ Passo 4: Configuração do Banco de Dados
Edite o arquivo .env com as seguintes configurações:

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=imobiliaria
DB_USERNAME=sail
DB_PASSWORD=password

Execute as migrações e seeders:

./vendor/bin/sail artisan migrate --seed

# 🚀 Passo 4: Iniciar o Servidor

Execute:
php artisan serve

A API estará disponível em:
🔗 http://localhost/api

🛠️ Comandos do Projeto
Para executar comandos dentro do container:

# Comandos Artisan
./vendor/bin/sail artisan [comando]

# Comandos Composer
./vendor/bin/sail composer [comando]

# Executar testes
./vendor/bin/sail test

# 🧪 Executar Testes
Para rodar os testes automatizados:
php artisan test

