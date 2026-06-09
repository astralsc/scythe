@echo off

if not exist .env copy .env.example .env

if not exist vendor\autoload.php (
    composer install
    if errorlevel 1 goto error
)

php artisan key:generate
if errorlevel 1 goto error

php artisan migrate
if errorlevel 1 goto error

if not exist node_modules (
    npm install
    if errorlevel 1 goto error
)

npm run build
if errorlevel 1 goto error

php artisan key:generate
goto end

:error
echo FAILED
pause

:end