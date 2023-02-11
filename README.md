### Install laravel dependencies

`Run composer install`

### Make your own env file
#### copy the .env.example file and save it as /env

### Migrate to the database

`php artisan migrate`

### Perform database seeding for cities and places
#### this is used for filtering on json calls

`php artisan db:seed --class=CitySeeder`
`php artisan db:seed --class=PlacesSeeder`

### Install all npm dependencies

`npm install`

### Run the npm dev environment

`npm run dev`

### Run the app on your local machine
#### url is localhost:8000
`php artisan serve`


## Code Explanation
The app is built with Laravel 9.51.0 and Vue 3.2.47. There are some jquery codes, this comes with the templated for the UI I used.
I used a bootstrap 3.0 template to hasten the development of the app. Css is used together with Sass.
All the external calls are called from the laravel controllers. The data are then passed to the vue using vue.axios through laravel's own api routing.
Vue-router is implemented to enable SPA. This lets the UI change screen without refreshing the browser. All api keys and constants are stored in the .env file to be called by javascript and laravel.
