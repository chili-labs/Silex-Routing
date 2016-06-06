# Upgrade to 2.0

### New Dependencies

* Updated to work only with Silex 2.0 or later and as a consequence only Pimple
3.0+ and Symfony 2.8+ will work.
* Requires PHP version 5.5.9 or newer. This was done to be in sync with Silex.

### Changes

* Namespace changed from *\SilexRouting* to *\ChiliLabs\Silex* for all classes
* Class ```SilexRouter``` moved to sub-namespace *\ChiliLabs\Silex\Routing*
* Class ```UrlGeneratorServiceProvider``` does not exist anymore and was merged
  into ```RoutingServiceProvider```
* Autoloading now complies with PSR-4 standard. (Make sure your version of
  composer supports PSR-4)
