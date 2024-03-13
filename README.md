![Dog Cartoon](https://media.giphy.com/media/UKm1AF0UrCkb6/giphy.gif)


# Laravel project by William (La) & Julia - YRGO23
In this assignment we created a Laravel application. The purpose of this project is to give us a better understanding of writing backend applications. The application was supposed to contain the following features of Laravel:

- Controllers
- Migrations
- HTTP Tests (on all routes)
- Middleware
- Models (with relationships)
- Routes (with route model binding)
- Eloquent
- Validation
- Views (Blade)
- Follow the theme of cars


## Installation

Follow the installation guide to run the site correct

```bash
#Clone the repo:
git clone https://github.com/juliasophieg/Laravel-project

#Open the correct map:
cd autohub

#If you don't have it, install npm:
npm install

#If you don't have it, install composer:
composer install

#Get the .env.example and rename it to .env
cp .env.example .env

#Run the migration files to create the correct database:
php artisan migrate

#Open up live server with Vite to activate Tailwindcss:
npm run watch

#Open a new terminal window, and open laravel live server:
php artisan serve

#You can now open the link given by artisan to see the page
```

## Testing flaws
In our testing, we have had issues with successfully writing a code that tests the "update" on the picture element in the code. And therefore that part of the test is not in the application.

## License

[MIT](https://choosealicense.com/licenses/mit/)
