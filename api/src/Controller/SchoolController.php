<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SchoolController extends AbstractController
{
    /**
     * @Route("/school", name="school", methods={"PUT"})
     */
    public function putSchool()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/SchoolController.php',
        ]);
    }
}
