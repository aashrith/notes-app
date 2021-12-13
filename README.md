# Notes Application
Notes App single page application using Laravel, Angular and MySQL

## How to run it locally
### Prerequisites
- Docker Machine or Docker Desktop
- npm
- composer

Open terminal and run the following commands in sequence...

To install frontend dependencies and build notes-app-frontend image:
```
 cd notes-app-frontend/
 npm install
 docker image build -t notes-app-frontend .
```
Configure notes-app-backend .env file, install dependencies, migrate and seed database:
```
cd notes-app-backend/
cp .emv.example .emv
docker exec  notes-app-php-fpm php artisan key:generate
docker exec  notes-app-php-fpm composer install
docker exec  notes-app-php-fpm php artisan migrate:fresh --seed
```

To access Notes application go to `http://localhost:3000/notes`

To access Backend Api documentation got to `http://localhost:8081/api/documentation`
