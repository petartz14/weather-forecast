# Weather Forecast

This application is a search application for weather forecast and determine the weather on a specific city. It has ability to get the temperature, pressure, humidity, and date on what the latest weather forecast on that city. Before you can used on this application make sure you have a github aaccount because that account will be using to login. It's include third party api application to get the weather forecast data on the specific city.

## How to use

```bash
# First, clone the project
upper right corner, click clone button and copy the link

# Then, locate the cloned project folder using gitbash and install dependencies
composer install

# Then, copy the environment file and generate key
cp .env.example .env
php artisan key:generate

# Then, configure your database on .env file
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<database name>
DB_USERNAME=<database username>
DB_PASSWORD=<databse password>

# Then, migrate table into database
php artisan migrate:refresh --seed

# Then, install node dependencies
npm install

# Finally, serve with hot reload at http://localhost:3000/
npm run dev
```

## Packages Installed

-   **[Tailwind css](https://tailwindcss.com/)**
-   **[Headless UI](https://headlessui.com/)**
-   **[Heroicons](https://heroicons.com/)**
-   **[Inertia](https://inertiajs.com/)**
-   **[Laravel](https://laravel.com/)**
-   **[ViteJs plugin Vue](https://github.com/vitejs/vite-plugin-vue/tree/main/packages/plugin-vue)**
-   **[Ziggy Js](https://www.npmjs.com/package/ziggy-js)**
-   **[Laravel Socialite](https://laravel.com/docs/9.x/socialite)**
-   **[Vue Js](https://vuejs.org/)**
