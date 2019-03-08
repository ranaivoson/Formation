<?php
/**
 * Created by PhpStorm.
 * User: Ranain01
 * Date: 07/03/2019
 * Time: 11:25
 */

namespace App\Security\Encoder;


interface Algorithm
{
    public function encode(string $string):string;
    public function decode(string $string):string;
}