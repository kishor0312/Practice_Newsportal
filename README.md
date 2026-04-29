
# 📰 News Portal Project

A robust and dynamic News portal application built with the **Laravel** framework. This project features a full administrative dashboard to manage news articles, categories, and user interactions.

## 🚀 Features

* **User Authentication:** Breeze authentication.
* **Content Management (CMS):** Create, Read, Update, and Delete (CRUD) news posts and categories.
* **Dynamic UI:** Responsive design for reading news on mobile and desktop.
* **Media Management:** Upload and manage featured images for news stories.
* **Nepali Date Integration:** Support for local date formatting.

## 🛠️ Tech Stack

* **Backend:** PHP 8.x, Laravel 13
* **Database:** MySQL / Eloquent orm 
* **Frontend:** Blade Templating, Tailwind CSS / Bootstrap
* **Tools:** Composer, NPM, git

## 💻 Installation Guide

Follow these steps to set up the project locally on your machine:

**Clone the repository:**
   git clone https://github.com/kishor0312/Practice_Newsportal.git
   cd Practice_Newsportal

**Install dependencies:**
composer install
npm install && npm run dev

**Configure Environment:**
cp .env.example .env
php artisan key:generate

**Database Setup:**
php artisan migrate

**Start the server:**
php artisan serve
