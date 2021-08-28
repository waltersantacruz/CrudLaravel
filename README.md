<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
## CRUD TAREAS

This project was built using laravel 8 and vuejs.
It allows you to create, list, update and delete tasks. You can see all tasks but you can only edit and delete your tasks.

## Clone the project

Use this commant to clone the git repository

> git clone https://github.com/waltersantacruz/crudLaravel.git

## Run the project

Go to the folder where your project was cloned and use this command to install dependencies<br/>
`you need to have composer installed for this command`

> composer install

this will install all laravel dependencies used in this project.

# Install npm dependencies

run this command to install all npm dependencies

> npm install

also run this command

> npm run dev

## Setting up database

make a copy of the file `.env.example` in the same folder and rename it as `.env`

now go to the file `.env` and set up your database credentials<br/>
`you need to have already created a database`

> DB_CONNECTION=mysql <br/>
> DB_HOST=127.0.0.1<br/>
> DB_PORT=3306<br/>
> DB_DATABASE=`database name`<br/>
> DB_USERNAME=`database user`<br/>
> DB_PASSWORD=`database password`<br/>

## Run Migrations

use the following command to run migrations

> php artisan migrate:fresh

this will create all the models in the database for the project

# Run the project

use this command to run the server in localhost

> php artisan serve

`at this point your apache and mysql services on xampp should be running`

Go to your localhost and you will see the project.

# API requests - token authorization

You can see the project documentation through `https://127.0.0.1:8000/api/documentation`.<br/>

To make requests through the API you need a token authorization.<br/>

To get the token you can use postman and make a POST request for `http://localhost:8000/api/register`.<br/>
in the Body of this request you need to type the following information:

name = `username` <br/>
email = `user_email`<br/>
password = `user_password`<br/>

`This request will create a new user for the application and the response will have the token needed for api requests.`

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
