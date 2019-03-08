<?php
/**
 * Created by PhpStorm.
 * User: Ranain01
 * Date: 07/03/2019
 * Time: 11:33
 */

namespace App\Security\Token;

use Symfony\Component\Security\Core\User\UserInterface;

interface Algorithm
{
    public function generate(UserInterface $user): string;
    public function validate(UserInterface $user, string $token): bool;
}