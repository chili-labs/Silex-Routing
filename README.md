# Silex-Routing
###### Advanced and dynamic routing for Silex

[![Latest Stable Version](https://poser.pugx.org/project-a/Silex-Routing/v/stable.png)](https://packagist.org/packages/project-a/Silex-Routing) [![Latest Unstable Version](https://poser.pugx.org/project-a/Silex-Routing/v/unstable.png)](https://packagist.org/packages/project-a/Silex-Routing) [![Total Downloads](https://poser.pugx.org/project-a/Silex-Routing/downloads.png)](https://packagist.org/packages/project-a/Silex-Routing) [![Build Status](https://secure.travis-ci.org/project-a/Silex-Routing.png?branch=master)](http://travis-ci.org/project-a/Silex-Routing) [![Coverage Status](https://coveralls.io/repos/project-a/Silex-Routing/badge.png?branch=master)](https://coveralls.io/r/project-a/Silex-Routing?branch=master) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/0b113487-3a34-4e79-aa1a-2ab607d6a9cd/mini.png)](https://insight.sensiolabs.com/projects/0b113487-3a34-4e79-aa1a-2ab607d6a9cd)

## Description

Silex-Routing allows you to define custom and multiple routers for Silex which 
then are used for matching and generating urls.
This advanced routing is achieve by connecting Silex with symfony-cmf/Routing.

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
    $ vendor/bin/phpunit

## License

Silex-Routing is licensed under the MIT license.

## More about Project A Ventures

[www.project-a.com](http://www.project-a.com/en/working-with-project-a/)

[1]: https://github.com/project-a/Silex-Routing/archive/master.zip
