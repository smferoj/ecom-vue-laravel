=> instalation
=> Admin control
-> php artisan make:middleware AdminMiddleware
=> flowbite css 

npm install flowbite
in tailwind config 
=> plugins
 require('flowbite/plugin')
 => content
"./node_modules/flowbite/**/*.js"

=> laravel sluggable package

-> Defintite model
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions; 

 use HasSlug;

composer require spatie/laravel-sluggable

php artisan optimize
php artisan config:clear
