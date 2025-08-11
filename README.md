<p align="center">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" alt="GO-Blog" width="500">
</p>

[![PHP](https://img.shields.io/badge/PHP-%5E8.2-blue)](https://www.php.net/) [![Laravel](https://img.shields.io/badge/Laravel-%5E11.0-blue)](https://laravel.com/) [![Laravel Jetstream](https://img.shields.io/badge/Laravel_Jetstream-%5E5.1-blue)](https://jetstream.laravel.com/) [![Livewire](https://img.shields.io/badge/Livewire-%5E3.0-blue)](https://laravel-livewire.com/) [![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-%5E3.0-blue)](https://tailwindcss.com/) [![Blade UI Kit (Heroicons)](https://img.shields.io/badge/Blade_UI_Kit_(Heroicons)-%5E2.3-blue)](https://blade-ui-kit.com) [![Blade CSS Icons](https://img.shields.io/badge/Blade_CSS_Icons-%5E1.4-blue)](https://github.com/khatabwedaa/blade-css-icons) [![Larapex Charts](https://img.shields.io/badge/Larapex_Charts-dev--master-blue)](https://github.com/ArielMejiaDev/larapex-charts) [![Laravel Livewire Tables](https://img.shields.io/badge/Laravel_Livewire_Tables-%5E3.2-blue)](https://github.com/rappasoft/laravel-livewire-tables)


Cashier Simple POS is a web-based point-of-sale (POS) system built using the Laravel TALL stack. Designed to be simple yet powerful, this system includes key features for managing orders and products, with support for multiple users in single store. The project uses Laravel Jetstream as a starter pack, providing authentication and other essential features.

   

### Features

- **Multiuser**: Manage multiple users.
- **Dashboard Overview**: Get a quick glance at the system's key metrics and performance.
- **Order Chart**: Visualize orders and sales trends over time.
- **Checkout Page**: Streamlined checkout process for completing sales.
- **Order Summary**: Overview of the current order before finalizing the sale.
- **List Orders**: View a comprehensive list of all orders.
- **Detail Orders**: Drill down into the details of individual orders.
- **Master Product**: Manage the inventory of products available for sale.
- **Master Category**: Organize products into categories for easier management.
- **Receipt Order**: Print, Download as PDF and Image Receipts.

---

### Installation Steps
Follow these steps to set up your Laravel 10 project with Jetstream and Vite:

1. **Clone the Repository**
   ```bash
   git clone https://github.com/ohansyah/cashier.git
   cd cashier
2. **Install Composer Dependencies**
   ```bash
   composer install
3. **IInstall NPM Dependencies**
   ```bash
   npm instal
4. **Copy the Environment File**
   Create a copy of the .env.example file and name it .env.
   ```bash
   cp .env.example .env
5. **Generate an Application Key**
   ```bash
   php artisan key:generate
6. **Configure the Database**
   Update the .env file with your database connection details:
   ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
7. **Run Migrations and Seed the Database**
   ```bash
   php artisan migrate --seed
8. **Install and Build Vite Assets**
   ```bash
   npm run dev

   # OR for production build
   npm run prod
9.  **Start the Laravel Development Server**
    ```bash
    php artisan serve
10. **Access Your Application**
Open your web browser and visit http://localhost:8000 to access cashier project.
