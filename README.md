# php-login-system
A free and open source login system built in PHP, HTML, CSS, and JavaScript, with a MySQL database.

PHP Login System was adapted from this [YouTube video tutorial](https://youtube.com/watch?v=BaEm2Qv14oU) by Dani Krossing.

## Installation
Clone the repository to your server of choice. Note that the root of the website should be the /public_html/ directory and not the root directory of the repository.

    git clone git@github.com:BrendanGasparin/php-login-system.git

### Installing and configuring MySQL
To check if you already have MySQL installed on Debian Linux you can type:

    mysql --version

If you do not have mysql installed, you can install it with the following commands:

    sudo apt update
    sudo apt install mysql-client-core-8.0
    sudo apt install mysql-server

Log into the new MySQL installation with the root account and no password.

    sudo mysql -u root

Update the password for the root user (the default installation has no password).

    ALTER USER 'root'@'localhost' IDENTIFIED BY '<new password>';

Create the social network database:

    CREATE DATABASE login_system;

MySQL and PHP do not play nice when you use the root user, so create a new user, substituting username with your chosen username and password with a secure password:

    CREATE USER 'username'@'localhost' IDENTIFIED BY 'password';
    GRANT ALL PRIVILEGES ON login_system.* TO 'username'@'localhost';
    FLUSH PRIVILEGES;

Be sure to note the new username and password as you will need to configure PHP Login System to use them.

Locate the setup_db.sql file in the root directory of the cloned git repository. Run it as follows:

    sudo mysql -u root -p login_system < path/to/setup_db.sql

This will import the database structure into the login_system database.

### Configuring PHP Login System to use MySQL
From the root directory of the cloned repository, copy the credentials-template.php file to a new file called credentials.php:

    sudo cp ./public_html/credentials/credentials-template.php ./public_html/credentials/credentials.php

This new file is where PHP Login System will look for database login information. Edit credentials.php, e.g. with Nano:

    sudo nano ./public_html/credentials/credentials.php

Insert the username and password you selected for the root MySQL user into this file at the appropriate place. You may also modify the host and database name here.

To save and exit the credentials file in Nano, hit Control-X and then type Y and Enter at the prompt.

PHP Login System is now configured and ready for new users!