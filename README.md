IT Products Shop – Laravel Project
 --------------------------------------------
  Project Description

This project is a Laravel-based web application that represents a small IT shop platform. Visitors can browse public content, while registered users and administrators have access to additional interactive features.

The project focuses on building a full-stack, database-driven application using Laravel. It demonstrates key backend and frontend concepts such as authentication, role-based authorization, CRUD operations, database relationships, and dynamic UI rendering.

This application was developed as Project 1 – Laravel.

---------------------------------------------------

Tech Stack

-Laravel 12
-PHP 8.2
-MySQL (phpMyAdmin / XAMPP)
-Blade templating engine
-Tailwind CSS
-Alpine.js (UI and navigation interactions)
-Laravel Breeze (authentication scaffolding)


--------------------------------------------------

Core Features
Authentication & User Roles


Users can:

-Register an account
-Log in and log out
-Reset forgotten passwords
-Use the “Remember me” feature


Two user roles are supported:

-User
-Admin


Only administrators can access the admin panel.

A default admin account is created using database seeders:

-Username: admin
-Email: admin@ehb.be
-Password: Password!321


---------------------------------------------------

 Project Description

-Every user has a public profile page visible to all visitors
-Logged-in users can edit their own profile


Profile information includes:

-Username
-Date of birth
-Profile picture (stored on the server)
-Short “About me” section



---------------------------------------------------

News System

Admins can:

-Create news posts
-Edit existing news
-Delete news


Visitors can:

-View a list of all news posts
-Open detailed news pages

Each news item contains:

-Title
-Image (stored on the server)
-Content
-Publication date

Authenticated users can add comments to news posts.

---------------------------------------------------


FAQ Section

The FAQ module is fully dynamic and loaded from the database.

Admins can:

-Create and manage FAQ categories
-Add, edit, and delete FAQ questions and answers

Visitors can:

-Browse FAQ categories
-View questions and answers
---------------------------------------------------

Contact Page

Visitors can send messages using the contact form.


Form fields:

-Name
-Email
-Subject
-Message

On submission:

-The message is saved in the database
-An email notification is sent to the administrator

---------------------------------------------------

Admin Panel

The admin panel is protected using:

-Authentication middleware
-Custom admin middleware


Admins can manage:

-News posts
-FAQ categories and items
-Users and their roles


---------------------------------------------------

Database Structure

The database is created using Laravel migrations and includes the following tables:

-users
-products
-news
-comments
-faq_categories
-faq_items
-contact_messages
-tags


Relationships
********

One-to-Many
-User → News
-News → Comments

Many-to-Many
*********
-News ↔ Tags
---------------------------------------------------

 Middleware Explanation (Admin)

A custom admin middleware is used to protect administrative routes.

Functionality:


-Ensures the user is authenticated
-Checks if the user has admin privileges
-Returns a 403 Forbidden response if access is denied

This enforces proper role separation and improves application security.



---------------------------------------------------

UI & Layout

-Clean and minimal interface
-Color scheme based on light blue, white, and soft gray
-Navigation adapts based on user state:

-Guest
-Logged-in user
-Admin

Reusable Blade components are used for:

-Buttons
-Navigation links
-Forms

---------------------------------------------------


Testing & Setup

Before evaluation, the following command can be executed safely:

***  php artisan migrate:fresh --seed   ****


This will:

-Recreate the database
-Seed default data (admin account, news, FAQs, etc.)


Test Checklist:
-User registration and login
-Admin login
-Create, edit, and delete news
-View news as a visitor
-Add comments
-Edit user profile
-Manage FAQ conten
-Submit contact form
-Verify admin route protection
------------------------------------------------


*****************
Resources & References
*****************

The following resources were used for learning and reference:

Laravel Documentation
https://laravel.com/docs

Laravel Breeze
https://laravel.com/docs/starter-kits#laravel-breeze

Blade Templates
https://laravel.com/docs/blade

Laravel Eloquent ORM
https://laravel.com/docs/eloquent

Tailwind CSS
https://tailwindcss.com/docs

Alpine.js
https://alpinejs.dev/start

PHP Documentation
https://www.php.net/docs.php

All external code and concepts used were understood and adapted for this project.
-----------------------------------------------------------------------------------------

 
 Final Notes
-------------

This project follows all functional and technical requirements.

The application is fully dynamic and database-driven.

Security, clean structure, and readability were prioritized.

The code is written in a clear and understandable way.
