
### Passo a passo
Clone Repositório
```sh
git clone https://github.com/LuanMartins/todo-list-backend.git
```
```sh
cd todo-backend
```

Suba os containers do projeto
```sh
docker-compose up -d
```


Crie o Arquivo .env
```sh
cp .env.example .env
```

Acesse o container app
```sh
docker-compose exec app bash
```


Instale as dependências do projeto
```sh
composer install
```

Gere a key do projeto Laravel
```sh
php artisan key:generate
```

OPCIONAL: Gere o banco SQLite (caso não use o banco MySQL)
```sh
touch database/todo.sqlite
```

Rodar as migrations
```sh
php artisan migrate
```

Acesse o projeto
[http://localhost:8000](http://localhost:8000)

Para testar o cronjob de remoção de tasks finalizadas

```sh
php artisan queue:work --tries=3 --timeout=60
```

E em outro terminal

```sh
php artisan schedule:work
```