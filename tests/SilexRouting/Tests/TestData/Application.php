<?php

/*
 * This file is part of the SilexRouting extension.
 *
 * (c) Project A Ventures GmbH & Co. KG
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SilexRouting\Tests\TestData;

use Silex\Application as SilexApplication;
use SilexRouting\Application\RoutingTrait;

class Application extends SilexApplication
{
    use RoutingTrait;
}
