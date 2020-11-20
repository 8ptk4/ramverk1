<?php
/**
 * Load the ipvalidator as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Weather JSON",
            "mount" => "weatherJson",
            "handler" => "\Anax\Controller\WeatherJsonController",
        ],
    ]
];
