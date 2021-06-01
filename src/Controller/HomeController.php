<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends abstractController
{
    /**
     * @Route ("/", name="home")
     */
    public function home()
    {
        return $this->render('Home.html.twig');
    }
}