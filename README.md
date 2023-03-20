1- first in the vscode terminal or on a command line run

  + npm i
  + composer install

2- second run those command to install your db

  php artisan migrate:refresh

if you got a message asking for creating db write yes

3- run those command on separited terminal at the same time

    php artisan serve
    npm run dev
