# Laravel E-Commerce Management System

This is a Laravel-based E-Commerce Management System designed for admin and customer users. The application allows admins to manage products and orders, while customers can log in, view products, and place orders through an API.

## Features

- **Admin Panel**: Manage products, categories, orders, and users.
- **User Authentication**: Admin users can log in and access the admin dashboard.
- **Product Management**: Admins can add, edit, and delete products.
- **Order Management**: Admins can view and update order statuses.
- **Customer Access**: Customers can log in to view products and place orders via the API.

## Requirements

- PHP >= 8.0
- Laravel >= 10.x
- Composer
- MySQL or another supported database

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/your-repository-name.git
    ```

2. Navigate to the project directory:
    ```bash
    cd your-repository-name
    ```

3. Install the dependencies:
    ```bash
    composer install
    ```

4. Copy the environment file:
    ```bash
    cp .env.example .env
    ```

5. Generate the application key:
    ```bash
    php artisan key:generate
    ```

6. Configure your database settings in the `.env` file.

7. Run migrations to set up the database:
    ```bash
    php artisan migrate
    ```

8. (Optional) Seed the database with a default admin user:
    ```bash
    php artisan db:seed
    ```

## Usage

1. Start the local development server:
    ```bash
    php artisan serve
    ```

2. Visit `http://localhost:8000` in your web browser.

3. For admin access, log in with the admin credentials created during the seeding process.

4. Customers can log in and interact with products via the provided API endpoints.

## API Documentation

You can access the API endpoints for product viewing and order placement for customers. Refer to the API documentation in the project for detailed endpoint descriptions.

## Contributing

Contributions are welcome! Please create an issue or submit a pull request.

## License

This project is licensed under the MIT License. See the LICENSE file for more details.

