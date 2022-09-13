# IssueTracker App
Demo App

### System Requirement:
1. Docker
2. Local PHP 8 and Composer

### Installation Steps:
1. Clone this repository
2. Create `.env` file: `cp .env.example .env`
3. Install dependencies: `composer install`
4. Generate key: `php artisan key:generate` 
5. Install laravel sail: `php artisan sail:install` and enter 0 to install mysql
6. Create development environment: `vendor/bin/sail up -d`
7. Run migrations and seeders: `vendor/bin/sail artisan migrate:fresh --seed`
8. Install front end dependencies: `vendor/bin/sail npm install`
9. Compile front end assets: `vendor/bin/sail npm run dev`
10. Open app in local: `http://localhost`
11. Run tests: `vendor/bin/sail phpunit`

### Development Notes:
1. Development user: 
   * email: `admin@admin.com`
   * password: `password`
2. By default, all users are *non-admin users*, to grant a user admin privileges run the following artisan command: `vendor/bin/sail artisan user:admin admin@admin.com`
3. Besides the web layer, the app has an api controller to `list issues` that uses Laravel Sanctum Api Token, to create a token:
   * Post request to: `http://localhost/api/create-token` with: 
   ```json
    {
       "email": "admin@admin.com",
       "password": "password"
    }
    ```
4. Use the provided bearer token to make a get request to: `http://localhost/api/issues`
