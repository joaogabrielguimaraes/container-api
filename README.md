# 🚗 API REST de Cadastro de Carros

API simples para gerenciar um cadastro de carros, permitindo operações de CRUD (Criar, Ler, Atualizar e Deletar) via requisições HTTP. Desenvolvida em PHP com banco MySQL, orquestrada via Docker Compose para facilitar o ambiente de desenvolvimento.

---

## ❓ O que é?

Esta API permite gerenciar informações de veículos, armazenando dados como **marca**, **modelo** e **ano**. Ideal para projetos que precisam de um backend leve para cadastro e consulta de carros, podendo ser usada em aplicações web, mobile ou para aprendizado.

---

## 🛠️ Tecnologias

- PHP 7+ com PDO para conexão ao banco
- MySQL
- Docker e Docker Compose
- Postman (ou qualquer cliente HTTP) para testes

---

## 🚀 Como executar

1. Clone o repositório:

```bash
git clone https://github.com/seu-usuario/api-carros.git
cd api-carros
```

2. Execute o Docker Compose para subir o ambiente:

```bash
docker-compose up -d
```

> Isso irá subir o container do PHP + Apache e do MySQL juntos.

---

## 🌐 Endpoints da API

**Base URL:** `http://localhost:8080/carros`

### ➕ Criar um carro (POST)

- **URL:** `/carros`
- **Descrição:** Cadastra um novo carro.
- **Exemplo JSON no Body:**

```json
{
  "marca": "Fiat",
  "modelo": "Uno",
  "ano": 2010
}
```

- **Resposta:**

```json
{
  "status": "Carro inserido"
}
```

---

### 📋 Listar todos os carros (GET)

- **URL:** `/carros`
- **Descrição:** Retorna todos os carros cadastrados.
- **Resposta exemplo:**

```json
[
  {
    "id": 2,
    "marca": "Fiat",
    "modelo": "Uno",
    "ano": 2010
  },
  {
    "id": 3,
    "marca": "Toyota",
    "modelo": "Corolla",
    "ano": 2020
  }
]
```

---

### 🔎 Obter um carro específico (GET)

- **URL:** `/carros/{id}`
- **Descrição:** Retorna os dados do carro com o ID especificado.
- **Exemplo:** `/carros/2`

---

### ✏️ Atualizar um carro (PUT)

- **URL:** `/carros/{id}`
- **Descrição:** Atualiza as informações do carro com o ID especificado.
- **Exemplo JSON no Body:**

```json
{
  "marca": "Fiat",
  "modelo": "Uno",
  "ano": 2011
}
```

- **Resposta:**

```json
{
  "status": "Carro atualizado"
}
```

---

### 🗑️ Deletar um carro (DELETE)

- **URL:** `/carros/{id}`
- **Descrição:** Remove o carro com o ID especificado.
- **Resposta:**

```json
{
  "status": "Carro excluído"
}
```

---

## ⚠️ Erros comuns

- ❌ **Rota não encontrada:** Quando a URL não bate com nenhum endpoint.
- ⚠️ **Dados incompletos:** Quando o corpo da requisição não contém todos os campos necessários.
- 🚫 **Método não permitido:** Quando o método HTTP não é suportado.

---

## 🧪 Testando a API

Você pode usar o Postman, Insomnia ou curl para enviar requisições HTTP.

---

**Desenvolvido por João Gabriel Guimarães**

