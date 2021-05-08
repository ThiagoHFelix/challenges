# Challenge - iHero

### Dependências :notebook:
- Docker 
    * [How to install](https://docs.docker.com/compose/install/)

### Rodando o projeto :smile:

1. Clone o projeto 

```shell
git clone https://github.com/ThiagoHFelix/challenges.git
```
2. Vá para o diretório 

```shell
cd ./challenges
```
3. Instale as depêndencias 

```shell
docker run --rm -v ${PWD}:/application --workdir="/application" composer:latest composer install
```
4. Rode a API 

```shell
docker-compose up -d
```

5. Crie a base da dados

```shell
docker container exec -it challenges_php_1 php artisan migrate
```

6. Crie os dados base

```shell
docker container exec -it challenges_php_1 php artisan db:seed
```



