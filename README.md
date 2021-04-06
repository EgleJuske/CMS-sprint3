# CMS project built with php

## About application

This application is for educational purposes. This CMS app was built with php and ORM.

## Deployment procedure:

1. Clone this git repository or download and extract ZIP folder
2. Move folder to this directory C:\Program Files\Ampps\www
3. Start Apache and MySQL using Ampps
4. This app requires you to have **Composer** and **Doctrine** installed:
   - Install [Composer](https://getcomposer.org/download/) (install it locally in `\www` directory)
   - Go to the downloaded app folder and run this command in terminal `php ../composer.phar install`
   - To install **Doctrine** run this command in terminal `php composer.phar require doctrine/orm`
5. Import 'pagedata.sql' script to your local SQL Server
6. Follow this link to open the project in your internet browser http://localhost/cms-sprint3-master/
7. If your downloaded folder name is different, then your address in browser will be "localhost/your-folder-name"

## Launch procedure:

### Hompage

When you open the app in your browser, you get the homepage view.
You can navigate through top navigation menu adn view existing pages.

### Admin

If you want to enter the admin page, simply go to http://localhost/cms-sprint3-master/admin
or just add `/admin` to the url after opening the app.
<br><br>
To use the admin panel of this app you will have to log in as Admin<br><br>
**Log in information:**  
Username: Gurgutis  
Password: 1234

Once you are in, you can:

- create new page (page name is always required so don't leave it empty);
- edit existing page;
- delete existing pages, except for _home_ page;
- view website;
- logout from admin panel;

## Authors

[Egle](https://github.com/EgleJuske/)
