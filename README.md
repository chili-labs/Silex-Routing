# Silex-Routing
###### Serviceprovider for advanced and dynamic routing in Silex

[![Latest Stable Version](https://poser.pugx.org/project-a/Silex-Routing/v/stable.png)](https://packagist.org/packages/project-a/Silex-Routing) [![Latest Unstable Version](https://poser.pugx.org/project-a/Silex-Routing/v/unstable.png)](https://packagist.org/packages/project-a/Silex-Routing) [![Total Downloads](https://poser.pugx.org/project-a/Silex-Routing/downloads.png)](https://packagist.org/packages/project-a/Silex-Routing) [![Build Status](https://secure.travis-ci.org/chili-labs/Silex-Routing.png?branch=1.0)](http://travis-ci.org/chili-labs/Silex-Routing) [![Coverage Status](https://coveralls.io/repos/chili-labs/Silex-Routing/badge.png?branch=1.0)](https://coveralls.io/r/chili-labs/Silex-Routing?branch=1.0) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/0b113487-3a34-4e79-aa1a-2ab607d6a9cd/mini.png)](https://insight.sensiolabs.com/projects/0b113487-3a34-4e79-aa1a-2ab607d6a9cd)

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
            "project-a/silex-routing": "~1.0"
        }
    }

Alternatively, you can download the [`silexrouting.zip`][1] file and extract it.

## Usage

Using Silex-Routing is very simple. All you need to do is register the provided
```RoutingServiceProvider``` and afterwards add all your custom routers (```RouterInterface```).
```php
$app = new Silex\Application();

$app->register(new SilexRouting\Provider\RoutingServiceProvider());

$router = new SilexRouting\SilexRouter($app); // e.g. The default Silex router

$app['routers']->add($router);
$app['routers']->add($router2);
...
```

If you want to use url generation simple register the ```UrlGeneratorServiceProvider```
from this package and [use generation as before](http://silex.sensiolabs.org/doc/providers/url_generator.html#usage).

```php
$app->register(new SilexRouting\Provider\UrlGeneratorServiceProvider());
```

*Do not use the Silex\Provider\UrlGeneratorServiceProvider together with Silex-Routing.
Your custom routers will not be used!*

## Tests

To run the test suite, you need [composer](http://getcomposer.org).

    $ php composer.phar install --dev
    $ phpunit

## License

Silex-Routing is licensed under the MIT license.

[1]: https://github.com/chili-labs/Silex-Routing/archive/master.zip
