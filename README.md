
## Wunder Fleet

### Setup
1. clone repository. and cd into the project
2. run `composer install` to install dependancies
3. run `composer dump-autoload`
4. create a `.env` from `.env.sample` by running `cp .env .env.sample`
5. create a database of your choice (mysql/sqlite)
6. update the `.env` with the correct database credentials
7. run `npm install && npm run dev` to install npm dependencies and build project
8. serve the project by running `php artisan serve --port 8001` 
9. open the project by visiting `http://localhost:8001`


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

####Testing 
run `vendor/bin/phpunit --testdox` to run test cases

####Code Structure
The code structure used is the MVC pattern with SOLID design principles because that is what I'm familiar and 
confortable with even though I've found a [great resource](https://academy.realm.io/posts/mvc-vs-mvp-vs-mvvm-vs-mvi-mobilization-moskala/) 
to gain more understanding to the `MVP/MVI/MVVM` patterns. 