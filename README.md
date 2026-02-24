# IT Products Shop – Laravel Project

## 📌 Project Overview
**IT Products Shop** is a Laravel-based web application that simulates a small IT shop platform.  
Visitors can browse public content, while registered users and administrators gain access to additional interactive features.

This project was developed as **Project 1 – Laravel** and focuses on building a full-stack, database-driven application using modern Laravel architecture and best practices.

It demonstrates core backend and frontend concepts such as:
- Authentication
- Role-based authorization
- CRUD operations
- Database relationships
- Dynamic UI rendering

---

## 🛠️ Tech Stack
- Laravel 12  
- PHP 8.2  
- MySQL (phpMyAdmin / XAMPP)  
- Blade Templating Engine  
- Tailwind CSS  
- Alpine.js (UI interactions & navigation)  
- Laravel Breeze (authentication scaffolding)  

---

## 🔐 Authentication & User Roles

### User Capabilities
Registered users can:
- Register an account  
- Log in and log out  
- Reset forgotten passwords  
- Use the “Remember Me” feature  

### Roles
The application supports two roles:
- **User**
- **Admin**

Access to the admin panel is restricted to administrators only.

### Default Admin Account (Seeder)
A default admin account is generated using database seeders:
- **Username:** admin  
- **Email:** admin@ehb.be  
- **Password:** Password!321  

---

## 👤 User Profiles
Each user has a public profile page visible to all visitors.

Authenticated users can edit their own profile information, including:
- Username  
- Date of birth  
- Profile picture (stored on the server)  
- “About Me” description  

---

## 📰 News System

### Admin Features
Administrators can:
- Create news posts  
- Edit existing news  
- Delete news posts  

### Visitor Features
Visitors can:
- View a list of all news posts  
- Open detailed news pages  

Each news post includes:
- Title  
- Image (stored on the server)  
- Content  
- Publication date  

Authenticated users can also add comments to news posts.

---

## ❓ FAQ Section
The FAQ module is fully dynamic and database-driven.

### Admin Capabilities
- Create and manage FAQ categories  
- Add, edit, and delete FAQ questions and answers  

### Visitor Capabilities
- Browse FAQ categories  
- View questions and answers  

---

## 📩 Contact Form
Visitors can send messages through the contact form.

### Form Fields
- Name  
- Email  
- Subject  
- Message  

### On Submission
- The message is stored in the database  
- An email notification is sent to the administrator  

---

## 🧑‍💻 Admin Panel
The admin panel is protected using:
- Authentication middleware  
- Custom admin middleware  

### Admin Management Features
- News posts  
- FAQ categories and items  
- Users and their roles  

---

## 🗄️ Database Structure
The database is managed using Laravel migrations and includes the following tables:
- users  
- products  
- news  
- comments  
- faq_categories  
- faq_items  
- contact_messages  
- tags  

### Relationships

#### One-to-Many
- User → News  
- News → Comments  

#### Many-to-Many
- News ↔ Tags  

---

## 🛡️ Admin Middleware
A custom admin middleware is implemented to protect administrative routes.

### Functionality
- Ensures the user is authenticated  
- Verifies admin privileges  
- Returns a **403 Forbidden** response if access is denied  

This enforces proper role separation and improves overall application security.

---

## 🎨 UI & Layout
- Clean and minimal interface  
- Color scheme: light blue, white, and soft gray  
- Adaptive navigation based on user state:
  - Guest  
  - Logged-in User  
  - Admin  

Reusable Blade components are used for:
- Buttons  
- Navigation links  
- Forms  

---

## 🧪 Testing & Setup

Before evaluation, run the following command:

```bash
php artisan migrate:fresh --seed
