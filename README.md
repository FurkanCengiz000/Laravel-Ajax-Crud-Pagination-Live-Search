# Laravel Ajax CRUD, Pagination, and Live Search

This project demonstrates how to implement **CRUD operations**, **pagination**, and **live search** using **AJAX** in a Laravel application.

## Features
- **CRUD Operations**: Create, Read, Update, and Delete data asynchronously without page reloads.
- **AJAX Pagination**: Load more content dynamically with AJAX-powered pagination.
- **Live Search**: Search through records in real time using AJAX.

## Technologies
- **Backend**: Laravel 11 Framework, MySQL Database
- **Frontend**: HTML, CSS, JavaScript (AJAX, jQuery)
- **Styling**: Bootstrap 5, Toast.js
- **Tools**: Composer, NPM


## Installation

To get started with this project, follow these steps:

1. **Clone the repository**:
   ```bash
   git clone https://github.com/FurkanCengiz000/Laravel-Ajax-Crud.git
   ```

2. **Navigate into the project directory**:
   ```bash
   cd your-repo
   ```

3. **Install dependencies using Composer**:
   ```bash
   composer install
   ```

4. **Copy the `.env.example` file to `.env`**:
   ```bash
   cp .env.example .env
   ```

5. **Set up your database**:
   - Open the `.env` file and update the following lines to match your database setup:
    
    </br>

     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_database_user
     DB_PASSWORD=your_database_password
     ```

6. **Create the database** in your MySQL (or another database engine) that matches the `DB_DATABASE` name set in your `.env` file:
   ```sql
   CREATE DATABASE your_database_name;
   ```

7. **Run the migrations** to set up the database tables:
   ```bash
   php artisan migrate
   ```

8. **Generate the application key**:
   ```bash
   php artisan key:generate
   ```

9. **Run the local development server**:
   ```bash
   php artisan serve
   ```

10. **Access the application** by navigating to `http://localhost:8000` in your browser.


## Screenshots

Here are some screenshots of the project:

1. **Homepage:**

   ![homepage](https://github.com/user-attachments/assets/13c46f76-a896-411d-a8f5-ce416ac362e7)

2. **Add Product Modal:**

   ![add_product](https://github.com/user-attachments/assets/50ae6f00-af83-4c3b-9dc9-c39747ac3b8c)

3. **Update Product Modal:**

   ![update](https://github.com/user-attachments/assets/053a73a2-cfba-4c71-a645-92588292ed6d)

