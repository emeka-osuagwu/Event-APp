## Event App

[Event App] Is a web app that allows users find, book event stands / location on a map.

## Installation
1. Clone the repository into your project folder
        `https://github.com/emeka-osuagwu/Event-app-api`
2. Run `composer install` from cmd to install all project dependencies
3. Update the values in `.env` file
4. Run ```php artisan migrate``` to install the database migration

## Quick Start
  *seed the database by running `php artisan db:seed`

## URL to api doc on postman
  *https://documenter.getpostman.com/collection/view/1035891-54c84a5e-1faa-9a9c-4e57-da1950cfb37e`

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
  User can registers to the platform.
  User can login into the platform.
  User can find hall / event stands on a map view.
  User can book hall / event stands
  User can view hall / event stands details  

###PROJECT DEVELOPMENT PHASE

###API BACKEND SERVICE
  Create backend authentication service for the user system.
  Create CRUD service for the hall / event stands on the application
  Create Booking service for the hall / event stands 
  Create readable response service for the backend service

###TEST DRIVEN DEVELOPMENT
  Create  successful / error test cases for the authentication service components
  Create  successful / error test cases for the hall / event stands service components
  Create  successful / error test cases for the hall / event stands booking service components
  Create  successful / error test cases for the API response service
