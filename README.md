# International Bussiness Site (IBS)
In this readme file I want to make a few things clear:

* Requirements
* Common Bugs
* Start-up
* Content

## Requirements
* PHP Version ^ 7.0
* Composer Version ^ 1.8.5
* Laravel ^ 5.8

## Common bugs
* Errors in the helpers.php file.
    * This happends when you don't have the correct PHP version
* Internal server error (500)
    * Be sure to use php artisan key:generate before starting the project
* PHP artisan key:generate doesn't work
    * Check if your .env file is configured correctly
* I can't connect to my database.
    * Check if the database name in the .env file is the same as in your PHPMyadmin
* I can't register/make questionnaires
    * Don't forget to run php artisan migrate

## Start up
1. php artisan serve
2. php artisan tinker
3. factory(App\User::class, 1)->create()
### Now you have an admin acccount with the password set to: password
