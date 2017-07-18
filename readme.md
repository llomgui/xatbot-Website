# OceanProject Laravel version

## What do you need to run this website?

- A database using PostgreSQL
- An account on mailtrap.io
- npm, composer installed

## How to install it?

- composer install
- npm install
- npm run production
- mv .env.example .env
- php artisan key:generate

Then copy paste this key into your .env
You should create an account on mailtrap.io to send emails from the website
Don't forget to create a database using PostgreSQL.

Copy all those information to your .env

Last commands:
- php artisan migrate
- php artisan db:seed

## I want to contribute, how do I?

First run the website from your side, code the new feature or fix an issue
Then send me a pull request.
