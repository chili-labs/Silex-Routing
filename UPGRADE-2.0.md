# Upgrade to 2.0

### New Dependencies

* Updated to work only with Silex 2.0 or later and as a consequence only Pimple
2.1+ and Symfony 2.4+ will work.

### Changes

* Namespace changed from *\SilexRouting* to *\ProjectA\Silex* for all classes
* Class ```SilexRouter``` moved to sub-namespace *\ProjectA\Silex\Routing*
* Class ```UrlGeneratorServiceProvider``` does not exist anymore and was merged
  into ```RoutingServiceProvider```
* Autoloading now complies with PSR-4 standard. (Make sure your version of
  composer supports PSR-4)
