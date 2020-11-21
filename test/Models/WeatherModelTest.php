<?php

namespace Anax\Models;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;
use Anax\Models\Ipstack;
use Anax\Request\Request;

/**
 * Test the WeatherControllerModel.
 */
class WeatherControllerTest extends TestCase
{


    /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        global $di;

        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $di = $this->di;
        $di->request = new Request();
        $di->request->setGlobals(
            [
                'post' => [
                    'city' => "karlskrona",
                    'faulty' => 'asdasdasd',
                ]
            ]
        );

        $this->controller = $this->di->get("weather");
    }


    // $title = "Weather";

    // $location = htmlentities($this->di->get("request")->getPost("location"));
    // $weather = $this->di->get("weather");
    // $page = $this->di->get("page");

    // $page->add("anax/weather/index", [
    //     "title" => $title,
    //     "location" => $location,
    //     "geolocation" => $weather->loadGeolocation($location),
    //     "weather" => $weather->loadWeather(),
    //     "historic" => $weather->multiCurl(),
    // ]);


    public function testLoadGeolocationCorrectValues()
    {
        $this->controller->location = $this->di->request->getPost('city');
        $returnedArr = $this->controller->loadGeolocation($this->di->request->getPost('city'));
        
        $this->assertInternalType('array', $returnedArr);
        $this->assertInternalType('string', $returnedArr['latitude']);
        $this->assertInternalType('string', $returnedArr['longitude']);
        $this->assertInternalType('array', $returnedArr['geolocation']);
        $this->assertEquals('success', $returnedArr['status']);
    }

    public function testLoadGeolocationFaultyLocation()
    {
        $faulty = $this->di->request->getPost('faulty');
        $returnedArr = $this->controller->loadGeolocation($faulty);
        
        $this->assertInternalType('array', $returnedArr);
        $this->assertEquals('error', $returnedArr['status'], "{$faulty} couldnt be converted to a lontitude, latitude");
    }


    public function testLoadWeather()
    {
        $this->controller->location = $this->di->request->getPost('city');
        $geo = $this->controller->loadGeolocation($this->di->request->getPost('city'));
        $weather = $this->controller->loadWeather();
        
        $this->assertInternalType('array', $weather);
    }


    public function testMultiCurl()
    {
        $this->controller->location = $this->di->request->getPost('city');
        $geo = $this->controller->loadGeolocation($this->di->request->getPost('city'));
        $mcWeather = $this->controller->multiCurl();

        $this->assertInternalType('array', $mcWeather);
    }
    // /**
    //  * Test IPV4 Validation.
    //  * @method testValidationIpv4
    //  */
    // public function testValidationIpv4()
    // {
    //     $this->controller = new IpValidator($this->di->request->getPost('ipAddressIpv4'));
    //     $this->controller->setDI($this->di);
    //     $this->controller->ipAddress = $this->di->request->getPost('ipAddressIpv4');
    //     $this->controller->status = $this->controller->validateIp($this->di->request->getPost('ipAddressIpv4'));
    //     $this->controller->domain = $this->controller->getDomain();
    //     $this->assertContains("IPV4", $this->controller->status);
    //     $this->assertInternalType('string', $this->controller->status);
    // }



    // /**
    //  * Test IPV6 Validation.
    //  * @method testValidationIpv6
    //  */
    // public function testValidationIpv6()
    // {
    //     $this->controller = new IpValidator($this->di->request->getPost('ipAddressIpv6'));
    //     $this->controller->setDI($this->di);
    //     $this->controller->ipAddress = $this->di->request->getPost('ipAddressIpv6');
    //     $this->controller->status = $this->controller->validateIp($this->di->request->getPost('ipAddressIpv6'));
    //     $this->controller->domain = $this->controller->getDomain();
    //     $this->assertContains("IPV6", $this->controller->status);
    //     $this->assertInternalType('string', $this->controller->status);
    // }
}
