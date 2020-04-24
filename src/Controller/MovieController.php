<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Movie;
use Knp\Component\Pager\PaginatorInterface;

/**
* @Route("/movies", name="movie_")
*/
class MovieController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(Request $request, PaginatorInterface $paginator) {

        $movies = $this->getDoctrine()->getRepository(Movie::class)->findAll();
            //{
            // $movies = $paginator->paginate(
            // ($this->getDoctrine()->getRepository(Movie::class)->findAll()),
            // $request->query->getInt('page',1),
            // 5);

        return $this->json([
            'data' => $movies
        ]);
    }
    /**
     * @Route("/{movieId}", name="show", methods={"GET"})
     */

     public function show ($movieId) {

        $movie = $this->getDoctrine()->getRepository(Movie::class)->find($movieId);

        return $this->json([
            'data' => $movie
        ]);
     }
    /**
     * @Route("/", name="create", methods={"POST"})
     */
    public function create(Request $request) {

        $data = $request->request->all();

        $movie = new Movie();
        $movie->setName($data['name']);
        $movie->setYear($data['year']);
        $movie->setDescription($data['description']);
        $movie->setGenre($data['genre']);
        $movie->setSchedule(null);

        $doctrine = $this->getDoctrine()->getManager();

        $doctrine->persist($movie);
        $doctrine->flush();


        return $this->json([
            'data' => 'Succesfully created.'
        ]);
    }
    /**
     * @Route("/{movieId}", name="update", methods={"PUT", "PATCH"})
     */

     public function update($movieId, Request $request) {

        $data = $request->request->all();
        $doctrine =$this->getDoctrine();
        $movie = $doctrine->getRepository(Movie::class)->find($movieId);

        if($request->request->has('name')) 
            $movie->setName($data['name']);
        
        if($request->request->has('year')) 
            $movie->setYear($data['year']);

        if($request->request->has('description'))
            $movie->setDescription($data['description']);
        
        if($request->request->has('genre'))
            $movie->setGenre($data['genre']);

        $movie->setSchedule(null);

        $manager = $doctrine->getManager();
        $manager->flush();

        return $this->json([
            'data' => 'Succesfully updated.'
        ]);

     }
    /**
     * @Route("/{movieId}", name="delete", methods={"DELETE"})
     */
    public function delete($movieId) {

        $doctrine = $this->getDoctrine();

        $movie = $doctrine->getRepository(Movie::class)->find($movieId);

        $manager = $doctrine->getManager();

        $manager->remove($movie);

        $manager->flush();

        return $this->json([
            'data' => 'Succesfully deleted.'
        ]);

    }
}
