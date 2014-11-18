<?php

/*
 * This file is part of the SilexRouting extension.
 *
 * (c) Daniel Tschinder
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ChiliLabs\Silex\Provider;

use Pimple\Container;
use Silex\Application;
use Symfony\Cmf\Component\Routing\ChainRouter;
use Silex\Provider\RoutingServiceProvider as BaseRoutingServiceProvider;

/**
 * SilexRouting provider for advanced routing.
 *
 * @author Daniel Tschinder <daniel@tschinder.de>
 */
class RoutingServiceProvider extends BaseRoutingServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $pimple)
    {
        parent::register($pimple);

        $pimple['url_matcher'] = function (Container $pimple) {
            /* @var ChainRouter $chainRouter */
            $chainRouter = $pimple['routers'];
            $chainRouter->setContext($pimple['request_context']);

            return $chainRouter;
        };

        $pimple['url_generator'] = function (Application $app) {
            $app->flush();

            return $app['routers'];
        };

        $pimple['routers'] = function (Container $pimple) {
            return new ChainRouter($pimple['logger']);
        };
    }
}
