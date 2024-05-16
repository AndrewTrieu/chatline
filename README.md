# ChatLine - Real-time Messaging App

ChatLine is a real-time messaging app that allows users to send and receive messages in real-time. Users can create an account, log in, and send messages to other users. The app is built using JavaScript, PHP, and MySQL.

## Features

- User authentication
- Real-time messaging
- User search
- User online/offline status
- User last seen status

## Deployment to Heroku

The app is desgigned to be deployed on Heroku with ClearDB.

1. Create an Heroku project
2. Push the app to Heroku
```bash
heroku git:remote -a chatline && git push heroku main
```
3. Add a MySQL database with ClearDB
4. Get ClearDB credentials, navigate to _Settings_ > _Config vars_. The URL is in the form:
```bash
mysql://<username>:<password>@<host>/heroku_3b61f10a737bcca?reconnect=true
```
5. Configure PHPMyAdmin to connect to ClearDB by modifying `~\xampp\phpMyAdmin\config.inc.php`:
```php
/* Heroku remote server */
$i++;
$cfg["Servers"][$i]["host"] = <host>;
$cfg["Servers"][$i]["user"] = <username>;
$cfg["Servers"][$i]["password"] = <password>;
$cfg["Servers"][$i]["auth_type"] = "config";
```
6. Open the new Heroku server in PHPMyAdmin and import `chatline.sql`

## Local Setup

1. Clone the repository
2. Install [XAMPP](https://www.apachefriends.org/index.html)
3. Start the Apache and MySQL servers
4. Create a new database in phpMyAdmin
5. Import the `chatline.sql` file into the database
6. Update the database credentials in `config.php`
7. Copy the repository to the `htdocs` folder in the XAMPP directory
8. Open the app in a web browser using the URL `http://<your-localhost>/chatline/`

## Disclaimer

Based on [this project](https://www.youtube.com/watch?v=VnvzxGWiK54&ab_channel=CodingNepal).
