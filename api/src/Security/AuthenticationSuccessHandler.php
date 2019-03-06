<?php
/**
 * Created by PhpStorm.
 * User: Ranain01
 * Date: 05/03/2019
 * Time: 17:45
 */

namespace App\Security;

use Firebase\JWT\JWT;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class AuthenticationSuccessHandler implements AuthenticationSuccessHandlerInterface
{

    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        return $this->handleAuthenticationSuccess($token->getUser());
    }

    public function handleAuthenticationSuccess(UserInterface $user){
        $key = "formation_key";
        $token = array(
            "iss" => "localhost",
            "aud" => "localhost",
            "exp" => time() + 3600,
            "sub" => $user->getUsername(),
            "data" => array(
                "id" => $user->getUsername()
            )
        );

        $jwt = JWT::encode($token, $key);
        return new JsonResponse(array('token' => $jwt));
    }
}