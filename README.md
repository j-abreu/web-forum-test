<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Web Forum App
The best web forum you ever seen

### Run this project on your own machine
+ Download and install Composer: https://getcomposer.org/download/

+ Download and install XAMPP: https://www.apachefriends.org/pt_br/index.html <br>
XAMPP comes with all tools you will need to run this project

+ After installing it, open the program and press start Apache and start MySQL

+ Now clone this repo to your machine, enter into the project folder and checkout to branch master

    - `git clone https://github.com/j-abreu/web-forum-test.git`
    - `cd web-forum-test`
    - `git checkout master`

+ Run on localhost
    - `composer install`
    - `cp .env.example .env`
    - `php artisan key:generate`
    - On the XAMPP control panel click in MySQL Admin and create a new database
    - Change the `DB_DATABASE` value in the file `/web-forum-test/.env` to the name of the database you created and run:
    - `php artisan migrate`
    - And finally
    - `php artisan serve`



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).