## Develop a web-based calculator app

## Technology Stack
- PHP 8.02
- Laravel 11
- Vue.js 3
- MySQL

## Project setup
1. Clone the repository from GitHub
2. Setup the backend
   2.1. Go to the backend dictionary
    ```
    cd backend
    ```
  2.2. Rename .env.dev file to ".env"
  2.3. Create a database and configure .env file
  2.4. Database Migrations 
    ```
    php artisan migrate
    ```
  2.4. run the backend
    ```
    php artisan serve --port=8000
    ```

3. Setup the frontend
   3.1. Go to the frontend dictionary
    ```
    cd frontend
    ```
    3.2. run the frontend
    ```
    npm run serve
    ```
** Note: node v18.17.1, npm v10.8.1

4. Enjoy the calculator app.