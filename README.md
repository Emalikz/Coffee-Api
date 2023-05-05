# BIBLIOTECH
## Laravel API

## Installation

### 1. Clone the Git Repository

To get started with the installation of the application, you will first need to clone the Git repository. You can do this by running the following command in your terminal:

```bash
git clone https://github.com/Emalikz/Coffee-Api
```

#### 2 .ENV

You will need to create a .env file in the root of the project, you can do this by copying the .env.example file and renaming it to .env. You will need to change the following variables:

```bash 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=username
DB_PASSWORD=
```

### 3. PHP & Composer

You will need to have PHP (8.1 - 8.2) installed on your machine. You can download PHP from the following link: https://www.php.net/downloads

Once you have PHP installed, you can install composer from the following link: https://getcomposer.org/download/

### 4. Install composer dependencies

You will need to install the composer dependencies. You can do this by running the following command in your terminal:

```bash
composer install
```

### 5. Install Sail

If you are using Docker, you will need to install Sail. You can do this by running the following command in your terminal:

```bash
composer require laravel/sail --dev
```

### 6. Run 

To run the application, you will need to run the following command in your terminal:

| Docker | Local |
| :-------- | :------- |
| `./vendor/bin/sail up -d` | `php artisan serve` |

## Process

### 1. Database (Only Local)

You will need to create a database with the name you put in the .env file.

```sql
CREATE DATABASE laravel;
```

### 2. Migrations And Seeders

After the choice, you must run:

| Docker | Local |
| :-------- | :------- |
|`./vendor/bin/sail artisan migrate --seed` | `php artisan migrate --seed` |


## Visit
`APP_URL`/request-docs for see endpoints specifications

## See
postman-collection.json to import all tests for api in postman.
