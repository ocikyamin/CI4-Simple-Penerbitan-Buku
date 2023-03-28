# Aplikasi Layanan Penerbitan Buku Sederhana


![localhost_2023_widya_](https://user-images.githubusercontent.com/109882984/228170431-f755465c-b56f-4a69-b047-580e86f42793.png)
![localhost_2023_widya_anggota_pembayaran](https://user-images.githubusercontent.com/109882984/228170539-59400793-763f-48c5-aa6e-e612d64234d0.png)
![localhost_2023_widya_anggota_penerbitan](https://user-images.githubusercontent.com/109882984/228170549-b810d400-9b0e-45e4-8cb6-e5f5fe30442b.png)
![localhost_2023_widya_anggota_buku](https://user-images.githubusercontent.com/109882984/228170550-ff37816c-fdbf-4f9e-a2fc-2387ade8ec0c.png)
![localhost_2023_widya_anggota](https://user-images.githubusercontent.com/109882984/228170554-da96b4db-8087-40d0-94b2-e4f7bc05b173.png)


## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
