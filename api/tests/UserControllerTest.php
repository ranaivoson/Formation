<?php
/**
 * Created by PhpStorm.
 * User: Ranain01
 * Date: 04/03/2019
 * Time: 15:15
 */

namespace App\Tests;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testPOSTCreateToken(){
        $client = static::createClient();

        $client->request('POST', '/login', array(
            'auth' => array('ranaivoson', 'password')
        ));

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->asserter()->assertResponsePropertyExists(
            $client->getResponse(),
            'token'
        );
    }
}