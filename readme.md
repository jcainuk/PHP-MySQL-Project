# Yoga Blog CMS

## Overview

This project is a Content Management System (CMS) for a yoga blog, built using PHP and MySQL. It allows users to create, manage, and share yoga-related content dynamically, utilizing best practices in web development.

## Table of Contents

- [Features](#features)
- [Technologies Used](#technologies-used)
- [Usage](#usage)
- [Folder Structure](#folder-structure)
- [How to Understand the Project](#how-to-understand-the-project)
  - [1. Overall Structure](#1-overall-structure)
  - [2. Understanding Key Files](#2-understanding-key-files)
  - [3. Exploring Core Functionality](#3-exploring-core-functionality)
  - [4. Look at Content Management](#4-look-at-content-management)
  - [5. Front-End Components](#5-front-end-components)
  - [6. .htaccess and Routing](#6-htaccess-and-routing)
- [Screenshots](#screenshots)
- [Contact](#contact)

---

## Features

- **Dynamic Content Management:** Easily create, manage and delete blog posts, categories, and images.
- **User Authentication:** Secure login for users.
- **CRUD Operations:** Full create, read, update, and delete functionalities for managing content.
- **File Uploads:** Support for uploading images and other media.
- **Bootstrap Styling:** Responsive design using Bootstrap for an appealing user interface.

## Technologies Used

- **PHP:** Server-side scripting language for dynamic content.
- **MySQL:** Relational database management system for storing data.
- **HTML/CSS/jQuery:** Frontend technologies for structure and interactivity.
- **Bootstrap:** Frontend framework for responsive design.

## Usage

Access the live yoga blog [here](https://magenta-starling-620679.hostingersite.com/)

1. **Login:** Navigate [here](https://magenta-starling-620679.hostingersite.com/) click **Log in** and enter the following credentials:

```

USERNAME: jonathan
PASSWORD: secret

```

2. **Create Content:** Use the admin panel to create, edit and elete new posts and images, and manage existing ones.
3. **Publish an Article:** If an article is created without a published date then it will be hidden on the main index page. However clicking publish next to article from the admin section will publish it to the live site.
4. **Browse Blog:** Visit the homepage to view the latest yoga articles and resources.

## Folder Structure

Here’s a visual representation of the folder structure for the Yoga Blog CMS:

```
/yoga-blog-cms
│
├── /admin # Admin panel files for managing content
├── /classes # PHP classes for object-oriented programming
├── /css # Stylesheets for the project
├── /includes # Reusable components and PHP scripts
├── /js # JavaScript files for client-side functionality
├── /uploads # Directory for storing uploaded files (images, documents)
├── .htaccess # Apache configuration file for URL rewriting and access control
├── article.php # Script for displaying individual articles
├── config.php # Configuration file for database and application settings
├── index.php # Main entry point for the application
├── login.php # Login page for user authentication
└── logout.php # Logout functionality for users
```

This structure helps organize the different components of the CMS effectively, separating admin functions, classes, assets, and core functionalities.

## How to Understand the Project

### 1. Overall Structure

- Above is a diagram with the overall folder organization of the project.
- Note the folder separation of front-end components (/CSS, /JS) and back-end components
  (/classes, /includes etc.)

### 2. Understanding Key Files

- **config.php:**
  - Check how database connections are established.
  - Look for any constants or settings that configure the application.
- **index.php:**
  - Identify how routing is handled.
  - Understand the flow of the application as users interact with it.

### 3. Exploring Core Functionality

- **/admin Directory:**
  - Review files related to the admin panel for managing content, user roles, and settings.
- **/classes Directory:**
  - Look into each class to understand its purpose and how it implements object-oriented programming (OOP) principles.

### 4. Look at Content Management

- **article.php:**
  - Analyze how articles are fetched from the database and displayed.
  - Understand the query structure and data processing.
- **/uploads Directory:**
  - Review how file uploads are handled, including any validation and security measures.

### 5. Front-End Components

- **/css Directory:**
  - Examine the stylesheets for the layout and design.
  - Look for responsive design practices.
- **/js Directory:**
  - Inspect JavaScript files for client-side interactions, form validations, and AJAX calls.

### 6. .htaccess and Routing

- Understand how the `.htaccess` file controls URL rewriting for clean URLs.
- Check for any rules that manage access control and redirects.

## Screenshots

![Main Page](/uploads/screenshot1.png)
_Main page overview of the CMS_

![Article Page](/uploads/screenshot2.png)
_Main page overview of the CMS_

![Log in screen](/uploads/screenshot3.png)
_Log in screen_

![Admin dashboard](/uploads/screenshot4.png)
_Admin dashboard_

![Create new article](/uploads/screenshot5.png)
_Create new article_

## Contact

- **Website:** [My Portfolio Website](https://jcainuk.netlify.app/)
