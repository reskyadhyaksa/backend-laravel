## Installation

##### 1. Clone the repository

```
git clone https://github.com/reskyadhyaksa/backend-laravel.git
```

##### 2. Select Directory
```
cd backend-laravel
```


##### 3. Install Depedency

```
composer install
```

##### 4. Copy env from env.example

```
copy .env.example .env
```
or
```
cp .env.example .env
```

##### 5. Migrate the DB

```
php artisan migrate
```

##### 6. Then type `yes` when prompted, to create a new database.
The prompt should look like this:  
"WARN  The database 'backend_testing' does not exist on the 'mysql' connection."

```
yes
```

##### 7. Run Backend

```
php artisan serve
````

or 

##### 7. Run testing 

```
php artisan test
```
