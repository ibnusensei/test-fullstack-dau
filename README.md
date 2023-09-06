
# Test Project

Simple Product Management System using Laravel 10 and Tailwind CSS


## API Reference

#### Get Reference Number

```http
  POST https://pay.saebo.id/test-dau/api/v1/transactions
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `quantity` | `integer` | **Required**. |
| `price` | `integer` | **Required**. |
| `payment_amount` | `integer` | **Required**. |

Set price from **product table**, payment_amount from **quantity * price**




## Installation
**Clone Repository**
```bash
git clone https://github.com/ibnusensei/test-fullstack-dau.git
cd <project-folder>
```
**Install Dependencies**

Run the following command to install PHP and JavaScript dependencies:

```bash
composer install
npm install
```
**Copy Environment File**

Create a copy of the .env.example file and name it .env:
```bash
cp .env.example .env
```
**Generate Application Key**
```bash
php artisan key:generate
```
**Configure Database**

Update the .env file with your database connection details.

**Run Migrations and Seed the Database**

Run the database migrations to create tables and seed the database with initial data:

```bash
php artisan migrate --seed
```

**Start the Development Server**
```bash
php artisan serve
```
**Compile Assets**
```bash
npm run dev
```


    
## Documentation

[Documentation](https://linktodocumentation)


## 🚀 About Me
Hi! I am Ibnu,
a Fullstack Web Developer
I focus on creating functional and attractive web solutions. With experience in various projects, I am ready to make creative contributions in web development. 

