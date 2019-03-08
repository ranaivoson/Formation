<?php
/**
 * Created by PhpStorm.
 * User: Ranain01
 * Date: 07/03/2019
 * Time: 12:27
 */

namespace App\Security\Token;


use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Firebase\JWT\JWT;
use Symfony\Component\Security\Core\User\UserInterface;

class JWTalgorithm implements Algorithm
{
    private $privateKey;
    private $publicKey;
    private $iss;
    private $aud;

    /**
     * JWTalgorithm constructor.
     * @param $privateKey
     * @param $publicKey
     * @param $iss
     * @param $aud
     */
    public function __construct($privateKey, $publicKey, $iss, $aud)
    {
        $this->iss = $iss;
        $this->aud = $aud;
        $this->publicKey = $publicKey;
        $this->privateKey = $privateKey;
    }


    public function generate(UserInterface $user): string
    {
        $token = array(
            "iss" => $this->iss,
            "aud" => $this->aud,
            "exp" => time() + 3600,
            "sub" => $user->getUsername(),
        );

        $jwt = JWT::encode($token, openssl_pkey_get_private('file://'.$this->privateKey, 'formation'), 'RS256');
        return $jwt;
    }

    public function decode(string $jwt): array
    {
        try {
            $token = JWT::decode($jwt, openssl_pkey_get_public('file://'.$this->publicKey), array('HS256'));
        } catch (\Exception $exception) {
            return array( 'message' => strtr($exception->getMessageKey(), $exception->getMessageData()) );
        }
        return (array) $token;
    }

    public function validate(UserInterface $user, string $jwt): bool
    {
        $token = $this->decode($jwt);
        if (time() > $token['exp'] || $user->getUsername() !== $token['sub']) return false;
        return true;
    }

}