# Simple contact API

This is a simple example of API Methods in Laravel/Lumen

## Configuration
1) Run the composer install command to setup the Laravel/Lumen environment  
```
composer install
```
2) Configure the database with contact table. You can use the Laravel Artisan or import the "database.sql" file in the project root folder.
```
php artisan migrate
```

3) Copy the .env.example on root folder if not exists .env file. In that file, you will need change the database configuration
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=simple_contact_api
DB_USERNAME=root
DB_PASSWORD=
```

4) Create your vhost to the project directory
```
<VirtualHost *:80>
    DocumentRoot /var/www/htdocs/REPOSITORY_NAME
    ServerName simple-contact-api.local
    ErrorLog "/var/www/htdocs/REPOSITORY_NAME/contato_local-error.log"
    CustomLog "/var/www/htdocs/REPOSITORY_NAME/contato_local-access.log" common
</VirtualHost>
```
5) Dont forget to redirect your hosts file to listening your REPOSITORY_NAME

***

## Methods
In this example, we will just create the contact methods.

### Contact::get
Get a single contact on database.
* Method: GET
* Path: /contact/**{id}**

> Param(s)
> * **{id}** : **Obrigatório** The contact id on database.
>  Example
```
curl -X GET YOUR_SERVER_NAME/contact/1
```

### Contact::create
Create a new one contact on database.
* Method: POST
* Path: /contact

>  Example
```
curl -X POST  \
-d  "name=Brand New Contact&email=email@contact.me&description=Description from the contact" \
YOUR_SERVER_NAME/contact 
```

### Contact::update
Create a new one contact on database.
* Method: PUT
* Path: /contact/**{id}**

> Param(s)
> * **{id}** : **Obrigatório** The contact id on database.
>  Example
```
curl -X PUT  \
-d  "name=Change my name&email=change_email@contact.me&description=Description from the contact" \
YOUR_SERVER_NAME/contact/1 
```


### Contact::delete
Create a new one contact on database.
* Method: DELETE
* Path: /contact/**{id}**

> Param(s)
> * **{id}** : **Obrigatório** The contact id on database.
>  Example
```
curl -X PUT  \
-d  "name=Change my name&email=change_email@contact.me&description=Description from the contact" \
YOUR_SERVER_NAME/contact/1 
```


### Lumen PHP Framework
#### Official Documentation

Documentation for the framework can be found on the [Lumen website](http://lumen.laravel.com/docs).

### Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
