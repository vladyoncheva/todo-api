Requirements:  Laravel v9.49.0 (PHP v8.2.0)

Steps to setup:

1. Make table todo in mysql, create user and pass for this table and put in .env file

2. Run commands

php artisan migrate
php artisan passport:install
php artisan serve

3. Register api user:

url /api/register
body json 
{
    "name":"TestUser",
    "email":"testEmail@gmail.com",
    "password":"123456",
    "c_password":"123456"
}

in response json you have to copy generated token
You need from this token for authenticate in api.



Todo api:


Projects:

1. Method Create project

url: /api/project/store
You must send in body: 

		json: {
		    "name":"Project2"
		}
You must send in headers:

Bearer <Your user api token>



Todo:

