<?php

/*
 * This file is part of the SilexRouting extension.
 *
 * (c) Project A Ventures GmbH & Co. KG
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SilexRouting\Application;

use Silex\Application;
use Symfony\Cmf\Component\Routing\ChainRouter;
use Symfony\Component\Routing\RouterInterface;

/**
 * Routing trait.
 *
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
trait RoutingTrait
{
    /**
     * Add a router to the list of routers.
     *
     * @param RouterInterface $router   The router
     * @param int             $priority The priority of the router
     */
    public function addRouter(RouterInterface $router, $priority = 0)
    {
        /* @var Application $this */
        $this['routers'] = $this->share($this->extend('routers', function (ChainRouter $chainRouter) use ($router, $priority) {
            $chainRouter->add($router, $priority);

            return $chainRouter;
        }));
    }
}
