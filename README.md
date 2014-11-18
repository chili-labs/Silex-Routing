# Silex-Routing
###### Serviceprovider for advanced and dynamic routing in Silex

[![Latest Stable Version](https://poser.pugx.org/project-a/Silex-Routing/v/stable.png)](https://packagist.org/packages/project-a/Silex-Routing) [![Latest Unstable Version](https://poser.pugx.org/project-a/Silex-Routing/v/unstable.png)](https://packagist.org/packages/project-a/Silex-Routing) [![Total Downloads](https://poser.pugx.org/project-a/Silex-Routing/downloads.png)](https://packagist.org/packages/project-a/Silex-Routing) [![Build Status](https://secure.travis-ci.org/chili-labs/Silex-Routing.png?branch=1.0)](http://travis-ci.org/chili-labs/Silex-Routing) [![Coverage Status](https://coveralls.io/repos/chili-labs/Silex-Routing/badge.png?branch=1.0)](https://coveralls.io/r/chili-labs/Silex-Routing?branch=1.0) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/0b113487-3a34-4e79-aa1a-2ab607d6a9cd/mini.png)](https://insight.sensiolabs.com/projects/0b113487-3a34-4e79-aa1a-2ab607d6a9cd)

## Description

Silex-Routing allows you to define custom and multiple routers for Silex. This is
especially useful when working with dynamic routes, which are not known while
writing the code (e.g. URLs stored in database).

This implementation works for both, matching and generating of URLs.

The advanced routing is achieve by connecting Silex with symfony-cmf/Routing.

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

***Please be aware that version 2.0 is still experimental and subject to change as
long as Silex 2.0 is not stable.***

Version 2 is not backward compatible with version 1. Make sure to carefully read
the [upgrade instructions][2].

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
[2]: https://github.com/chili-labs/Silex-Routing/blob/master/UPGRADE-2.0.md
