---
id: 201801311
title: 'Create your own Laravel package'
date: 2018-01-31T09:08:25+00:00
author: Rathes Sachchithananthan
template: post
image: /images/blog/laravel-logo.png
description: A step-by-step guide on how to create a custom Laravel package, that you can ship to packagist.
categories:
  - Web
tags:
  - Laravel
  - PHP
  - webdev
locale: en_US
---

So in this article I'm going to show you step by step how you would create a package for Laravel. When I started creating Laravel packages, it was quite difficult to get some proper information, so I ended up checking existing packages and learn from how they were created.

For me packages by [Spatie](https://github.com/spatie) were a great inspiration. Their packages are well structured and their code is well written and documented, so it was a good place to get some idea on how to start.

## What is a Laravel package?

Laravel as a framework comes with a lot of features that make creating web application really easy. Authentication? Laravel got you covered! Form Validation? Yeah, we've got that! File System? Yeah!

Though we have a lot of features, there are still some features you might miss. Extending the Laravel Core isn't that difficult, it's done using packages.

Laravel itself provides some packages like [Passport](https://laravel.com/docs/5.5/passport), [Scout](https://laravel.com/docs/5.5/scout) or [Socialite](https://laravel.com/docs/5.5/socialite), but there are - like Spatie - awesome companies that commit really great awesome open source laravel packages to community.

In this article I want to show you, how you can create a package on your own, that you may publish as well.

## Prerequisites

Following steps are taken with having in mind to ship this package for Laravel 5.5 (current version as of Feb 04th, 2018) , but we are not limited to this version only. By slightly changing some dependecies you can make you package work for other versions from 5.3 - 5.6 as well.

You can also use these steps to make your package work for 5.0 - 5.2, but I won't guarantee anything. Remember that the more versions you support there you have to make sure that your package is backwards compatible. Also you won't be able to use 5.5 features in a package that also has to work with Laravel 5.2.

For developing a Laravel package you just need composer. And as you are working with Laravel already, I'm pretty sure you are using composer already. If not just make sure you have it installed. You'll get the instructions on the [getting started page on their website](https://getcomposer.org/doc/00-intro.md).

You should also have some little experience with Laravel as you are going to extend it. While developing you won't have a Laravel project installed to check your packages, but start from scratch.

## Step 1: The directory structure

There is no rule on how to design you package. Apart from little exceptions you can structure your package as you want to. Laravel as a framework does not expect anything from you at this point.

Nevertheless it makes sense to have a certain structure to ensure that you result will be clean, maintainable repository.

The following structure is how I basically create packages:

```
├── database/
│   ├── .gitkeep
├── config/
│   ├── package-name.php
├── src/
│   ├── PackageNameServiceProvider.php
├── tests/
│   ├── TestCase.php
├── .gitignore
├── CHANGELOG.md
├── composer.json
├── LICENSE
├── phpunit.xml
├── README.md
```

That's the backbone of every package I work on. So let's have a detailed look on it.

The `database/` and the `config/` directories are the same as you know from a common Laravel projects. In database I have all the `migrations`, `seeds`, and `factories`. In `config/` I store my config file of this package. (Never had the situation that I had more than a single config file so far.)

The `src/` directory is the location for all the logic of the package. Starting with the ServiceProvider `src/` can contain anything related to the package.

As you may have guessed `tests` contains the tests.

This is not a mandatory structure, so you don't have to structure your packages this way. If you don't need any configuration, you don't need `config/`, if your package doesn't touch the database, you don't need `database/`. You may even move these two directories into `src/`, it's all up to you.

But if you consider to publish and open source your package, you should care about a consistent structure, no matter how you define it.

## Step 2: `composer init`

Now as we have our structure, we can start creating the backbone of your package.

Create a new directory with the name of your package, enter it and run initialze a composer file:

```bash
$ mkdir awesome && cd awesome && composer init
```

This will start a interactive CLI programm. Just run through it until you reach the question for interactivly defining the dependecies. Here you can already define at least two:

1. You need `illuminate/support` for the Service Provider
2. With defining `php` you can define the minimum PHP version that you support.

If you want to test you application, you may also add the following packages as dev-dependencies:

3. `phpunit/phpunit`
4. `orchestra/testbench`

So what version should you use? At the beginning of this article, I mentioned that I'm gonna create a Laravel package for 5.5, so I'm gonna choose this, but you can define what ever you want, for example `5.3|5.4|5.5` if you want to support multiple Laravel version. Get the detailed information on [versioning and constraints]((https://getcomposer.org/doc/articles/versions.md)) on the composer website.

At the end of this program you should have a `composer.json` file.

This is the output of my file:

```json
{
  "name": "aheenam/awesome",
  "description": "An awesome Laravel Package",
  "license": "MIT",
  "authors": [
  ],
  "minimum-stability": "stable",
  "require": {
    "php" : "^7.0",
    "illuminate/support": "~5.5.0"
  },
  "require-dev": {
    "phpunit/phpunit": "5.*|^6.3",
    "orchestra/testbench": "~3.4.0|~3.5.0"
  }
}
```

Now run `composer install` to install the dependecies you defined.

### Autloading

When some installs you package for his Laravel project, the autoloader of his package will look up your `composer.json` if there is anything to autoload. This is missing right now, so we have to add this:

```json
"autoload": {
    "psr-4": {
        "Aheenam\\Awesome\\": "src"
    }
},
"autoload-dev": {
    "psr-4": {
        "Aheenam\\Awesome\\Test\\": "tests"
    }
},
```

So in my case, I just let `Aheenam\Awesome` map to `src/` and `Aheenam\Awesome\Test` to `tests/`. Based on you structure you might have to add some more.

### Package Discovery

In earlier versions of Laravel, you manually had to add the Service Provider of the package you installed to the projects `config/app.php`.

As of Laravel 5.5 there is a feature called "Package Discovery" that makes this step redundant.

But as Laravel does not expect you to structure your package in a specific way, you need another way to expose your packages Service Provider to the Laravel instance. That is also done in `composer.json`

```json
"extra": {
    "laravel": {
        "providers": [
            "Aheenam\\Awesome\\AwesomeServiceProvider"
        ]
    }
},
```

This little entry makes the Laravel project to discover your packages Service Provider.

## Step 3: The Service Provider

We have already linked the Service Provider in the `composer.json` file, but haven't created it yet. So let's do this:

Just create a file in `src/`. It's not uncommon to name the main service provider the same as the packages name, but you can name it as you want. Just make sure it matches to what you named it in you `composer.json`

```bash
$ touch src/AwesomeServiceProvider.php
```

The base structure of a service provider looks like following:



```php
<?php

namespace Aheenam\Awesome;

use Illuminate\Support\ServiceProvider;

class AwesomeServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }
}
```

The service provider is basically the root of you package. Here you define which config files are loaded, where view file can be found and which assets can be published. Get more information on [service providers on the Laravel documentations](https://laravel.com/docs/providers)

For now we leave it as it is. While developing the package, we will add some stuff to it.

## Step 4: Testing

The last step of configuration before we start coding belongs to testing. This step is not mandatory, but I highly recommend to write tests for you packages (as I recommend tests for any type of writing software).

I use [PHPUnit](https://phpunit.de/index.html) for Testing purposes. Configuring it is done via an `phpunit.xml` file in the root of our package.

There are a lot of config options, which you may find out [in the docs of PHPUnit](http://phpunit.readthedocs.io/en/latest/configuration.html), but most of my packages just have following simple configuration, which may enough for you needs as well:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit backupGlobals="false"
         backupStaticAttributes="false"
         bootstrap="vendor/autoload.php"
         colors="true"
         verbose="true"
         convertErrorsToExceptions="true"
         convertNoticesToExceptions="true"
         convertWarningsToExceptions="true"
         processIsolation="false"
         stopOnFailure="false"
         syntaxCheck="false">
    <testsuites>
        <testsuite name="Aheenam Test Suite">
            <directory>tests</directory>
        </testsuite>
    </testsuites>
    <filter>
        <whitelist>
            <directory>src/</directory>
        </whitelist>
    </filter>
</phpunit>
```

- creating the package
    - Routing + Controller
    - Views
- Publishing
    - choosing a license
- laravel package generator