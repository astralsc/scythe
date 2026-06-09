@echo off
title Scythe

:menu
cls
echo 1. Setup
echo 2. Start
echo 3. Setup and Start
echo 4. Cleanup
echo 5. Exit
echo.

set /p choice=Choose an option: 

if "%choice%"=="1" goto setup
if "%choice%"=="2" goto start
if "%choice%"=="3" goto both
if "%choice%"=="4" goto cleanup
if "%choice%"=="5" exit

cls
echo Invalid choice.
pause
goto menu

:setup
cd src
cls
call setup.bat
pause
exit

:start
cd src 
cls 
call start.bat
pause 
exit

:both
cd src
cls
call setup.bat
call start.bat
pause
exit

:cleanup
cd src
cls
call cleanup.bat
pause
goto menu