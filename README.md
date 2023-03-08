Up and build the docker containers

```
docker-compose up --build
```

Copy the .env file

```
cp src/.env.example src/.env
```

Get the current php container

```
docker ps
```

Install Laravel dependencies

```
docker exec -it laravel-powerful-apps-php-1 composer install
```