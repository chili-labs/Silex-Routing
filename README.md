# Silex-Routing
###### Serviceprovider for advanced and dynamic routing in Silex

[![Latest Stable Version](https://img.shields.io/packagist/v/project-a/silex-routing.svg?style=flat&label=stable)](https://packagist.org/packages/project-a/silex-routing)
[![Total Downloads](https://img.shields.io/packagist/dt/project-a/silex-routing.svg?style=flat)](https://packagist.org/packages/project-a/silex-routing)
[![License](https://img.shields.io/packagist/l/project-a/silex-routing.svg?style=flat)](https://packagist.org/packages/project-a/silex-routing)
[![Build Status](https://secure.travis-ci.org/chili-labs/Silex-Routing.svg?branch=master)](http://travis-ci.org/chili-labs/Silex-Routing)
[![Coverage Status](https://img.shields.io/coveralls/chili-labs/Silex-Routing/master.svg?style=flat)](https://coveralls.io/r/chili-labs/Silex-Routing?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/5aad6289-fd8d-4dac-9472-fb02428a9f0a/mini.png)](https://insight.sensiolabs.com/projects/5aad6289-fd8d-4dac-9472-fb02428a9f0a)

<a target='_blank' rel='nofollow' href='https://app.codesponsor.io/link/napKqUy7ZTEunMtesQZm9ygE/chili-labs/Silex-Routing'>  <img alt='Sponsor' width='888' height='68' src='https://app.codesponsor.io/embed/napKqUy7ZTEunMtesQZm9ygE/chili-labs/Silex-Routing.svg' /></a>

## Description

Silex-Routing allows you to define custom and multiple routers for Silex. This is
especially useful when working with dynamic routes, which are not known while
writing the code (e.g. URLs stored in database).

This implementation works for both, matching and generating of URLs.

The advanced routing is achieved by connecting Silex with symfony-cmf/Routing.

## Installation

The recommended way to install Silex-Routing is [through
composer](http://getcomposer.org). Just create a `composer.json` file and
run the `php composer.phar install` command to install it:

    {
        "require": {
            "project-a/silex-routing": "dev-master"
        }
    }

Alternatively, you can download the [`silexrouting.zip`][1] file and extract it.

#### Upgrade from 1.0 to 2.0

Version 2 is not backward compatible with version 1. Make sure to carefully read
the [changelog][2].

## Usage

Using Silex-Routing is very simple. All you need to do is register the provided
```RoutingServiceProvider``` and afterwards add all your custom routers
(```RouterInterface```).

```php
$app = new \Silex\Application();
$app->register(new \ChiliLabs\Silex\Provider\RoutingServiceProvider());

$router2 = new \Acme\Silex\MySpecialRouter();
$app['routers']->add($router);
...
```

There is a router in this repository named ```SilexRouter```, that handles the
default routing behavior of Silex. Registering this router ensures, that all
routes added through the main Silex application still work. (This router is not
registered by default.)

*Since version 2.0 of project-a/silex-routing the url generation is included in the ```RoutingServiceProvider``` and
no special ```UrlGeneratorServiceProvider``` is needed anymore.*

## Tests

To run the test suite, you need [composer](http://getcomposer.org).

    $ php composer.phar install --dev
    $ phpunit

## License

Silex-Routing is licensed under the MIT license.

[1]: https://github.com/chili-labs/Silex-Routing/archive/master.zip
[2]: https://github.com/chili-labs/Silex-Routing/blob/master/CHANGELOG.md
