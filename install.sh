#!/bin/bash

container_php="challenges_php_1"

function generate_app_key {
    php -r "echo md5(uniqid()).\"\n\";"
}    

APP_KEY=$(generate_app_key)

echo -e "\n\nAguarde, instalando e configurando a API\n\n"

#Criando .env do laravel
cp ./lumen/.env.example ./lumen/.env

#Permissão para o framework registrar os logs
chmod -R 775 ./lumen/storage

#criando a pasta para salvar a base dados
mkdir ./db

#Buildando o dockerfile de cada container 
docker-compose build --no-cache

#Gerando a key do laravel. Não é utlizado o comando generate:key pois o lumen não tem o comando
sed -e s/APP_KEY=.*$/APP_KEY=${APP_KEY}/g ./lumen/.env.example > ./lumen/.env

#Subindo a applicação
docker-compose up -d

#Aguardando container subirem
echo -e "\n\nAguardando os containers subirem para continuar a instalação \n\n"
sleep 8

#Instalando depêndencias 
docker container exec ${container_php} composer install

#Rodando migrations
docker container exec ${container_php} php artisan migrate

#Rodando os seeders
docker container exec ${container_php} php artisan db:seed

#Rodando o passport 
docker container exec ${container_php} php artisan passport:install

echo -e "\n\nAPI instalada e configurada com sucesso =D\n\n"