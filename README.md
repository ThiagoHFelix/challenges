# Challenge - iHero :heart_eyes:

### Dependências :notebook:
- Docker 
    * [Veja como instalar](https://docs.docker.com/compose/install/)

### Rodando o projeto :smile:

1. Clone o projeto 

```bash
git clone https://github.com/ThiagoHFelix/challenges.git
```
2. Vá para o diretório 

```bash
cd ./challenges
```

3. De permissão de execução para o script

```bash
chmod +x install.sh
```

3. Rode o script de instalação

```bash
./install.sh
```
+ Você deverá ver algo semelhante a isso

```bash

Aguarde, instalando e configurando a API

db uses an image, skipping
Building php
Step 1/3 : FROM php:7.3-fpm-alpine
 ---> 5d77b0644c3c
Step 2/3 : RUN docker-php-ext-install mbstring tokenizer mysqli pdo_mysql
 ---> Running in f909c6f58797
fetch https://dl-cdn.alpinelinux.org/alpine/v3.13/main/x86_64/APKINDEX.tar.gz
fetch https://dl-cdn.alpinelinux.org/alpine/v3.13/community/x86_64/APKINDEX.tar.gz
(1/26) Installing m4 (1.4.18-r2)
(2/26) Installing libbz2 (1.0.8-r1)
(3/26) Installing perl (5.32.0-r0)
(4/26) Installing autoconf (2.69-r3)
(5/26) Installing pkgconf (1.7.3-r0)
(6/26) Installing dpkg-dev (1.20.6-r0)
(7/26) Installing dpkg (1.20.6-r0)
(8/26) Installing libmagic (5.39-r0)
(9/26) Installing file (5.39-r0)
(10/26) Installing libgcc (10.2.1_pre1-r3)
(11/26) Installing libstdc++ (10.2.1_pre1-r3)
(12/26) Installing binutils (2.35.2-r1)
```

3. Pronto, agora basta gerar um token de admin para poder fazer requisições na api. Utilizaremos o usuário admin que foi criado com os seeders mas é possivel cadastrar novos usuários com a rota http://localhost:8080/api/auth/register

```bash
curl --request POST http://localhost:8080/api/auth/login -d 'email=admin@admin.com.br&password=root'
```

+ Se tudo der certo o retorno deve ser o seguinte:
```bash
{"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZDBhODYzOGQxM2ExNjQ1NTQwYjkzYzU3MTczNmZlMWE1ODZjZDJmMzc5YjNiNWRmOTk4NTYzNTM5ZDM2NThmMWVmZDVlYzM2ZDkwZjJmZDIiLCJpYXQiOjE2MjA1MjI1NDAsIm5iZiI6MTYyMDUyMjU0MCwiZXhwIjoxNjUyMDU4NTQwLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.aPzdTU-rLgL2_faIqnlRW73CRdcPJ3dqGEPyxQS2foHYt3tFGHmfTCjYi8blOJ1sWQOaPeM__6sXIKl5BLSgZuTo9nm8c0wphlIMwoj4lgJ_LvFVeyqGNQ2MYkpGxzpcSVISLC55J3v8Rs53xwUxj9SSfl8FpDnaZt1a9Qmr8FmkbiYpLrCR5eWHtN96NkV2fN6PIWcidTBIGGTF6cfw0toehr5Ywp3DH6hHo2hWPNkA5Nnl9OHJFYU__67vmABoDkxk4VQ3OcZHnUHriEXIY8fXlpmE6j42LjivJKAcYknL7z1DqPqFNhGNE2nYCyBx9BfOdRBcw0nAxnAypDRkeV5tEsnEH1wlnmRLgjPYAGRPLKBzyZkHDn0ILsJL3Qq1LoAUtM8OyPfjrsaRNkYwDGXRR0_z8yWMDZwSo6nOeRdLwN5IwVTlqFdnYsIJwEUnlza812IJksgG9d8WtVZe2N7bDzSA-Nz6VA_eCa7lKon02dgT1wkfh0Rn3I2WjhvmgMp6LVdBjrRRf8sp4jQPV8JKDLe-3UwUFsETysxbhpxxvHiRORx0CRLUB"
```

4. Crie a variável TOKEN   

```bash
TOKEN="eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZDBhODYzOGQxM2ExNjQ1NTQwYjkzYzU3MTczNmZlMWE1ODZjZDJmMzc5YjNiNWRmOTk4NTYzNTM5ZDM2NThmMWVmZDVlYzM2ZDkwZjJmZDIiLCJpYXQiOjE2MjA1MjI1NDAsIm5iZiI6MTYyMDUyMjU0MCwiZXhwIjoxNjUyMDU4NTQwLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.aPzdTU-rLgL2_faIqnlRW73CRdcPJ3dqGEPyxQS2foHYt3tFGHmfTCjYi8blOJ1sWQOaPeM__6sXIKl5BLSgZuTo9nm8c0wphlIMwoj4lgJ_LvFVeyqGNQ2MYkpGxzpcSVISLC55J3v8Rs53xwUxj9SSfl8FpDnaZt1a9Qmr8FmkbiYpLrCR5eWHtN96NkV2fN6PIWcidTBIGGTF6cfw0toehr5Ywp3DH6hHo2hWPNkA5Nnl9OHJFYU__67vmABoDkxk4VQ3OcZHnUHriEXIY8fXlpmE6j42LjivJKAcYknL7z1DqPqFNhGNE2nYCyBx9BfOdRBcw0nAxnAypDRkeV5tEsnEH1wlnmRLgjPYAGRPLKBzyZkHDn0ILsJL3Qq1LoAUtM8OyPfjrsaRNkYwDGXRR0_z8yWMDZwSo6nOeRdLwN5IwVTlqFdnYsIJwEUnlza812IJksgG9d8WtVZe2N7bDzSA-Nz6VA_eCa7lKon02dgT1wkfh0Rn3I2WjhvmgMp6LVdBjrRRf8sp4jQPV8JKDLe-3UwUFsETysxbhpxxvHiRORx0CRLUB" 
```
5. Faça a requisição
```shell
curl -H 'Accept: application/json' -H "Authorization: Bearer ${TOKEN}" --request GET http://localhost:8080/api/hero
```    
### Rotas

> Você pode obter a collenction do Postman nesse [arquivo.](./iHero.postman_collection.json) 

Method | Path | Controller | Action | Middleware  
---| --- | --- | --- | ----
GET | / | - | - | -
POST | /api/auth/register | AuthController | register | -
POST | /api/auth/login | AuthController | login | -
GET | /api/auth/logout | AuthController | logout | Auth
GET | /api/hero | HeroController | index | Auth
POST | /api/hero | HeroController | store | Auth
PUT | /api/hero/{id} | HeroController | update | Auth
DELETE | /api/hero/{id} | HeroController | destroy | Auth
GET | /api/ranking | RankingController | index | Auth
POST | /api/ranking | RankingController | store | Auth
PUT | /api/ranking/{id} | RankingController | update | Auth
DELETE | /api/ranking/{id} | RankingController | destroy | Auth
GET | /api/threatlevel | ThreatLevelController | index | Auth
POST | /api/threatlevel | ThreatLevelController | store | Auth
PUT | /api/threatlevel/{id} | ThreatLevelController | update | Auth
DELETE | /api/threatlevel/{id} | ThreatLevelController | destroy | Auth
GET | /api/threat | ThreatController | index | Auth
POST | /api/threat | ThreatController | store | Auth
PUT | /api/threat/{id} | ThreatController | update | Auth
DELETE | /api/threat/{id} | ThreatController | destroy | Auth
GET | /api/status | StatusController | index | Auth
POST | /api/status | StatusController | store | Auth
PUT | /api/status/{id} | StatusController | update | Auth
DELETE | /api/status/{id} | StatusController | destroy | Auth
GET | /api/allocation | AllocationController | index | Auth
POST | /api/allocation | AllocationController | store | Auth
PUT | /api/allocation/{id} | AllocationController | update | Auth
DELETE | /api/allocation/{id} | AllocationController | destroy | Auth



## Banco de dados

#### Diagrama de Entidade e Relacionamento

![DER](./database-doc/challenge-database.png)

## Projeto

A primeira tecnologia escolhida para o projeto foi o Docker e por dois motivos bem simples: portabilidade e simplicidade para configurar um ambiente de desenvolvimento. A próxima escolha foi o framework, trabalho com laravel por um tempo porém como o projeto é pequeno não havia necessidade de utilizar laravel com todo o conjunto de bibliotecas e por esse motivo o framework escolhido foi o Lumen que é uma versão mais simplificada do Laravel.
Toda a base de dados do projeto será criada no momento da instalação utilizando as migrations do laravel, tornando simples iniciar um novo ambiente sem ter que rodar sql diretamente na mão. Para a autenticação foi utilizado uma biblioteca chamada Passport porém como o Lumen é uma versão mais enxuta do Laravel foi necessário utilizar uma biblioteca terceira chamada lumen-passport para tornar isso possível.
O próximo desafio foi fazer o passo a passo para configurar o novo ambiente e a solução foi criar um script em shell para facilitar em apenas um comando a instalação do ambiente de desenvolvimento.


