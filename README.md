# 🚀 Processo Seletivo Integrale

Este repositório contém a solução para o desafio do processo seletivo da **Integrale**. O projeto foi desenvolvido utilizando **Laravel**, **Tailwind CSS**, **JavaScript** e executado com **Docker** através do Laravel Sail.

---

## 🛠 Requisitos
Antes de iniciar, certifique-se de ter instalado:
- **Docker** e **Docker Compose** ([Instalar Docker](https://docs.docker.com/get-docker/))
- **WSL2** ([Guia de instalação](https://learn.microsoft.com/pt-br/windows/wsl/install))
- **PHP** e **Composer** ([Instalar PHP](https://www.php.net/downloads) | [Instalar Composer](https://getcomposer.org/download/))
- **Node.js** e **NPM** ([Instalar Node.js](https://nodejs.org/))

💡 **Importante:** O projeto foi desenvolvido para ser executado dentro do **WSL2**. Rodá-lo diretamente no Windows pode causar lentidão ou falhas.

---

## 📌 Configuração e Execução

### 1. Clone o repositório
```bash
git clone https://github.com/eullerlourenco/processo-seletivo-integrale.git
cd processo-seletivo-integrale
```

### 2. Copie o arquivo de ambiente
```bash
cp .env.example .env
```

### 3. Instale as dependências do PHP e Node.js
```bash
composer install
npm install
```

### 4. Suba os containers Docker
💡 **Certifique-se de estar rodando no ambiente WSL2 antes de executar este comando.**
```bash
./vendor/bin/sail up -d
```

### 5. Gere a chave da aplicação
```bash
./vendor/bin/sail artisan key:generate
```

### 6. Limpar cache do Laravel para evitar erros
```bash
./vendor/bin/sail artisan config:clear
```

### 7. Execute as migrações
```bash
./vendor/bin/sail artisan migrate
```

### 8. Execute a build de assets do Front-end
```bash
npm run build
```

### 9. Acesse a aplicação
Acesse no navegador: [http://localhost](http://localhost)

---

## 🛠 Comandos úteis

- **Parar os containers**
  ```bash
  ./vendor/bin/sail down
  ```

- **Acessar o container do Laravel**
  ```bash
  ./vendor/bin/sail shell
  ```
