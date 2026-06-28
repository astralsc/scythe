@echo off
title Scythe

:menu
cls
echo 1. Setup
echo 2. Update
echo 3. Start
echo 4. Setup and Start
echo 5. Setup, Update and Start
echo 6. Cleanup
echo 7. Exit
echo.

set /p choice=Choose an option: 

if "%choice%"=="1" goto setup
if "%choice%"=="2" goto update
if "%choice%"=="3" goto start
if "%choice%"=="4" goto both
if "%choice%"=="5" goto triple
if "%choice%"=="6" goto cleanup
if "%choice%"=="7" exit

cls
echo Invalid choice.
pause
goto menu

:setup
cd laravel
cls
call setup.bat
pause
exit

:update
cd laravel
cls
call update.bat
pause
exit

:start
cd laravel 
cls 
call start.bat
pause 
exit

:both
cd laravel
cls
call setup.bat
call start.bat
pause
exit

:triple
cd laravel
cls
call setup.bat
call start.bat
call update.bat
pause
exit

:cleanup
cd laravel
cls
call cleanup.bat
pause
goto menu