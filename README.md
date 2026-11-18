The Reading Room

The Reading Room is an online bookstore built with Laravel and MySQL. It allows users to browse books, add them to their shopping cart and place orders.

Features

User registration, login and logout;
Book catalog with categories;
Individual book detail pages;
Shopping cart with quantity management;
Stock validation;
Checkout process with delivery information;
Order creation and order history;

Technologies

PHP;
Laravel;
MySQL;
HTML5;
CSS3;

Database

The application uses a relational MySQL database to manage:
Users;
Categories;
Books;
Shopping carts and cart items;
Orders and order items;
Delivery addresses;

Installation

Clone the repository.
Install PHP dependencies:
composer install
Install JavaScript dependencies:
npm install
Create your environment file:
cp .env.example .env
Generate the application key:
php artisan key:generate
Create a MySQL database and configure your .env file.
Run database migrations and seeders:
php artisan migrate --seed
Start the Laravel development server:
php artisan serve
In another terminal, start Vite:
npm run dev

Author

Nađa Stojanović | GitHub: Nadja006