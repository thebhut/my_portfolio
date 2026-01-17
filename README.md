# My Portfolio & Admin Panel

A robust, responsive portfolio application built with **Laravel** and **Tailwind CSS**. This project features a public-facing portfolio to showcase skills and experience, coupled with a comprehensive Admin Panel for managing dynamic content.

## Features

### 🎨 Public Portfolio
-   **Hero Section**: Introduction and personal branding.
-   **Skills Display**: Categorized technical skills with proficiency levels.
-   **Experience Timeline**: Professional history and roles.
-   **Projects Showcase**: Detailed view of past work and case studies.
-   **Contact Form**: Direct messaging capability for visitors.

### 🛠️ Admin Panel
-   **Secure Authentication**: Login system for administrators.
-   **Dashboard**: Overview of total projects, skills, and messages.
-   **Content Management (CRUD)**:
    -   **Skills & Categories**: Manage technical skills and their groupings.
    -   **Projects**: Add, edit, and reorganize portfolio projects.
    -   **Experience**: Update work history.
    -   **Education**: Manage academic background.
    -   **Testimonials**: Display feedback from clients/colleagues.
    -   **Messages**: View and manage inquiries from the contact form.
-   **Responsive Design**: Fully optimized sidebar and layout for Mobile, Tablet, and Desktop.

## Tech Stack

-   **Backend**: Laravel 11/12 (PHP 8.2+)
-   **Frontend**: Blade Templates, Alpine.js
-   **Styling**: Tailwind CSS (v3 with Vite)
-   **Database**: MySQL
-   **Build Tool**: Vite

## Installation & Setup

1.  **Clone the repository**
    ```bash
    git clone https://github.com/yourusername/my_portfolio.git
    cd my_portfolio
    ```

2.  **Install PHP Dependencies**
    ```bash
    composer install
    ```

3.  **Install NPM Dependencies & Build Assets**
    ```bash
    npm install
    npm run build
    ```

4.  **Environment Configuration**
    Copy the example env file and configure your database credentials:
    ```bash
    cp .env.example .env
    ```
    Edit `.env` to set `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD`.

5.  **Generate Application Key**
    ```bash
    php artisan key:generate
    ```

6.  **Run Migrations & Seeders**
    This will set up the database schema and populate it with default admin credentials and sample data.
    ```bash
    php artisan migrate --seed
    ```

    > **Default Admin Credentials:**
    > - Email: `admin@example.com`
    > - Password: `password`

7.  **Serve the Application**
    ```bash
    php artisan serve
    ```
    Visit `http://localhost:8000` to see the app.
    Visit `http://localhost:8000/login` to access the admin panel.

## Directory Structure

-   `app/Models` - Eloquent models (Skill, Project, Experience, etc.)
-   `app/Http/Controllers/Admin` - Admin-side logic.
-   `resources/views` - Blade templates.
    -   `admin/` - Admin panel views.
    -   `layouts/` - Main layouts (`app.blade.php`, `sidebar.blade.php`, `guest.blade.php`).
-   `routes/web.php` - Application routes (Public & Admin definitions).

## Contributing

Contributions are welcome! Please ensure you run `npm run build` before submitting a pull request to ensure assets are compiled.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
