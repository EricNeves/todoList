<h1 align="center">
  <br />
  <img src=".github/favicon.png">
  <br />
  Todo List
  <br />
</h1>

<h4 align="center">
  Aplicação Full Stack desenvolvida com PHP, PostgreSQL, ReactJS, Tailwind CSS e Docker.
</h4> 

<p align="center">
  <img src="https://img.shields.io/github/last-commit/ericneves/todoList?style=flat-square&logo=github&logoColor=%23dddddd&label=LAST%20COMMIT&labelColor=%23333333" alt="Github">
  <img src="https://img.shields.io/github/languages/top/ericneves/todoList?style=flat-square&logo=PHP&logoColor=%238892BF&label=PHP&labelColor=%23dddddd">
  <img src="https://img.shields.io/github/license/ericneves/todoList?style=flat-square&color=%237f5af0">
</p>

![screenshot](.github/screenshotA.png)
![screenshot](.github/screenshotB.png)

### Description

**Todo** **List**, um app desenvolvido com **PHP**, **Postgresql**, **ReactJS**, **Tailwind** **CSS**, **Docker** e entre outras tecnologias. A aplicação consiste em gerenciar uma lista afazeres, com funcionalidades para **criar**, **editar** ou **deletar** **tasks**.

A API foi desenvolvida com **PHP**, **Postgresql**, **PDO**, **OOP**, **Injenção** **de** **Dependência** e entre outros recursos, também como, mudança no sistema de rotas, trazendo melhorias na hora determinar os métodos **HTTP**, garantindo mais segurança no uso dos **endpoints**.

Essa aplicação tem como foco principal **enaltecer** as melhorias no **backend**.

No frontend foi utilizado o **ReactJS** para componentizar a aplicação, trazendo também diversos recursos como **ciclo** **de** **vida** dos componentes, juntamente com o uso do **Tailwind** **CSS** como elemento visual.

Para organizar o projeto, foi usado o **Docker**, que traz muitos recursos valiosos como, **segregação** **de** **redes**, **organização** **de** **todo** **o** **app** e **flexibilidade**.

### Features 

* <b>API</b>
  - PHP - v8.1
   - Composer | psr-4
   - Routes
   - Dependency Injection
   - env (vlucas/phpdotenv) - v5.5
   - PDO | PDO Pgsql 
   - Cors
* <b>Database</b>
  - PostgreSQL
* <b>Web</b>:
    - ReactJS - Latest
      - Vite
      - pnpm
      - UI - Tailwind CSS
      - Axios
* <b>Devops</b>:
  - Docker

### How to use 

Para executar a aplicação serão necessários alguns passos importantes.


```sh

# Clone Repository
$ git clone https://github.com/EricNeves/todoList

# todoList Folder
$ cd todoList/

# Install Dependencies - ReactJS
$ cd web && pnpm install

# Install Dependencies - PHP
$ cd www && composer update


```

Agora, na raiz do projeto (**./todoList**) execute o comando abaixo:

```sh

# Execute Docker Command
$ docker-compose -f -d --build

```

### Application Process 

* <b>API</b>
  - http://localhost:8000
* <b>Web</b>
  - http://localhost:3000


### License 

<img src="https://img.shields.io/github/license/ericneves/todoList?style=flat-square&color=%237f5af0">

### Author 🧑‍💻
<a href="https://www.instagram.com/ericneves_dev/"><img src="https://img.shields.io/badge/Instagram-E4405F?style=for-the-badge&logo=instagram&logoColor=white"></a> <a href="https://linkedin.com/in/ericnevesrr"> <img src="https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white"></a>
