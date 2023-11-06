# Employee Records Management System

## Table of Contents
- [Description](#description)
- [Installation](#installation)
- [Usage](#usage)
- [Database Setup](#database-setup)
- [Tech Stack](#tech-stack)


## Description

This web application is built using Laravel and MySQL, providing a complete Employee Records Management System. It includes user authentication, CRUD operations for employee records, and a summary page with insightful statistics.

Key Features:
- User authentication with username and password.
- CRUD operations for employee records with the following fields: First Name, Last Name, Gender, Birthday, Monthly Salary.
- A summary page displaying the following statistics:
  - Count of Male & Female employees.
  - Average age of all employees.
  - Total monthly salary of all employees.

## Installation

1. Clone this repository to your local machine.

   ```bash
   git clone https://github.com/marcaltea2/employee-records.git

2. change your working directory to the project folder

   cd employee-records

3. install taildwind css + vite

   https://tailwindcss.com/docs/guides/laravel#vite

4. create dabase
   database name: employee_records

5. run database migration
   php artisan migrate

6. start the server in laravel 
   php artisan serve

7. start the server of vite
   npm run dev

Usage

To access the application, open a web browser and navigate to http://127.0.0.1:8000. You can log in with the provided username and password.

Username: your_username
Password: your_password
Use the application to manage employee records, perform CRUD operations, and view summary statistics.

Tech Stack
Laravel: A PHP web application framework.
MySQL: A relational database management system.
Tailwind CSS: A utility-first CSS framework.
Vite: A build tool for frontend development.
