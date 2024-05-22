# Casual Clothes E-commerce Web Application

This is a simple e-commerce web application for a casual clothing store. It allows users to view available clothing items, place orders, and manage orders. The application is built using PHP and MySQL.

## How to Run the Project

1. Make sure you have [XAMPP](https://www.apachefriends.org/index.html) installed on your system.
2. Start MySQL and Apache servers in XAMPP.
3. Clone or download this project and place it in the `htdocs` directory of your XAMPP installation.
4. Open `config/constraints.php` and configure the database connection settings according to your MySQL setup.
5. Import the `clothes-order.sql` file into your MySQL database. This will create the necessary tables for the application.
6. Access the application in your web browser by navigating to `localhost/casual-clothes-app/` (or whatever URL you specified in the `config/constraints.php` file).

## Features

- **View Clothing Items:** Users can browse through available clothing items and view details such as title, description, price, and image.
- **Place Orders:** Users can add items to their cart and place orders by providing their contact information.
- **Manage Orders:** Administrators can view all orders placed, update the status of orders, and manage customer details.

## File Structure

- `config/constraints.php`: Contains database connection settings.
- `partials/menu.php`: Navigation menu included in all pages.
- `admin/`: Directory containing administrative functionalities such as managing orders and clothing items.
- `images/`: Directory to store clothing item images.
- `css/`, `js/`: Directories containing CSS and JavaScript files for styling and interactivity.
- `index.php`: Homepage of the application.
- `manage-orders.php`: Page for administrators to manage orders.
