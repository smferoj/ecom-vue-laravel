=> instalation
=> Admin control
-> php artisan make:middleware AdminMiddleware
## flowbite css 

npm install flowbite
in tailwind config 
=> plugins
 require('flowbite/plugin')
 => content
"./node_modules/flowbite/**/*.js"

## laravel sluggable package

-> Defintite model

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions; 
 use HasSlug;
composer require spatie/laravel-sluggable
public function getSlugOptions(): SlugOption{
    return SlugOption::create()
    ->generateSlugsFrom('name')
    ->saveSlugsTo('slug');
}


## Element-plus for Vue 3

npm install element-plus --save

import ElementPlus from 'element-plus' add in app.js file
.app.use(ElementPlus) add with app.js file 

## sweetaler2

npm install -S vue-sweetalert2

app.js
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

.use(VueSweetalert2)


php artisan optimize
php artisan config:clear
php artisan serve