<?php

namespace Anax\Controllers;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Anax\Models\Ipstack;

class GeolocationJsonController implements ContainerInjectableInterface
{

    use ContainerInjectableTrait;

    /**
     * Request get and setup json array.
     * @method indexAction
     * @return array
     */
    public function indexActionGet() : array
    {
        $ipAddress = htmlentities($this->di->get("request")->getGet("ipAddress"));

        $ipStack = new Ipstack($ipAddress, $this->di->get("ipStack"));

        return [
            $ipStack->getInformation()
        ];
    }
}