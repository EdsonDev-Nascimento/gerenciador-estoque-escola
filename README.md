# 🏫 Sistema de Gerenciamento de Estoque Escolar

Um sistema web desenvolvido em **PHP** e **MySQL** projetado para automatizar o controle e a gestão de estoque de materiais em ambiente escolar. O projeto conta com autenticação de usuários, controle de acesso baseado em funções (Administrador e Professor) e gestão completa de produtos e movimentações.

---

## 🚀 Funcionalidades Principais

- **Autenticação e Níveis de Permissão (RBAC):**
  - **Administrador:** Acesso total ao sistema (cadastrar, editar, remover e consultar produtos/usuários).
  - **Professor:** Acesso restrito para consulta e visualização de materiais disponíveis em estoque.
- **Gestão de Estoque (CRUD):**
  - Cadastro detalhado de itens/materiais.
  - Edição e exclusão de registros de produtos.
  - Consulta rápida e filtrada do saldo de materiais.
- **Banco de Dados Relacional:**
  - Estrutura otimizada para vínculo entre usuários, produtos e movimentações.

---

## 🛠️ Tecnologias Utilizadas

- **Linguagem Backend:** PHP
- **Banco de Dados:** MySQL
- **Frontend / Interface:** HTML5, CSS3, JavaScript, Bootstrap
- **Modelagem de Dados:** brModelo / MySQL Workbench
- **Servidor Local / Ambiente:** XAMPP (Apache)

---

## 💻 Como Executar o Projeto Localmente

### Pré-requisitos
- **XAMPP** (ou outro servidor Apache/MySQL local) instalado.
- **Git** instalado na máquina.

### Passo a Passo

* **1. Clonar o repositório:**
  `git clone https://github.com/EdsonDev-Nascimento/gerenciador-estoque-escola.git`

* **2. Mover a pasta do projeto:**
  Copie a pasta clonada para o diretório `htdocs` do seu XAMPP (ex: `C:\xampp\htdocs\gerenciador-estoque-escola`).

* **3. Configurar o Banco de Dados:**
  - Abra o **phpMyAdmin** (`http://localhost/phpmyadmin`).
  - Crie um novo banco de dados.
  - Importe o arquivo de script `.sql` localizado na raiz do projeto.

* **4. Acessar o sistema:**
  - Certifique-se de que o Apache e o MySQL estão ativos no painel do XAMPP.
  - Abra o navegador e acesse: `http://localhost/gerenciador-estoque-escola`.
  - Verifique o usuário e senha que foram injetados na tabela de funcionários dentro do banco de dados.

---
