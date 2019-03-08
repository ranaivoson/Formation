<?php
/**
 * Created by PhpStorm.
 * User: Ranain01
 * Date: 05/03/2019
 * Time: 17:45
 */

namespace App\Security;

use App\Security\Token\Algorithm;
use Firebase\JWT\JWT;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class AuthenticationSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    /**
     * @var Algorithm
     */
    private $algorithm;

    /**
     * AuthenticationSuccessHandler constructor.
     * @param Algorithm $algorithm
     */
    public function __construct(Algorithm $algorithm)
    {
        $this->algorithm = $algorithm;
    }


    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        return $this->handleAuthenticationSuccess($token->getUser());
    }

    public function handleAuthenticationSuccess(UserInterface $user){

        $jwt = $this->algorithm->generate($user);

        return new JsonResponse(array('token' => $jwt));
    }
}