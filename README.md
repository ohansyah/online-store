![Storefront Screenshot](storage\app\public\default\screenshots\app-collection.webp)

[![PHP](https://img.shields.io/badge/PHP-%5E8.2-blue)](https://www.php.net/) [![Laravel](https://img.shields.io/badge/Laravel-%5E11.0-blue)](https://laravel.com/) [![Laravel Jetstream](https://img.shields.io/badge/Laravel_Jetstream-%5E5.1-blue)](https://jetstream.laravel.com/) [![Livewire](https://img.shields.io/badge/Livewire-%5E3.0-blue)](https://laravel-livewire.com/) [![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-%5E3.0-blue)](https://tailwindcss.com/) [![Laravel Livewire Tables](https://img.shields.io/badge/Laravel_Livewire_Tables-%5E3.2-blue)](https://github.com/rappasoft/laravel-livewire-tables)


**Simple Online Store** is a open-source web end user with CMS. Built using the **TALL stack** (TailwindCSS, Alpine.js, Laravel, Livewire). Designed to be simple online store showcasing your products. It’s lightweight, modern, and easy to deploy, perfect for learning, side projects, or running a simple online shop.

---

### End User
- Search Products
- Filter by Categories
- Banner Sliders
- Product Sections Popular
- Product Sections Discount
- List Categories
- List Products

### Admin CMS
- **Dashboard**: Overview Banners, Products, Product Sections, Categories
- **Product**: Manage catalogue products
- **Product Section**: Customeable Section for better targeted products
- **Category**: Organize products into categories for easier management
- **Banner**: Manage Crousel Banner

---

### Installation Steps
Follow these steps to set up your Laravel 10 project with Jetstream and Vite:

1. **Clone the Repository**
   ```bash
   git clone https://github.com/ohansyah/online-store.git
   cd online-store
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
   php artisan migrate:fresh --seed
8. **Install and Build Vite Assets**
   ```bash
   npm run dev

   # OR for production build
   npm run prod
9.  **Start the Laravel Development Server**
    ```bash
    php artisan serve
10. **Access Your Application**  
    Open your web browser and visit http://localhost:8000 to access online store project.  
    Admin CMS http://localhost:8000/admin/login.  

    - Email: `admin@onlinestore.com`  
    - Password: `password`



---

### End User
![app-home](storage\app\public\default\screenshots\app-home.webp)
![app-home-1](storage\app\public\default\screenshots\app-home-1.webp)
![app-detail-product](storage\app\public\default\screenshots\app-detail-product.webp)
![app-search](storage\app\public\default\screenshots\app-search.webp)

---

### Admin CMS
![admin-dashboard](storage\app\public\default\screenshots\admin-dashboard.webp)
![admin-banner](storage\app\public\default\screenshots\admin-banner.webp)
![admin-category](storage\app\public\default\screenshots\admin-category.webp)
![admin-product](storage\app\public\default\screenshots\admin-product.webp)
![admin-product-section](storage\app\public\default\screenshots\admin-product-section.webp)