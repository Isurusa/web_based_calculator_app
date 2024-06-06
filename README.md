## Develop a web-based calculator app

## Technology Stack
- PHP 8.2
- Laravel 11
- Vue.js 3
- MySQL

## Project setup
1. Clone the repository from GitHub
2. Setup the backend
    - Go to the backend dictionary
        ```
        cd backend
        ```
    - Rename .env.dev file to ".env"
    - Create a database and configure .env file
    - Database Migrations 
        ```
        php artisan migrate
        ```
    - run the backend
        ```
        php artisan serve --port=8000
        ```

3. Setup the frontend
    - Go to the frontend dictionary
        ```
        cd frontend
        ```
    - run the frontend
        ```
        npm run serve
        ```
    ** Note: node v18.17.1, npm v10.8.1

4. Enjoy the calculator app.