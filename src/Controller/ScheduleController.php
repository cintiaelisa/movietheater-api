<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/schedule", name="schedule_")
*/
class ScheduleController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index()
    {
        $movies = $this->getDoctrine()->getRepository(Schedule::class)->findAll();

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ScheduleController.php',
        ]);
    }
}
