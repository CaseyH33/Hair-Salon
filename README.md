# Hair Salon

##### A site for a hair salon with a database of stylists and their clients

#### By Casey Heitz

## Description

This application will allow the user to view, edit, and input a list of stylists and their clients.  On the main page, users can view a list of stylists and add new stylists.  Each stylist has their own page with a list of their clients.  Users can add new clients to each stylist, edit information about the stylist, or delete the stylist.  Individual clients also have their own pages displaying their name and phone number.  This information can be editted via a form, and the client can also be deleted.

## Setup

* Run composer install in Terminal from the project root folder.
* Start the PHP server from Terminal in the /web folder.
* Open a web browser and navigate to "localhost:8000".

* If building database, follow these instructions in terminal:
    * $ /Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot
    * CREATE DATABASE hair_salon;
    * USE hair_salon;
    * CREATE TABLE stylists (name VARCHAR (255), id serial PRIMARY KEY);
    * CREATE TABLE clients (name VARCHAR(255), phone VARCHAR(255), stylist_id int, id serial PRIMARY KEY);
    * DROP DATABASE hair_salon_test;

## Technologies Used

PHP, PHPUnit, Silex, Twig, MySQL.

### Legal

Copyright (c) 2015 Casey Heitz

This software is licensed under the MIT license.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
