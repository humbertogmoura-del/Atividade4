# 📦 CRUD - Categorias e Produtos

## 🚀 Como Começar

### 1️⃣ **Certifique-se que XAMPP está rodando**
- Abra `C:\xampp\xampp-control-panel.exe`
- Inicie **Apache** e **MySQL**

### 2️⃣ **Acesse o Setup**
Abra no navegador:
```
http://localhost/Site/setup.php
```

Este script irá:
- ✅ Criar o banco de dados `loja_simples`
- ✅ Criar as tabelas `categorias` e `produtos`
- ✅ Tudo automaticamente!

### 3️⃣ **Use o CRUD**
Após o setup, acesse:
```
http://localhost/Site/index.html
```

## 📁 Estrutura do Projeto

```
Site/
├── index.html              # Interface principal
├── setup.php               # Criar banco de dados
├── README.md               # Este arquivo
├── assets/
│   ├── css/
│   │   └── style.css       # Estilos
│   └── js/
│       └── main.js         # JavaScript
├── api/
│   ├── categoria/
│   │   ├── ler.php         # GET categorias
│   │   ├── inserir.php     # POST nova categoria
│   │   ├── editar.php      # PUT atualizar categoria
│   │   ├── excluir.php     # DELETE categoria
│   │   └── select.php      # SELECT para dropdown
│   └── produto/
│       ├── ler.php         # GET produtos
│       ├── inserir.php     # POST novo produto
│       ├── editar.php      # PUT atualizar produto
│       └── excluir.php     # DELETE produto
└── includes/
    └── conexao.php         # Conexão com MySQL
```

## 🗄️ Banco de Dados

### Tabela: `categorias`
| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | INT | Chave primária |
| nome | VARCHAR(100) | Nome único da categoria |
| data_criacao | TIMESTAMP | Data de criação |

### Tabela: `produtos`
| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | INT | Chave primária |
| nome | VARCHAR(100) | Nome do produto |
| preco | DECIMAL(10,2) | Preço com 2 casas decimais |
| categoria_id | INT | FK para categorias |
| data_criacao | TIMESTAMP | Data de criação |

## 🎨 Funcionalidades

✅ Listar categorias  
✅ Inserir categoria  
✅ Editar categoria  
✅ Excluir categoria  
✅ Listar produtos  
✅ Inserir produto  
✅ Editar produto  
✅ Excluir produto  
✅ Filtrar produtos por categoria  
✅ Interface responsiva  
✅ Validações de entrada  

## 🔧 Tecnologias

- **Frontend:** HTML5, CSS3, JavaScript, jQuery
- **Backend:** PHP 7+
- **Banco:** MySQL/MariaDB
- **Server:** Apache (XAMPP)

## 💡 Dicas

- O setup pode ser executado múltiplas vezes sem problemas
- Se tiver erros, verifique se MySQL está rodando
- Para resetar o banco, delete-o e execute setup.php novamente

---

**Desenvolvido para FMU - Atividade 3** 📚
