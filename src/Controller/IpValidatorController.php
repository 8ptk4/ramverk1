<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Anax\Models\IpValidator;

class IpValidatorController implements ContainerInjectableInterface
{

    use ContainerInjectableTrait;



    /**
     * Request post and setup page.
     * @method indexAction
     * @return array
     */
    public function indexAction() : object
    {
        $title = "Ip Validator";
        $ipPost = htmlentities($this->di->get("request")->getPost("ipAddress"));
        $ipValidator = new IpValidator($ipPost);

        $page = $this->di->get("page");

        $page->add("anax/ipvalidator/index", [
            "title" => $title,
            "ipAddress" => $ipPost,
            "status" => $ipValidator->validateIp(),
            "domain" => $ipValidator->getDomain(),
        ]);

        return $page->render([
            "title" => $title,
        ]);
    }
}