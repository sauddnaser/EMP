# EMP
# Laravel Project Setup Instructions

Thank you for accessing this Laravel project! Follow the steps below to clone and set up the project on your local machine.

## Prerequisites
Before proceeding, ensure you have the following installed on your system:

1. **PHP (>= 8.0)**
2. **Composer**
3. **MySQL** or a compatible database server
4. **Node.js** and **npm** (for frontend dependencies)
5. **Git** (to clone the repository)

## Steps to Clone and Set Up the Project

### 1. Clone the Repository
```bash
# Replace <repository-url> with the actual GitHub repository URL
git clone <repository-url>
```

### 2. Navigate to the Project Directory
```bash
cd <project-directory>
```

### 3. Install PHP Dependencies
Run the following command to install the required PHP packages using Composer:
```bash
composer install
```

### 4. Create the `.env` File
Copy the `.env.example` file to `.env`:
```bash
cp .env.example .env
```

### 5. Configure the `.env` File
Edit the `.env` file to match your local environment setup. Update the database credentials:
```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

### 6. Generate the Application Key
Run the following command to generate the application key:
```bash
php artisan key:generate
```

### 7. Migrate the Database
Run the migrations to create the necessary tables in your database:
```bash
php artisan migrate
```

### 8. Seed the Database (Optional)
If the project includes seeders for initial data, run:
```bash
php artisan db:seed
```

### 9. Install Frontend Dependencies
Install the required Node.js packages for frontend assets:
```bash
npm install
```

### 10. Build Frontend Assets
Compile the frontend assets:
```bash
npm run dev
```
For production:
```bash
npm run prod
```

### 11. Start the Development Server
Run the Laravel development server:
```bash
php artisan serve
```
By default, the application will be accessible at `http://127.0.0.1:8000`.

### 12. Log In to the Application
Use the following default credentials (if provided) or refer to the seeders:
- **Admin:**
  - Email: `admin@example.com`
  - Password: `password`
- **Other Users:** Refer to the seeded data or database for other login credentials.

## Additional Notes
- If you encounter permission issues, ensure proper write permissions for the `storage` and `bootstrap/cache` directories:
  ```bash
  chmod -R 775 storage bootstrap/cache
  ```

- For production deployment, configure the server and `.env` file accordingly.

## Support
For any questions or issues, please contact me Saud +97333660692.

---

Enjoy working with the project!
