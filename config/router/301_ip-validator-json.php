<?php
/**
 * Load the ipvalidator as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Ip validator JSON",
            "mount" => "ip",
            "handler" => "\Anax\Controller\IpValidatorJsonController",
        ],
    ]
];
