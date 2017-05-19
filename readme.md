## Event App

[Event App] Is a web app that allows users find, book event stands / location on a map.

## Installation
1. Clone the repository into your project folder
        `https://github.com/emeka-osuagwu/Event-app-api`
2. Run `composer install` from cmd to install all project dependencies
3. Update the values in `.env` file
4. Run ```php artisan migrate``` to install the database migration

## Install Composer
Download the installer from [getcomposer.org/download](https://getcomposer.org/doc/00-intro.md), execute it and follow the instructions

## Setup the environmental variables (.env file)
        APP_ENV    =local
        APP_DEBUG  =true
        APP_KEY    =LhsswvmAfygWZdKUhZXedm3bOTAOKLxH

        ### Database configuration
        DB_HOST    =localhost
        DB_DATABASE=xxxxxxxx
        DB_USERNAME=xxxxxxxx
        DB_PASSWORD=xxxxxxxx

        ### Test database configuration
        DB_TEST_HOST   =localhost
        DB_TEST_DATABASE=xxxxxxxx
        DB_TEST_USERNAME=xxxxxxxx
        DB_TEST_PASSWORD=xxxxxxxx

        CACHE_DRIVER=file
        SESSION_DRIVER=file
        QUEUE_DRIVER=sync

        ### Email configuration
        MAIL_DRIVER=smtp
        MAIL_HOST=xxxxxxxx
        MAIL_PORT=xxx
        MAIL_USERNAME=xxxxxxxx
        MAIL_PASSWORD=xxxxxxxx
        MAIL_ENCRYPTION=xxxxxxxx
        SENDER_ADDRESS=xxxxxxxx
        SENDER_NAME=xxxxxxxx

## Requirements

        php                   >=  5.5.9
        laravel/framework      =  5.1.17
        busayo/laravel-yearly  =  1.0.*
        guzzlehttp/guzzle      =  ~4.0

## Requirements for Development

        fzaninotto/faker       = ~1.4
        phpunit/phpunit        = ~4.0
        phpspec/phpspec        = ~2.1
        mockery/mockery        = ^0.9.4
        satooshi/php-coveralls = ^0.7.1

### Stack
      * PHP/Laravel


### Testing
      * PHPUNIT
            


### Tools
      * Database - mysql

### General overview:
The overview is presented from two perspectives. The perpective of a user of the app (front-end) and the perspective of an admin(owner of the podcasting service).

**frontend users should be able to:**

     1. Use SuyaBay as a guest. No registration/signin required.
     2. Use SuyaBay as a registered user. Registration/signin required.
     3. Have access to user dashboard:
     **_Registered users_**:
          - Should be able to subscribe/unsubscribe to channels and/or specific episodes
          - See list of subscribed channels
          - Have access to contact form
          - Have access to FAQs, About and Terms and conditions pages
          - Have access to other functionalities not yet implemented!