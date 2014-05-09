<?php

/*
 * This file is part of the SilexRouting extension.
 *
 * (c) Project A Ventures GmbH & Co. KG
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ProjectA\Silex\Tests\TestData;

use ProjectA\Silex\Application\RoutingTrait;
use Silex\Application as SilexApplication;

class Application extends SilexApplication
{
    use RoutingTrait;
}
