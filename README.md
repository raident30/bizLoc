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
