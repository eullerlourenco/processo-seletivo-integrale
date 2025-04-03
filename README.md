# 🚀 Processo Seletivo Integrale

Este repositório contém a solução para o desafio do processo seletivo da **Integrale**. O projeto foi desenvolvido utilizando **Laravel**, **Tailwind CSS**, **JavaScript** e executado com **Docker** através do Laravel Sail.

---

## 🛠 Requisitos
Antes de iniciar, certifique-se de ter instalado:
- 🐳 **Docker** e **Docker Compose** ([Instalar Docker](https://docs.docker.com/get-docker/))
- 🛠 **Make** (opcional, para facilitar comandos, [Instalar Make](https://linuxhint.com/install-make-ubuntu/))
- 📦 **Node.js** e **NPM** ([Instalar Node.js](https://nodejs.org/))

---

## 📌 Configuração e Execução

### 1️⃣ Clone o repositório
```bash
git clone https://github.com/eullerlourenco/processo-seletivo-integrale.git
cd processo-seletivo-integrale
```

### 2️⃣ Copie o arquivo de ambiente
```bash
cp .env.example .env
```

### 3️⃣ Instale as dependências do PHP e Node.js
```bash
composer install
npm install
```

### 4️⃣ Suba os containers Docker
```bash
./vendor/bin/sail up -d
```

### 5️⃣ Gere a chave da aplicação
```bash
./vendor/bin/sail artisan key:generate
```

### 6️⃣ Execute as migrações
```bash
./vendor/bin/sail artisan migrate
```

### 8️⃣ Acesse a aplicação
Acesse no navegador: [http://localhost](http://localhost)

---

## 🔧 Comandos úteis

- **Parar os containers** 🛑
  ```bash
  ./vendor/bin/sail down
  ```

- **Acessar o container do Laravel** 🖥️
  ```bash
  ./vendor/bin/sail shell
  ```
