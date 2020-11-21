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
        $ipUser = htmlentities($this->di->get("request")->getServer("REMOTE_ADDR"));
        $ipValidator = new IpValidator($ipPost);

        $page = $this->di->get("page");

        $page->add("anax/ipvalidator/index", [
            "title" => $title,
            "ipAddress" => $ipPost,
            "status" => $ipValidator->validateIp(),
            "domain" => $ipValidator->getDomain(),
            "userIp" => $ipUser,
        ]);

        return $page->render([
            "title" => $title,
        ]);
    }
}
