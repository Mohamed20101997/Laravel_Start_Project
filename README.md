# Laravel Project Setup

This guide explains how to set up and run the Laravel project using Docker.

---

## Prerequisites

- Docker and Docker Compose must be installed on your system.

---

## Running the Project with Docker

Follow these steps to set up and run the Laravel project:

1. **Build and start the Docker containers:**
   ```bash
   docker-compose up --build -d

2. **Install Laravel dependencies:**
   ```bash
   docker-compose exec app composer install


3. **Generate the application key:**
   ```bash
    docker-compose exec app php artisan key:generate

4. **Generate the application key:**
   ```bash
    docker-compose exec app php artisan migrate --seed


5. **Access the application:**
    Open your browser and visit:
    http://localhost:8080


## Connecting to the Database

The database service is included in the Docker setup. Here are the default configurations:

- **Host:** `mysql`
- **Database Name:** `laravel`
- **Username:** `root`
- **Password:** `secret`

---

## URLs

- **Login URL:** [http://localhost:8080/dashboard/login](http://localhost:8080/dashboard/login)

---

## Login Credentials

Use the following credentials to log in:

- **Email:** `admin@admin.com`
- **Password:** `password`

