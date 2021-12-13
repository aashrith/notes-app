# Notes Application
Notes App single page application using Laravel, Angular and MySQL

## How to run it locally
### Prerequisites
- Docker Machine or Docker Desktop

If prerequisites are met Open terminal and run the following commands in sequence...
```
 cd notes-app-frontend/
 docker image build -t notes-app-frontend .
 cd ..
 docker-compose up -d
```

To access Notes application go to `http://localhost:3000/notes`

To access Backend Api documentation got to `http://localhost:8081/api/documentation`

use this command to migrate and seed the database assuming the docker-compose above is already run the following...
```
docker exec  notes-app-php-fpm php artisan migrate:fresh --seed
```
