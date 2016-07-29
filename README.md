# Chaoscraft

Database setup guide:


1) Create MarieDB database with following properties:
* Database name: "Your choice"
* Database collation: utf_8_general_ci

2) Modify .env file in your project. Assign newly created database name and change username and password accordingly 

3) Go to your project root directory and run the following command: php artisan migrate
