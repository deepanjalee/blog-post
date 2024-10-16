## Clone the Repository

- git clone git clone https://github.com/deepanjalee/blog-post.git

## Move to Project Folder
- cd blog-post

## Install Dependencies

composer install 
# (*Must install composer)
npm install 
# (*Must install Node.Js)

## Set Up Environment Variables
cp .env.example .env 
## Then Set up the database connection with the correct credentials.
# EX:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password

## Generate the Application Key
php artisan key:generate

## Run Migrations with seeds
php artisan migrate --seed

## Serve the Application Locally
php artisan serve
npm run dev

## Use following Login Details :
# Email    :  admin@gmail.com
# Password :  admin@gmail.com

