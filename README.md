
## Wunder Fleet

### Setup
1. clone repository. and cd into the project
2. run `composer install` to install dependancies
3. create a `.env` from `.env.sample` by running `cp .env .env.sample`
4. create a database of your choice (mysql/sqlite)
5. update the `.env` with the correct database credentials
6. run `npm install && npm run dev` to install npm dependencies and build project
7. serve the project by running `php artisan serve --port 8001` 
8. open the project by visiting `http://localhost:8001`


### Database Setup
#### SQLITE
1. create a `sqlite` db with the command `touch database/database.sqlite`
2. set the following `env` keys
```
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

#### MYSQL
1. create a database using your favourite `mysql client`
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= {database name}
DB_USERNAME={database username}
DB_PASSWORD={database password}
```

#### Stack
1. Backend
 - [Laravel](https://laravel.com)
2. Frontend
- [Vuejs](https://vuejs.org/) with [Vuex](https://vuex.vuejs.org/)

