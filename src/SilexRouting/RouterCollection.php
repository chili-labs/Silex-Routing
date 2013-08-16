<?php

/*
 * This file is part of the SilexRouting extension.
 *
 * (c) Project A Ventures GmbH & Co. KG
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SilexRouting;

use Symfony\Component\Routing\RouterInterface;

/**
 * A RouterCollection represents a set of Router instances.
 *
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 *
 * @api
 */
class RouterCollection implements \IteratorAggregate, \Countable
{
    /**
     * @var \SplObjectStorage
     */
    private $routers;

    public function __construct()
    {
        $this->routers = new \SplObjectStorage();
    }


    public function __clone()
    {
        $this->routers = clone $this->routers;
    }

    /**
     * Gets the current RouterCollection as an Iterator that includes all routers.
     *
     * It implements \IteratorAggregate.
     *
     * @see all()
     *
     * @return \SplObjectStorage An \SplObjectStorage object for iterating over routes
     */
    public function getIterator()
    {
        return $this->routers;
    }

    /**
     * Gets the number of Routers in this collection.
     *
     * @return int The number of routes
     */
    public function count()
    {
        return $this->routers->count();
    }

    /**
     * Adds a router.
     *
     * @param RouterInterface $router
     * @param int $priority
     *
     * @api
     */
    public function add(RouterInterface $router, $priority = 0)
    {
        $this->routers->attach($router, $priority);
    }

    /**
     * Returns all routes in this collection.
     *
     * @return RouterInterface[] An array of routers
     */
    public function all()
    {
        return iterator_to_array($this->routers);
    }

    /**
     * Gets the priority of a router previously added.
     *
     * @param RouterInterface $router The router
     *
     * @return int|null The priority of the router or null
     */
    public function getPriority(RouterInterface $router)
    {
        return $this->routers->offsetGet($router);
    }

    /**
     * Removes a router.
     *
     * @param RouterInterface $router
     */
    public function remove(RouterInterface $router)
    {
        $this->routers->detach($router);
    }

    /**
     * Adds a router collection at the end of the current set by appending all
     * routers of the added collection.
     *
     * @param RouterCollection $collection      A RouterCollection instance
     *
     * @api
     */
    public function addCollection(RouterCollection $collection)
    {
        // we need to remove all routes with the same names first because just replacing them
        // would not place the new route at the end of the merged array
        foreach ($collection as $router) {
            $this->add($router, $collection->getPriority($router));
        }
    }
}
