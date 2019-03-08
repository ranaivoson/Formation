<?php
/**
 * Created by PhpStorm.
 * User: Ranain01
 * Date: 04/03/2019
 * Time: 18:18
 */

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Http\Firewall\UsernamePasswordJsonAuthenticationListener;

class SecurityControllerTest extends WebTestCase
{
    public function provideUrls()
    {
        return [
            ['POST','/login'],
            ['PUT', '/school'],
        ];
    }

    /**
     * @dataProvider provideUrls
     */
    public function testRequiresAuthentication($method, $url){
        $client = static::createClient();
        $client->request($method, $url);
        $this->assertEquals(401, $client->getResponse()->getStatusCode());
    }
}