<?php

/*
 * This file is part of the SilexRouting extension.
 *
 * (c) Project A Ventures GmbH & Co. KG
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SilexRouting\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

use Symfony\Component\Routing\Generator\UrlGenerator;

/**
 * Symfony CMF Routing component Provider for URL generation.
 *
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class UrlGeneratorServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Application $app)
    {
        $app['url_generator'] = $app->share(function ($app) {
            $app->flush();

            return $app['routers'];
        });
    }

    /**
     * @codeCoverageIgnore
     */
    public function boot(Application $app)
    {
    }
}
