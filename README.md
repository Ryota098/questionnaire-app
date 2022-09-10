# Laravel Questionnaire App

## Download

### git clone

`git clone https://github.com/Ryota098/questionnaire_app.git`  

## Installation
 
`cd questionnaire_app`  
`composer install`  
`npm install`  
`npm run dev`  

#### .envの設定

`cp .env.example .env`  

DB_CONNECTION=mysql  
DB_PORT=3306  
DB_HOST=localhost  
DB_DATABASE=c9  
DB_USERNAME=root  
DB_PASSWORD=root  

#### サーバー起動後

`php artisan migrate:fresh --seed`  
`php artisan key:generate`  
