## Products - Task 1

This task is about providing an API of products.

The task includes setting up a backend - preferably based on Laravel - provide service which can run an import on the product and category data provided further below.

The data should be imported with the help with Eloquent to map the data to a SQL database. Please also create a releationship between the products and the categories.

Furthermore, there should be a 2nd endpoint which returns the products in JSON format, retrieved through the database. Choose a JSON structure and data which you think is useful.

## Data

The below files are placed in the `database/json` folder.

- [Products](https://github.com/GoogleChromeLabs/sample-pie-shop/blob/master/src/data/products.json)

- [Categories](https://github.com/GoogleChromeLabs/sample-pie-shop/blob/master/src/data/categories.json)

## Setup

1. Install [Composer](https://laravel.com/docs/4.2#install-composer)
   
2. Install [Laravel](https://laravel.com/docs/4.2#install-laravel)
   
   ```bat
   composer global require "laravel/installer=~1.1"
   ```

3. Create project

   ```bat
   composer create-project --prefer-dist laravel/laravel laravel_training
   cd laravel_training
   ```
   
4. Create the MySQL database which will be used in the project
   ```sql
   CREATE DATABASE laravel_training;
   ```

5. Verify the database information is correct in the `.env` file lines 10-15
   
6. Run (serve) locally - Project will start on port 8000

   ```bat
   php artisan serve
   ```