[![Build Status](https://travis-ci.org/bayubimantarar/suratapp.svg?branch=master)](https://travis-ci.org/bayubimantarar/suratapp)

# Aplikasi Manajemen Surat Masuk & Surat Keluar
Aplikasi manajemen surat masuk dan keluar STMIK Bandung

## Instalasi
1. clone repository
2. install dependencies composer

        composer install --no-dev #for production

        composer install #for development

3. copy file environment

        cp .env.example .env

4. generate application key

        php artisan key:generate

## Test
Test with phpunit

    ./vendor/bin/phpunit
