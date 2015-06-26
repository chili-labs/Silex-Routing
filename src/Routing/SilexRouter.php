<?php

/*
 * This file is part of the SilexRouting extension.
 *
 * (c) Daniel Tschinder
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ChiliLabs\Silex\Routing;

use Pimple\Container;
use Psr\Log\LoggerInterface;
use Silex\Provider\Routing\RedirectableUrlMatcher;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouterInterface;

/**
 * The default router, which matches/generates all the routes
 * add by the methods in Application
 *
 * @author Daniel Tschinder <daniel@tschinder.de>
 */
class SilexRouter implements RouterInterface
{
    /**
     * @var Container
     */
    protected $pimple;

    /**
     * @var RequestContext
     */
    protected $context;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @param Container       $pimple
     * @param LoggerInterface $logger
     */
    public function __construct(Container $pimple, LoggerInterface $logger = null)
    {
        $this->pimple = $pimple;
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function setContext(RequestContext $context)
    {
        $this->context = $context;
    }

    /**
     * {@inheritdoc}
     */
    public function getContext()
    {
        return $this->context ?: $this->pimple['request_context'];
    }

    /**
     * {@inheritdoc}
     */
    public function getRouteCollection()
    {
        return $this->pimple['routes'];
    }

    /**
     * {@inheritdoc}
     */
    public function generate($name, $parameters = [], $referenceType = self::ABSOLUTE_PATH)
    {
        $generator = new UrlGenerator($this->getRouteCollection(), $this->getContext(), $this->logger);

        return $generator->generate($name, $parameters, $referenceType);
    }

    /**
     * {@inheritdoc}
     */
    public function match($pathinfo)
    {
        $matcher = new RedirectableUrlMatcher($this->getRouteCollection(), $this->getContext());

        return $matcher->match($pathinfo);
    }
}
