@echo off
title TaskMate - Cordova Public College HCI Prototype
echo ========================================================
echo   TASKMATE - Student To-Do List & Workspace
echo   Cordova Public College (CPC) - BSIT HCI 1 Prototype
echo ========================================================
echo.
echo Starting local development server...
echo URL: http://127.0.0.1:8000
echo.
echo Default Demo Credentials:
echo Email:    Cabansay@gmail.com
echo Password: password
echo.
echo Press Ctrl+C in this terminal window to stop the server.
echo.

start "" "http://127.0.0.1:8000"
"C:\xampp\php\php.exe" artisan serve --port=8000
pause
