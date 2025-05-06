# Projeto Laravel - Ambiente de Desenvolvimento

Este projeto é desenvolvido em Laravel e foi estruturado para rodar localmente com suporte a filas (`queues`) utilizando o driver `database`.

---

## ✅ Requisitos do Sistema

Certifique-se de que os seguintes softwares estejam instalados:

- **PHP** >= 8.1
- **Composer**
- **MySQL** (ou MariaDB)
- **Node.js** e **npm**
- **FFMPEG** Link de download = https://www.gyan.dev/ffmpeg/builds/  No debian ja vem instalado
- **Git**
- **Extensões PHP**: `mbstring`, `openssl`, `pdo`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`

---

## 📁 Clonando o Projeto

```bash
git clone https://github.com/OctaBit-Tech-Soluctions-MZ/Ancha-s-Dreams.git
cd Ancha-s-Dreams

## Configuração Inicial
1. Instalar dependências PHP

composer install

2. Instalar dependências JavaScript

npm install && npm run dev

3. Configurar o .env

cp .env.example .env

Edite o arquivo .env com suas configurações de banco de dados, e-mail, e outras credenciais necessárias.
4. Gerar a chave da aplicação

php artisan key:generate

##🗃️ Migrações e Seeds
Criar estrutura do banco de dados

php artisan migrate

Popular o banco com dados iniciais

php artisan db:seed

##✉️ Configurar Fila (Queue) com Driver Database
1. No .env, defina:

QUEUE_CONNECTION=database

ja esta assim por default

3. Rodar o worker (para processar jobs em fila)

php artisan queue:work

💡 Em ambiente de desenvolvimento, você pode deixar esse comando rodando em um terminal separado. Em produção, use supervisor.

4. Reiniciar workers após mudanças nos jobs

php artisan queue:restart
