<?php

namespace App\Controller;

use App\Entity\Bake;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BakeryController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'bakery_home')]
    public function homepage(): Response
    {
        $bakeryItemRepository = $this->entityManager->getRepository(Bake::class);
        $bakeryItems = $bakeryItemRepository->findAll();

        return $this->render('bakery/home.html.twig', [
            'bakeryItems' => $bakeryItems,
        ]);
    }

    /**
     * @Route("/cakes", name="cakes_list")
     */
    public function cakes(): Response
    {
        $cakeRepository = $this->entityManager->getRepository(Bake::class);
        $cakes = $cakeRepository->findAll();

        return $this->render('bakery/cakes.html.twig', [
            'cakes' => $cakes,
        ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function about(): Response
    {
        // Add any logic specific to the About page here
        
        return $this->render('bakery/about.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        // Add any logic specific to the Contact page here
        
        return $this->render('bakery/contact.html.twig');
    }
}
