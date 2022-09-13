Personal porfilio website that uses Laravel + vuejs

The website uses GitHub api to display your profiles Readme, any projects that you would like to show and a variety of information about each project. The project information includes:

- readme
- description
- stars 
- watchers 
- forks 
- topics
- langauges used

## Setup
```sh
git clone https://github.com/member87/portfolio/
cd portfolio
composer install
mv .env.example .env
# configure .env file
php artisan key:generate
npm install && npm run dev
php artisan serve
# http://localhost:8000
