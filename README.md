# Notes-CRUD-php
# BeMyNotes
This repository contains the source code for a simple notes-taking web application built using PHP and MySQL.

## Table of contents
* [General info](#general-info)
* [Technologies](#technologies)
* [Setup](#setup)

## General info
BeMyNotes is a simple notes-taking web application. It provides a user-friendly interface to add, edit, and delete notes. Users can create notes by providing a title and a description for the note. The application also provides the ability to edit and delete notes as per user's requirement.

## Technologies
The application is built using the following technologies:
* PHP version: 7.2.24
* MySQL version: 5.7.32
* Bootstrap version: 4.1.3
* DataTables version: 1.13.4
* jQuery version: 3.6.4

## Setup
To run this project, follow these steps:

1. Clone this repository to your local machine using `https://github.com/<USERNAME>/BeMyNotes.git`
2. Install XAMPP or WAMP server on your local machine.
3. Start Apache and MySQL modules in XAMPP or WAMP control panel.
4. Open your browser and navigate to `http://localhost/phpmyadmin/` and import `notesdb.sql` file located inside the `database` folder.
5. Move the cloned project folder to the htdocs folder inside the XAMPP or WAMP installation directory.
6. Open your browser and navigate to `http://localhost/BeMyNotes/`.

Now you can add, edit, and delete notes using this application.

*Note: If your MySQL server is running on a different port other than 3306, please update the `localhost` and `root` values in the `$servername` and `$username` variables respectively in the `index.php` file.*
