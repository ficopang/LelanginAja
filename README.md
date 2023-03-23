<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Cara pake git + github

Intall git (https://git-scm.com/downloads).
cara clone: "git clone https://github.com/ficopang/LelanginAja.git"

kalo mau tambah fitur/update

1. pull (ambil update dari commit): "git pull"
2. bikin branch baru: "git branch nama-branch"
3. pindah branch: "git switch nama-branch"
4. code, code, and code :D

cara commit

1. "git add ."
2. 'git commit -m "commit-message"'
3. "git push origin nama-branch"
4. ganti branch ke main, dan git pull

## Requirement sistem

-   Composer atau Laravel 10, yang di install dan bisa running di komputer kamu. Guide install laravel ada disini (https://laravel.com/docs/10.x/installation).
-   PHP 8.1 keatas
-   MySQL
-   Local server untuk running database, Misalnya MAMP, Apache atau WAMP (XAMPP untuk Windows)

## Setup

-   karena code di repo ini tidak ada file .env dan folder "vendor", jadi kamu perlu generate file dan folder tersebut dengan bikin project baru di laravel. dengan perintah "laravel new nama-project-baru" atau jika pake composer "composer create-project laravel/laravel nama-project-baru"
-   clone repo ini ke lokal komputer kamu, kemudian copy file .env dan folder "vendor" ke folder tujuan repo.
-   Edit .env dan arahkan ke database yang ada dan running, pada lokal kita
-   buat database baru pada MySQL. kosongkan saja data dan table nya karena kita akan migrasi dari kode laravel
-   jalankan perintah 'composer install' untuk install requirement-requirement dari code di repo
-   jalankan perintah 'composer dump-autoload' untuk perbarui file file di "vendor"
-   jalankan 'php artisan migrate:refresh' untuk membuat tabel-tabel yang diperlukan kedalam database
-   apabila berhasil, kita bisa menjalankan 'php artisan migrate:status' akan terlihat tabel-tabel yang sudah diexpor kedalam database
-   jalankan 'php artisan db:seed' untuk memasukan data dummy ke database
-   jalankan 'php artisan serve' untuk menjalankan app
-   buka http://localhost:8000 (atau sesuakian dengan port di .env)
-   jika muncul website di localhost di browser, berarti setup sudah berhasil

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.
