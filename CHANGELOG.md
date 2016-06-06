Changelog
=========

2.0.0 (2016-06-06)
------------

* Requires PHP 5.5.9 or newer
* Compatibility to Silex 2.0
* Namespace changed from \SilexRouting to \ChiliLabs\Silex for all classes
* Class SilexRouter moved to sub-namespace \ChiliLabs\Silex\Routing
* Class UrlGeneratorServiceProvider does not exist anymore and was merged into RoutingServiceProvider
* Autoloading now complies with PSR-4 standard. (Make sure your version of composer supports PSR-4)

1.0.6 (2014-12-10)
------------

* Support all Symfony 2.x versions (>=2.3)


1.0.5 (2014-11-18)
------------

* Support Symfony-CMF 1.0 again
* Update copyright


1.0.4 (2014-04-24)
------------

* Support Symfony 2.5 and Symfony-CMF 1.2


1.0.3 (2014-01-23)
------------

* Supply logger to UrlGenerator
* Loosen typehint from \Silex\Application to \Pimple where possible


1.0.2 (2013-11-17)
------------

* Add logger to ChainRouter for logging routing information


1.0.1 (2013-10-30)
------------

* Use stable 1.1 version of symfony-cmf/Routing


1.0.0 (2013-09-12)
------------

* Initial version
