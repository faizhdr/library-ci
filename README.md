# Library App menggunakan CI4
- *php version* `8.1`
- *Database* `MySQL`

## Set up Aplikasi

- git clone project `git clone https://github.com/faizhdr/library-ci.git`
- install composer dengan cara `composer install`
- Copy file `env` dan rename file menjadi `.env` 
- Set up DB, buat DB dengan nama *library_ci*, import file `library_ci.sql` yang ada pada project ke DB
- run project `php spark serve`

## Akses User

| Role       | Username | Password   |
|------------|----------|------------|
| **admin**  | admin    | admin123   |
| **user**   | user     | user123    |
