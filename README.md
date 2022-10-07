<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.
### Prerequisites
* php v7.2, [see](https://laravel.com/docs/installation) Laravel specific requirements
* Apache v2.4.33 with ```mod_rewrite```
* MySQL v8.0
* [Composer](https://getcomposer.org) v2.x
* 
# Laravel Todo
### Quick setup
* Clone this repo, checkout to most active branch
* Write permissions on ```storage``` and ```bootstrap/cache``` folders
* Create a config file (copy from ```.env.example```), and update environment variables
```
cp .env.example .env
```
* Install dependencies
```
composer install
php artisan key:generate
```
* Migrate and Seed database
```
php artisan migrate
php artisan db:seed
```
* Create the symbolic link for local file uploads
```
php artisan storage:link
```
* Point your web server to **public** folder of this project
* Additionally, you can run this command on production server
```
php artisan optimize
```
