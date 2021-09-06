# Tasks

## Products - Task 1

This task is about providing an API of products.

The task includes setting up a backend - preferably based on Laravel - provide service which can run an import on the product and category data provided further below.

The data should be imported with the help with Eloquent to map the data to a SQL database. Please also create a releationship between the products and the categories.

Furthermore, there should be a 2nd endpoint which returns the products in JSON format, retrieved through the database. Choose a JSON structure and data which you think is useful.

## The View  - Task 2

Provide a mini-interface using:

1. Vue 3 ([task2-vue](https://github.com/ChrisRahme3/laravel_training/tree/task2-vue))
2. Laravel ([task2-laravel](https://github.com/ChrisRahme3/laravel_training/tree/task2-laravel))
3. TypeScript, Nuxt, Vuex, Mixins, Filters

## Laravel Dusk  - Task 3

To be discussed before starting.

## Tests  - Task 4

Provide some useful tests, a functional, unit & browser test for both frontend and backend.

---

# Setup

## Data

The below files are placed in the `storage/app/public/json` folder.

- [Products](https://github.com/GoogleChromeLabs/sample-pie-shop/blob/master/src/data/products.json)

- [Categories](https://github.com/GoogleChromeLabs/sample-pie-shop/blob/master/src/data/categories.json)

## Steps

1. Install [Node.js](https://nodejs.org/en/download)

1. Install [Composer](https://laravel.com/docs/4.2#install-composer)

1. Install [Laravel](https://laravel.com/docs/4.2#install-laravel)

   ```bat
   composer global require "laravel/installer=~1.1"
   ```

1. Create project

   ```bat
   composer create-project --prefer-dist laravel/laravel laravel_training
   cd laravel_training
   ```

1. Install Vue inside the project

   ```bat
   composer require "laravel/ui"
   php artisan ui vue
   npm install
   npm install vue-router
   ```

1. Create the MySQL database which will be used in the project

   ```sql
   CREATE DATABASE laravel_training;
   ```

1. Verify the database information is correct in the `.env` file lines 10-15

1. Create the tables (migrations)

   ```bat
   php artisan migrate:fresh --seed
   ```

1. Run Laravel and Node locally - Project will start on port 8000

   ```bat
   php artisan serve
   npm run dev
   ```

## Endpoints Guide

- `GET`
  - All categories: `http://127.0.0.1:8000/api/categories`
  - One category: `http://127.0.0.1:8000/api/categories/{id}`
  - All products: `http://127.0.0.1:8000/api/products`
  - One product: `http://127.0.0.1:8000/api/products/{id}`