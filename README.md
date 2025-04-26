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

## API Architecture & Workflow
This project uses a **RESTful API** structure built with **Laravel**.

##### Routing (routes/api.php)
All API routes are defined inside `routes/api.php`.  
This automatically generates the following routes:

| Method  | Endpoint | Controller Method | Description |
| ------------- |-------------|:-------------:|-------------|
| GET       | /api/users/       | index()   | Retrieve all users.       |
| GET       | /api/users/{$id}  | show()    | Retrieve specific user.   |
| POST      | /api/users/       | store()   | Create a new user.        |
| PUT/PATCH | /api/users/{$id}  | update()  | Update specific user.     |
| DELETE    | /api/users/{$id}  | destroy() | Delete a user.            |

##### Controller (UserController)
The UserController handles all logic for managing users:


- **store(Request $request)**  
  Validates the request, creates a new user, and returns a JSON response.

- **index(Request $request)**  
  Fetches all users from the database and returns them in JSON format.

- **show(Request $request, $id)**  
  Retrieves a single user by ID and returns the user data as JSON.

- **update(Request $request, $id)**  
  Validates the request and updates the user's data partially or fully.

- **destroy($id)**  
  Deletes the specified user from the database and returns a success message.


##### Full Workflow
1. Frontend or client sends HTTP request to /api/users/ endpoint.
2. Request is routed through api.php to UserController.
3. Controller processes the request:
    * Validates input if needed.
    * Interacts with the User model (database operations).
    * Returns a structured JSON response.
4. Frontend receives JSON response and processes/display accordingly.
