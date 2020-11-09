<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Anax\Models\IpValidator;

class IpValidatorJsonController implements ContainerInjectableInterface
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
        $ipValidator = new IpValidator($ipAddress);

        $json = [
            "ipAddress" => $ipAddress,
            "status" => $ipValidator->validateIp(),
            "domain" => $ipValidator->getDomain(),
        ];

        return [$json];
    }
}