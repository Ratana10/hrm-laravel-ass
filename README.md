# Laravel Project

## Introduction
This is a Laravel-based project designed for HRM simple system

## Requirements
Ensure your system meets the following requirements before installation:

- [PHP >= 8.0](https://www.php.net/downloads)
- [Laravel >= 10](https://laravel.com/docs/10.x/installation)
- [MySQL](https://dev.mysql.com/downloads/)
- [Composer](https://getcomposer.org/download/)
- [Node.js & npm](https://nodejs.org/en/download/) (for frontend assets)


## Installation
Follow these steps to set up the project:

1. Clone the repository:
   ```sh
   git clone https://github.com/Ratana10/hrm-laravel-ass.git
   cd hrm-laravel-ass
   ```

2. Install dependencies:
   ```sh
   composer install
   npm install
   ```

3. Copy the environment file and configure it:
   ```sh
   cp .env.example .env
   ```
   Update `.env` with your database credentials and other settings.

4. Generate application key:
   ```sh
   php artisan key:generate

5. Run database migrations:
   ```sh
   php artisan migrate --seed
   ```
6. Go to AdminLte:
   ```sh
   cd public/adminltev4
   ```
7. Install adminLte:
   ```sh
   npm install
   ```
8. Install adminLte:
   ```sh
   npm run dev
   ```
8. Once it start we can stop by:
   ```sh
   ctl + c
   ```
8. Exit from adminLte:
   ```sh
   cd ../..
   ```
9. Start the development server:
   ```sh
   php artisan serve
   ```

## Usage
- Access the application at `http://127.0.0.1:8000`

## Contact

For questions or support:

- Telegram: [https://t.me/Ratana10](https://t.me/Ratana10)
- Email: [sanratana18@gmail.com](mailto:sanratana18@gmail.com)
