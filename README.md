# smart-fishery


## Runing the app

```bash
# (1) clone the project
$ git clone https://github.com/Umutoni123/smartfishery.git

# (2) create a .env file in the root folder of the repository taking .env.example as a sample

# (3) run the migrations and the seed data (remember to first create the database)
$ php artisan migrate
$ php artisan db:seed --class=UsersSeeder
$ php artisan db:seed --class=RecordingsSeeder

# (4) run the application
$ php artisan serve
```