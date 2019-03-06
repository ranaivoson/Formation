<?php
/**
 * Created by PhpStorm.
 * User: Ranain01
 * Date: 04/03/2019
 * Time: 15:56
 */

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SchoolControllerTest extends WebTestCase
{
    public function testRequiresAuthentication(){
        $client = static::createClient();
        $client->request('PUT', '/school');
        $this->assertEquals(401, $client->getResponse()->getStatusCode());
    }
}